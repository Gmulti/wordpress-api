<?php

namespace OAuthBundle\Security\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\NonceExpiredException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

use OAuthBundle\Entity\AccessToken;

class OAuthProvider implements AuthenticationProviderInterface
{
    private $userProvider;
    private $cacheDir;

    public function __construct(UserProviderInterface $userProvider, $cacheDir)
    {
        $this->userProvider = $userProvider;
        $this->cacheDir     = $cacheDir;
    }

    public function authenticate(TokenInterface $token)
    {
        

        $user = $this->userProvider->loadUserByUsername($token->getUser()->getUserEmail());

        if ($user && $this->validateDigest($token->getExpires())) {
            $authenticatedToken = new AccessToken($user->getRoles());
            $authenticatedToken->setUser($user);

            return $authenticatedToken;
        }   


        throw new AuthenticationException('The OAuth authentication failed.');
    }

    protected function validateDigest($expireToken)
    {   
        if (time() - $expireToken->getTimeStamp() > 0) {
            return false;
        }

        return true;
    }

    public function supports(TokenInterface $token)
    {
        return $token instanceof AccessToken;
    }
}