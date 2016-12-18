<?php

namespace WordPressBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class UserRepository extends EntityRepository
{
    public function findOneByUserOrEmail($usernameOrEmail){
        $query           = $this->_em->createQueryBuilder();
        $usernameOrEmail = strtolower($usernameOrEmail);

        $query->select('u')
              ->from('WordPressBundle:User','u')
              ->where('u.userEmail = :email')
              ->setParameter('email', $usernameOrEmail)
              ->orWhere('u.userLogin = :username')
              ->setParameter('username', $usernameOrEmail);

        return $query->getQuery()
                     ->getOneOrNullResult();
    }


}