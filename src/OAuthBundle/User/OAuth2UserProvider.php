<?php

namespace OAuthBundle\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class OAuth2UserProvider implements UserProviderInterface
{
    private $em;
    private $encoderFactory;

    public function __construct(EntityManager $entityManager, EncoderFactoryInterface $encoderFactory, $userManager = null)
    {
        $this->em             = $entityManager;
        $this->encoderFactory = $encoderFactory;
        $this->userManager    = $userManager;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->userManager->findUserByUsernameOrEmail($username);
        
        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Username "%s" not found.', $username));
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof OAuth2User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }


    public function supportsClass($class)
    {
        if ($class == 'OAuth2User') {
            return true;
        }

        return false;
    }


    public function createUser($username, $password, $email, array $roles = array(), array $scopes = array())
    {
     
        $user = $this->userManager->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPlainPassword($password);
        $user->setEnabled(true);
        $user->setSuperAdmin(false);
        $user->setRoles($roles);
        $user->setScopes($scopes);

        $this->userManager->updateUser($user);

        return $user;
    }

    protected function generateSalt()
    {
        return base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }
}
