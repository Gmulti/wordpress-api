<?php

namespace OAuthBundle\Manager;

use Doctrine\ORM\EntityManager;

interface ScopeManagerInterface
{
    public function __construct(EntityManager $entityManager);

    public function createScope($scope, $description = null);

    public function findScopeByScope($scope);

    public function findScopesByScopes(array $scopes);
}
