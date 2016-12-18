<?php 
namespace OAuthBundle\Security\Firewall;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;

use OAuth2\HttpFoundationBridge\Response;
use OAuth2\ServerBundle\Entity\AccessToken;
use OAuth2\Server;

// use OAuthBundle\Constant\Scopes;
// use OAuthBundle\Entity\Client;
// use OAuthBundle\Exception\InsufficientScopeException;

use Doctrine\Common\Persistence\ObjectManager;

class OAuthListener implements ListenerInterface
{

    protected $securityContext;
    
    protected $authenticationManager;


    public function __construct(
        TokenStorageInterface $securityContext, 
        AuthenticationManagerInterface $authenticationManager, 
        ObjectManager $om
    )
    {
        $this->securityContext       = $securityContext;
        $this->authenticationManager = $authenticationManager;
        $this->om                    = $om;
    }
    
  
    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $regex = "/Bearer (.*)/";
        if (!$request->headers->has('authorization') || 1 !== preg_match($regex, $request->headers->get('authorization'), $matches)) {
            $response = new Response();
            $response->setError(401, 'missing_authorization_headers', 'Missing authorization headers');
            $event->setResponse($response);
            return;
        }

        $token = $matches[1];
        $token = $this->om->getRepository('OAuthBundle:AccessToken')->findOneByAccessToken($token);

        if($token === null){
            $response = new Response();
            $response->setError(404, 'token_not_exist', 'Token not found');
            $event->setResponse($response);
        }
        else{

            try {
                
                $authToken = $this->authenticationManager->authenticate($token);
                $this->securityContext->setToken($authToken);

            } 
            catch (RequestLimitException $e){
                $response = new Response();
                $response->setError(401, 'request_limit', 'Limit request reached');
                $event->setResponse($response);
            }
            catch (UsernameNotFoundException $e){
                $response = new Response();
                $response->setError(401, 'token_username', 'Username does not exist');
                $event->setResponse($response);
            }
            catch (InsufficientScopeException $e){
                $response = new Response();
                $response->setError(401, 'insufficient_scope', $e->getMessage());
                $event->setResponse($response);
            }
            catch (AuthenticationException $e) {
                $response = new Response();
                $response->setError(401, 'token_expired', 'Token used has expired');
                $event->setResponse($response);
            }
        }
        
    }
}