<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $manager;

    /**
     * @var SchemaTool
     */
    private $schemaTool;

    /**
     * @var array
     */
    private $classes;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(ManagerRegistry $doctrine, KernelInterface $kernel)
    {
        $this->doctrine   = $doctrine;
        $this->kernel     = $kernel; 
        $this->manager    = $doctrine->getManager();
        $this->schemaTool = new SchemaTool($this->manager);
        $this->classes    = $this->manager->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @BeforeScenario @createSchema
     */
    public function createDatabase()
    {
        $this->schemaTool->createSchema($this->classes);
    }

    /**
     * @AfterScenario @dropSchema
     */
    public function dropDatabase()
    {
        $this->schemaTool->dropSchema($this->classes);
    }

    /**
     * @BeforeScenario @Login
     */
    public function login($event) 
    {

        $response = $this->kernel->handle(Request::create(
            '/oauth/token',
            'POST',
            [],
            [],
            [],
            array(
                'CONTENT_TYPE' => 'application/json'
            ),
            array(
                "client_id"     => "client_id_1",
                "client_secret" => "client_secret_1",
                "grant_type"    => "password",
                "username"      => "admin",
                "password"      => "admin",
                "scope"         => "user"
            )
        ));
        $data = json_decode($response->getContent());
        $event->getEnvironment()->getContext("Sanpi\Behatch\Context\RestContext")->iAddHeaderEqualTo("Authorization", "Bearer " . $data->access_token);

    }

    /**
     * @BeforeScenario @WithoutToken
     */
    public function withoutToken($event) 
    {
        $event->getEnvironment()->getContext("Sanpi\Behatch\Context\RestContext")->iAddHeaderEqualTo("Authorization", "");
    }
}
