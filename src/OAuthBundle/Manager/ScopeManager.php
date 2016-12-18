<?php

namespace OAuthBundle\Manager;

use Doctrine\ORM\EntityManager;

class ScopeManager implements ScopeManagerInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Creates a new scope
     *
     * @param string $scope
     *
     * @param string $description
     *
     * @return Scope
     */
    public function createScope($scope, $description = null)
    {
        $scopeObject = new \OAuthBundle\Entity\Scope();
        $scopeObject->setScope($scope);
        $scopeObject->setDescription($description);
        
        // Store Scope
        $this->em->persist($scopeObject);
        $this->em->flush();

        return $scopeObject;
    }

    /**
     * Find a single scope by the scope
     *
     * @param $scope
     * @return Scope
     */
    public function findScopeByScope($scope)
    {
        $scopeObject = $this->em->getRepository('OAuthBundleScope')->findOneByScope($scope);

        return $scopeObject;
    }

    /**
     * Find all the scopes by an array of scopes
     *
     * @param array $scopes
     * @return mixed|void
     */
    public function findScopesByScopes(array $scopes)
    {
        $scopeObjects = $this->em->getRepository('OAuthBundleScope')
            ->createQueryBuilder('a')
            ->where('a.scope in (?1)')
            ->setParameter(1, implode(',', $scopes))
            ->getQuery()->getResult();

        return $scopeObjects;
    }
}
