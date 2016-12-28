<?php

namespace OAuthBundle\EventListener;

use ApiPlatform\Core\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use ApiPlatform\Core\EventListener\DeserializeListener as DecoratedListener;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use ApiPlatform\Core\Serializer\SerializerContextBuilderInterface;

final class DeserializeListener
{
    private $decorated;
    private $denormalizer;
    private $serializerContextBuilder;

    public function __construct(DenormalizerInterface $denormalizer, SerializerContextBuilderInterface $serializerContextBuilder, DecoratedListener $decorated)
    {
        $this->denormalizer = $denormalizer;
        $this->serializerContextBuilder = $serializerContextBuilder;
        $this->decorated = $decorated;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $request = $event->getRequest();
        if ($request->isMethodSafe() || $request->isMethod(Request::METHOD_DELETE)) {
            return;
        }

        if ('POST' === $request->getMethod() && $request->get("_route") === "_token") {
            $this->denormalizeFormRequest($request);
        } else {
            $this->decorated->onKernelRequest($event);
        }
    }

    private function denormalizeFormRequest(Request $request)
    {
        try {
            $body = $request->getContent();
            
            if(is_string($body)){
                $body = json_decode($body);
            }


            foreach ($body as $key => $value) {
                $request->request->set($key, $value);
            }
            
        } catch (RuntimeException $e) {
            return;
        }

    }
}