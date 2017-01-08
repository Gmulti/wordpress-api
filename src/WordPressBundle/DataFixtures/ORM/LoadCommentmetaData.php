<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Commentmeta;

class LoadCommentmetaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $commentmeta1 = new Commentmeta();
        $commentmeta1->setMetaKey("_comment_meta_one");
        $commentmeta1->setMetaValue("A comment meta");
        $commentmeta1->setCommentId($this->getReference("comment-1")->getCommentId());
    
        $manager->persist($commentmeta1);
        $manager->flush();

    }

    public function getOrder(){
        return 3;
    }
}