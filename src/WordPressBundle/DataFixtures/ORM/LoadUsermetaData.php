<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Usermeta;

class LoadUsermetaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $usermeta1 = new Usermeta();
        $usermeta1->setUserId($this->getReference("user-1")->getId());
        $usermeta1->setMetaKey("nickname");
        $usermeta1->setMetaValue("Big Admin");

        $usermeta2 = new Usermeta();
        $usermeta2->setUserId($this->getReference("user-1")->getId());
        $usermeta2->setMetaKey("first_name");
        $usermeta2->setMetaValue("John");

        $usermeta3 = new Usermeta();
        $usermeta3->setUserId($this->getReference("user-1")->getId());
        $usermeta3->setMetaKey("last_name");
        $usermeta3->setMetaValue("Snow");
    
        $manager->persist($usermeta1);
        $manager->persist($usermeta2);
        $manager->persist($usermeta3);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}