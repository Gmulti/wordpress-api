<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use WordPressBundle\Entity\Option;

class LoadOptionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $option1 = new Option();
        $option1->setOptionName("siteurl");
        $option1->setOptionValue("http://wordpress.local/");
        
        $option2 = new Option();
        $option2->setOptionName("home");
        $option2->setOptionValue("http://wordpress.local/");

        $option3 = new Option();
        $option3->setOptionName("blogname");
        $option3->setOptionValue("WordPress API Project");

        $option4 = new Option();
        $option4->setOptionName("blogdescription");
        $option4->setOptionValue("Don't panic !");

        $option5 = new Option();
        $option5->setOptionName("users_can_register");
        $option5->setOptionValue(0);

        $option6 = new Option();
        $option6->setOptionName("admin_email");
        $option6->setOptionValue("email@mail.com");

        $option7 = new Option();
        $option7->setOptionName("start_of_week");
        $option7->setOptionValue(1);

        $option8 = new Option();
        $option8->setOptionName("date_format");
        $option8->setOptionValue("j F Y");
    
        $manager->persist($option1);
        $manager->persist($option2);
        $manager->persist($option3);
        $manager->persist($option4);
        $manager->persist($option5);
        $manager->persist($option6);
        $manager->persist($option7);
        $manager->persist($option8);
        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }
}