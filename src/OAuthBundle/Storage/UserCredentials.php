<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\UserCredentialsInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use OAuthBundle\User\OAuth2UserInterface;
use OAuthBundle\User\AdvancedOAuth2UserInterface;

class UserCredentials implements UserCredentialsInterface
{
    protected $em;
    protected $up;
    protected $encoderFactory;

    public function __construct(EntityManager $entityManager, UserProviderInterface $userProvider, $encoder)
    {
        $this->em             = $entityManager;
        $this->up             = $userProvider;
        $this->encoderFactory = $encoder;
    }

    public function checkUserCredentials($username, $password)
    {
        // Load user by username
        try {
            $user = $this->up->loadUserByUsername($username);
        } catch (\Symfony\Component\Security\Core\Exception\UsernameNotFoundException $e) {
            return false;
        }

        // Do extra checks if implementing the AdvancedUserInterface
        if ($user instanceof AdvancedUserInterface) {
            if ($user->isAccountNonExpired() === false) return false;
            if ($user->isAccountNonLocked() === false) return false;
            if ($user->isCredentialsNonExpired() === false) return false;
            if ($user->isEnabled() === false) return false;
        }

        if ($this->encoderFactory->isPasswordValid($user->getPassword(), $password, $user->getSalt())) {
            return true;
        }

        return false;
    }

 
    public function getUserDetails($username)
    {
        try {
            $user = $this->up->loadUserByUsername($username);
        } catch (\Symfony\Component\Security\Core\Exception\UsernameNotFoundException $e) {
            return false;
        }

        if ($user instanceof OAuth2UserInterface || $user instanceof AdvancedOAuth2UserInterface) {
            $scope = $user->getScope();
        } else {
            $scope = null;
        }

        return array(
            'user_id' => $user->getId(),
            'scope'   => $scope
        );
    }
}
