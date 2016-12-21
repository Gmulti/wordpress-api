<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use OAuthBundle\Entity\Scope;

class LoadScopeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $scope1 = new Scope();
        $scope1->setScope("user");
        $scope1->setDescription("Scope utilisateur");
        
        $scope2 = new Scope();
        $scope2->setScope("pro");
        $scope2->setDescription("Scope pro");

        $manager->persist($scope1);
        $manager->persist($scope2);
        $manager->flush();

        $this->addReference('scope-1', $scope1);
        $this->addReference('scope-2', $scope2);

    }

    public function getOrder(){
        return 1;
    }
}