<?php

namespace OAuthBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use OAuthBundle\DependencyInjection\Security\Factory\OAuthFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OAuthBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new OAuthFactory());
    }
}
