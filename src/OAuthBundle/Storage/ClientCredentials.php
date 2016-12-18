<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\ClientCredentialsInterface;
use Doctrine\ORM\EntityManager;
use OAuthBundle\Entity\Client;

class ClientCredentials implements ClientCredentialsInterface
{
    private $em;

    public function __construct(EntityManager $EntityManager)
    {
        $this->em = $EntityManager;
    }


    public function checkClientCredentials($client_id, $client_secret = null)
    {

        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);

        if ($client) {
            return $client->getClientSecret() === $client_secret;
        }

        return false;
    }

  
    public function getClientDetails($client_id)
    {
        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);
        if (!$client) {
            return false;
        }

        return array(
            // 'redirect_uri' => implode(' ', $client->getRedirectUri()),
            'client_id'    => $client->getClientId(),
            'grant_types'  => $client->getGrantTypes()
        );
    }

    public function checkRestrictedGrantType($client_id, $grant_type)
    {
        $client = $this->getClientDetails($client_id);

        if (!$client) {
            return false;
        }

        if (empty($client['grant_types'])) {
            return true;
        }

        if (in_array($grant_type, $client['grant_types'])) {
            return true;
        }

        return false;
    }

    public function isPublicClient($client_id)
    {
        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);
        if (!$client) {
            return false;
        }

        $secret = $client->getClientSecret();

        return empty($secret);
    }

    public function getClientScope($client_id)
    {
        $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);

        if (!$client) {
            return false;
        }

        if(!empty($client->getScopes())){
            return $client->getScopes();
        }

        return array();
    }
}
