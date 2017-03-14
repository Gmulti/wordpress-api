<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\RefreshTokenInterface;
use Doctrine\ORM\EntityManager;

use OAuthBundle\Entity\RefreshToken as RefreshTokenEntity;

class RefreshToken implements RefreshTokenInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getRefreshToken($refresh_token)
    {
        $refreshToken = $this->em->getRepository('OAuthBundle:RefreshToken')->findOneByToken($refresh_token);

        if (!$refreshToken) {
            return null;
        }

        // Get Client
        $client = $refreshToken->getClient();

        return array(
            'refresh_token'=> $refreshToken->getToken(),
            'client_id'    => $client->getClientId(),
            'user_id'      => $refreshToken->getUserId(),
            'expires'      => $refreshToken->getExpires()->getTimestamp(),
            'scope'        => $refreshToken->getScope()
        );
    }

    public function setRefreshToken($refresh_token, $client_id, $user_id, $expires, $scope = null)
    {
        // Get Client Entity
        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);
        if (!$client) {
            return null;
        }

        // Create Refresh Token
        $refreshToken = new RefreshTokenEntity();
        $refreshToken->setToken($refresh_token);
        $refreshToken->setClient($client);
        $refreshToken->setUserId($user_id);
        $refreshToken->setExpires($expires);
        $refreshToken->setScope($scope);

        // Store Refresh Token
        $this->em->persist($refreshToken);
        $this->em->flush();
    }

    public function unsetRefreshToken($refresh_token)
    {
        $refreshToken = $this->em->getRepository('OAuthBundle:RefreshToken')->findOneByToken($refresh_token);
        $this->em->remove($refreshToken);
        $this->em->flush();
    }
}
