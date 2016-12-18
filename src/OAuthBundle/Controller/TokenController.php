<?php

namespace OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;     

class TokenController extends Controller
{
    /**
     * @Route("/oauth/token", name="_token")
     */
    public function tokenAction(Request $request)
    {   
        
        $server = $this->get('oauth2.server');

        $server->addGrantType($this->get('oauth2.grant_type.client_credentials'));
        $server->addGrantType($this->get('oauth2.grant_type.authorization_code'));
        $server->addGrantType($this->get('oauth2.grant_type.refresh_token'));
        $server->addGrantType($this->get('oauth2.grant_type.user_credentials'));

        return $server->handleTokenRequest( $this->get('oauth2.request'), $this->get('oauth2.response') );
    }
}
