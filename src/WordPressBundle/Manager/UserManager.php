<?php

namespace WordPressBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;

class UserManager
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;
    /**
     * @var string
     */
    protected $class;

    public function __construct(ObjectManager $om, $class)
    {
        $this->om         = $om;
        $this->class      = $class;
        $this->repository = $om->getRepository($class);
    }

    public function getClass(){
        return $this->class;
    }

    public function createUser()
    {
        $class = $this->getClass();
        $user  = new $class();
        return $user;
    }

    public function findUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->repository->findOneByUserOrEmail($usernameOrEmail);
    }
    

}