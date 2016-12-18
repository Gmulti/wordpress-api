<?php

namespace OAuthBundle\Manager;

use Symfony\Component\HttpFoundation\RequestStack;
use OAuth2\HttpFoundationBridge\Request;

class Request extends Request
{

    public function __construct(RequestStack $requestStack){
        $request = $requestStack->getCurrentRequest();
        $this->initialize(
            $request->query->all(), 
            $request->request->all(), 
            $request->attributes->all(), 
            $request->cookies->all(), 
            $request->files->all(), 
            $request->server->all(), 
            $request->getContent()
        );
    }
    
}
