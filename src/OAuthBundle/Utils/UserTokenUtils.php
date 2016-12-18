<?php

namespace OAuthBundle\Utils;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManager;
use WordPressBundle\Entity\User;


class UserTokenUtils
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getTokenFromRequest(Request $request){
        $regex = "/Bearer (.*)/";

        if (preg_match($regex, $request->headers->get('authorization'), $matches) !== 1 ) {
            return array(
                'error' => 'no_token',
                'error' => 'Token not found or is not valid'
            );
        }

        return $matches[1];
    }

    public function getAccessTokenByRequest(Request $request){
        
        $token = $this->getTokenFromRequest($request);

        return $this->em
                    ->getRepository('OAuthBundle:AccessToken')
                    ->findOneByToken($token);
    }

    public function getTokenByUsername($username){
        $data = $this->em
                     ->getRepository('OAuthBundle:AccessToken')
                     ->findOneByUserId($username);

        return $data;
    }

    public function getUserByUsername($username){
        $user = $this->em
                     ->getRepository('WordPressBundle:User')
                     ->findOneByUsername($username);

        return $user;
    }

    public function getUserIdByRequestFromToken(Request $request){
        return $this->getAccessTokenByRequest($request)->getUserId();
    }

    public function getUserByRequestFromToken(Request $request){
        return $this->getUserByUsername($this->getUserIdByRequestFromToken($request));
    }

    public function getClientByRequestFromToken(Request $request){
        return $this->getAccessTokenByRequest($request)->getClient();
    }

    public function getClientIdByRequestFromToken(Request $request){
        return $this->getAccessTokenByRequest($request)->getClientId();
    }

    public function isAccessToRequest(Request $request, User $user){

        $accessToken = $this->getAccessTokenByTokenRequest($request);

        return ($accessToken->getUserId() === $user->getUsername() ) ? true : false;
       
    }

}