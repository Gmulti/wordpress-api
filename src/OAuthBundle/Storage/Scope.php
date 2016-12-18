<?php

namespace OAuthBundle\Storage;

use OAuth2\Storage\ScopeInterface;
use OAuthBundle\Manager\ScopeManagerInterface;
use Doctrine\ORM\EntityManager;

class Scope implements ScopeInterface
{
    private $em;


    private $sm;

    public function __construct(EntityManager $entityManager, ScopeManagerInterface $scopeManager)
    {
        $this->em = $entityManager;
        $this->sm = $scopeManager;
    }


    public function scopeExists($scope, $client_id = null)
    {
        $scopes = explode(' ', $scope);
        if ($client_id) {

            $client = $this->em->getRepository('OAuthBundle:Client')->findOneByClientId($client_id);

            if (!$client) {
                return false;
            }

            $validScopes = $client->getScopes();

            foreach ($scopes as $scope) {
                if (!in_array($scope, $validScopes)) {
                    return false;
                }
            }

            return true;
        }

        $validScopes = $this->sm->findScopesByScopes($scopes);

        return count($validScopes) == count($scopes);
    }

    public function getDefaultScope($client_id = null)
    {
        return false;
    }

    public function getDescriptionForScope($scope)
    {
        // Get Scope
        $scopeObject = $this->sm->findScopeByScope($scope);

        if (!$scopeObject) {
            return $scope;
        }

        return $scopeObject->getDescription();
    }
}
