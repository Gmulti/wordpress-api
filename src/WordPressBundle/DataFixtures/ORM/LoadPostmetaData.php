<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Postmeta;

class LoadPostmetaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $postmeta1 = new Postmeta();
        $postmeta1->setPostId($this->getReference("post-1")->getId());
        $postmeta1->setMetaKey("_meta_post_1");
        $postmeta1->setMetaValue("One meta post 1");

    
        $manager->persist($postmeta1);
        $manager->flush();

    }

    public function getOrder(){
        return 2;
    }
}