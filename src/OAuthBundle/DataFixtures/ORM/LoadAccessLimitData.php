<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use OAuthBundle\Entity\AccessLimit;

class LoadAccessLimitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $access1 = new AccessLimit();
        $access1->setRequest(100);
        $access1->setTtl(3600);

        $access2 = new AccessLimit();
        $access2->setRequest(1000);
        $access2->setTtl(3600);
        
        $access3 = new AccessLimit();
        $access3->setRequest(10000);
        $access3->setTtl(3600);
        
        $access4 = new AccessLimit();
        $access4->setRequest(50000);
        $access4->setTtl(3600);
        
        $manager->persist($access1);
        $manager->persist($access2);
        $manager->persist($access3);
        $manager->persist($access4);
        $manager->flush();

        $this->addReference('access-1', $access1);
        $this->addReference('access-2', $access2);
        $this->addReference('access-3', $access3);
        $this->addReference('access-4', $access4);

    }

    public function getOrder(){
        return 1;
    }
}