<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Comment;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $comment1 = new Comment();
        $comment1->setCommentPostId(1);
        $comment1->setCommentAuthor("Doctor strange");
        $comment1->setCommentAuthorEmail("doctor@strange.com");
        $comment1->setCommentAuthorUrl("http://doctorstrange.com");
        $comment1->setCommentDate(new \DateTime("now"));
        $comment1->setCommentDateGmt(new \DateTime("now"));
        $comment1->setCommentContent("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex cupiditate, quo possimus. Asperiores hic temporibus dolores voluptates vel vero, cumque expedita ipsam aut veritatis perspiciatis dicta, iste minus, optio facilis?");
    
        $manager->persist($comment1);
        $manager->flush();

    }

    public function getOrder(){
        return 2;
    }
}