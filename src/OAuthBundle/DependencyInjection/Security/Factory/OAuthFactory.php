<?php

namespace OAuthBundle\DependencyInjection\Security\Factory;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;

class OAuthFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $providerId = 'security.authentication.provider.oauth.'.$id;
        $container
            ->setDefinition($providerId, new DefinitionDecorator('oauth.security.authentication.provider'))
            ->replaceArgument(0, new Reference($userProvider))
        ;

        $listenerId = 'security.authentication.listener.oauth.'.$id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('oauth.security.authentication.listener'));

        return array($providerId, $listenerId, $defaultEntryPoint);
    }
    /**
     * {@inheritdoc}
     */
    public function getPosition()
    {
        return 'pre_auth';
    }
    
    /**
     * {@inheritdoc}
     */
    public function getKey()
    {
        return 'oauth';
    }

    /**
     * {@inheritdoc}
     */
    public function addConfiguration(NodeDefinition $node)
    {

    }
}