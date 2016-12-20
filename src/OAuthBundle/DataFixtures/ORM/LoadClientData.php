<?php

namespace OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use OAuthBundle\Entity\Client;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $client1 = new Client();
        $client1->setClientId("client_id_1");
        $client1->setClientSecret("client_secret_1");
        $client1->setGrantTypes(array("password", "refresh_token"));
        $client1->setAccessLimit($this->getReference("access-1"));
        $client1->setScopes("user");
        $client1->setName("Client user");

        $client2 = new Client();
        $client2->setClientId("client_id_2");
        $client2->setClientSecret("client_secret_2");
        $client2->setGrantTypes(array("client_credentials"));
        $client2->setAccessLimit($this->getReference("access-2"));
        $client2->setScopes("pro");
        $client2->setName("Client pro");

        $manager->persist($client1);
        $manager->persist($client2);
        $manager->flush();

        $this->addReference('client-1', $client1);
        $this->addReference('client-2', $client1);

    }

    public function getOrder(){
        return 2;
    }
}