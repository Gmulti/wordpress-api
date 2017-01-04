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
  
        $post2 = new Post();
        $post2->setPostAuthor(1);
        $post2->setPostDate(new \DateTime("now"));
        $post2->setPostDateGmt(new \DateTime("now"));
        $post2->setPostContent("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eligendi provident quam eveniet sint nesciunt consequuntur reprehenderit velit est molestiae, quisquam, repellendus, aliquid delectus natus! Et optio asperiores, commodi dignissimos. <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam rem nemo animi consequatur optio aut unde numquam, sed cumque ullam labore explicabo necessitatibus mollitia consectetur. Et quasi hic inventore ratione.</div>
        <div>Amet recusandae maiores dolores sequi voluptate quas, quis incidunt molestias commodi qui accusamus labore ipsum, quibusdam culpa voluptatem sapiente. Non voluptatem eum commodi ipsa labore eveniet! Iusto voluptates sint, dolores.</div>");
        $post2->setPostTitle("Lorem ipsum 2");
        $post2->setPostExcerpt("lorem ipsum dolor sit 2");
        $post2->setPostModified(new \DateTime("now"));
        $post2->setPostModifiedGmt(new \DateTime("now"));

        $this->addReference('post-1', $post1);
        $this->addReference('post-2', $post2);
    
        $manager->persist($post1);
        $manager->persist($post2);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}