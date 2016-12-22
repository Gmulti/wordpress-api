<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $post1 = new Post();
        $post1->setPostAuthor(1);
        $post1->setPostDate(new \DateTime("now"));
        $post1->setPostDateGmt(new \DateTime("now"));
        $post1->setPostContent("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eligendi provident quam eveniet sint nesciunt consequuntur reprehenderit velit est molestiae, quisquam, repellendus, aliquid delectus natus! Et optio asperiores, commodi dignissimos.");
        $post1->setPostTitle("Lorem ipsum");
        $post1->setPostExcerpt("lorem ipsum dolor sit");
        $post1->setPostModified(new \DateTime("now"));
        $post1->setPostModifiedGmt(new \DateTime("now"));

    
        $manager->persist($post1);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}