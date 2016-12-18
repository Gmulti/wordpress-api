<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\AuthorizationCodeInterface;
use Doctrine\ORM\EntityManager;
use OAuthBundle\Entity\Client;

class AuthorizationCode implements AuthorizationCodeInterface
{
    private $em;

    public function __construct(EntityManager $EntityManager)
    {
        $this->em = $EntityManager;
    }

    public function getAuthorizationCode($code)
    {
        // Get Code
        $code = $this->em->getRepository('OAuthBundleAuthorizationCode')->find($code);

        if (!$code) {
            return null;
        }

        return array(
            'client_id' => $code->getClient()->getClientId(),
            'user_id' => $code->getUserId(),
            'expires' => $code->getExpires()->getTimestamp(),
            'redirect_uri' => implode(' ', $code->getRedirectUri()),
            'scope' => $code->getScope()
        );
    }

    public function setAuthorizationCode($code, $client_id, $user_id, $redirect_uri, $expires, $scope = null)
    {
        $client = $this->em->getRepository('OAuthBundleClient')->find($client_id);

        if (!$client) throw new \Exception('Unknown client identifier');

        $authorizationCode = new \OAuthBundle\Entity\AuthorizationCode();
        $authorizationCode->setCode($code);
        $authorizationCode->setClient($client);
        $authorizationCode->setUserId($user_id);
        $authorizationCode->setRedirectUri($redirect_uri);
        $authorizationCode->setExpires($expires);
        $authorizationCode->setScope($scope);

        $this->em->persist($authorizationCode);
        $this->em->flush();
    }


    public function expireAuthorizationCode($code)
    {
        $code = $this->em->getRepository('OAuthBundleAuthorizationCode')->find($code);
        $this->em->remove($code);
        $this->em->flush();
    }
}
