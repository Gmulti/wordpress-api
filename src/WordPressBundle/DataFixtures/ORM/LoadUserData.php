<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $user1 = new User();
        $user1->setUserLogin("admin");
        $user1->setUserPass(md5("admin"));
        $user1->setUserNicename("Admin");
        $user1->setUserEmail("admin@email.com");
        $user1->setUserRegistered(new \DateTime("now"));
        $user1->setUserStatus(0);
        $user1->setDisplayName("Admin");
    
        $manager->persist($user1);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}