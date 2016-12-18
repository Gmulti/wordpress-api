<?php

namespace OAuthBundle\User;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

interface AdvancedOAuth2UserInterface extends AdvancedUserInterface
{
    public function getScope();
}
