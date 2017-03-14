<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\AccessTokenInterface;
use Doctrine\ORM\EntityManager;
use OAuthBundle\Entity\Client;
use OAuthBundle\Entity\AccessToken as AccessTokenEntity;

class AccessToken implements AccessTokenInterface
{
    private $em;

    public function __construct(EntityManager $EntityManager)
    {
        $this->em = $EntityManager;
    }

    public function getAccessToken($accessToken)
    {
        $accessToken = $this->em->getRepository('OAuthBundle:AccessToken')->findOneByToken($accessToken);

        if (!$accessToken) {
            return null;
        }

        $client = $accessToken->getClient();

        return array(
            'client_id' => $client->getClientId(),
            'user_id'   => $accessToken->getUserId(),
            'expires'   => $accessToken->getExpires()->getTimestamp(),
            'scope'     => $accessToken->getScope()
        );
    }

    public function setAccessToken($token, $client_id, $userId, $expires, $scope = null)
    {   
        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);

        if (!$client) {
            return null;
        }

        $user = $this->em->getRepository('WordPressBundle:User')->findOneById($userId);

        $accessToken = new AccessTokenEntity();
        $accessToken->setAccessToken($token);
        $accessToken->setClient($client);
        $accessToken->setUser($user);
        $accessToken->setExpires($expires);
        $accessToken->setScopes($scope);

        $this->em->persist($accessToken);
        $this->em->flush();
    }
}
