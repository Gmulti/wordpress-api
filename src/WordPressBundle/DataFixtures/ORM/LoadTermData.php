<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Term;

class LoadTermData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $term = new Term();
        $term->setName("Category 1");
        $term->setSlug("category-1");
    
        $term2 = new Term();
        $term2->setName("Category 2");
        $term2->setSlug("category-2");

        $term3 = new Term();
        $term3->setName("Category 3");
        $term3->setSlug("category-3");

        $manager->persist($term);
        $manager->persist($term2);
        $manager->persist($term3);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}