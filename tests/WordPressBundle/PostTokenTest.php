<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostTokenTest extends WebTestCase
{


    public function testPostTokenGrantTypePassword()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $client = static::createClient();

        $crawler = $client->request('POST',
            '/oauth/token',
            array(
                'username'      => "admin",
                'password'      => "admin",
                'client_id'     => "client_id_1",
                'client_secret' => "client_secret_1",
                'grant_type'    => 'password',
                'scope'         => 'user'
            )
        );


        
        $response = $client->getResponse();
        $content  = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("user", $content["scope"]);

    }

    public function testPostTokenGrantTypePasswordFailureUsernamePassword()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $client = static::createClient();

        $crawler = $client->request('POST',
            '/oauth/token',
            array(
                'username'      => "test",
                'password'      => "test",
                'client_id'     => "client_id_1",
                'client_secret' => "client_secret_1",
                'grant_type'    => 'password',
                'scope'         => 'user'
            )
        );


        
        $response = $client->getResponse();
        $content  = json_decode($response->getContent(), true);

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals("invalid_grant", $content["error"]);
        $this->assertEquals("Invalid username and password combination", $content["error_description"]);

    }
}