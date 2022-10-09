<?php

namespace App\Auth;

use SocialPost\User\UserDataProviderInterface;

class SocialPostAdapter implements UserDataProviderInterface
{
    public function __construct(private AuthServiceInterface $authService)
    {
    }

    public function getUserName(): string
    {
        return $this->authService->getUser()->getName();
    }

    public function getUserEmail(): string
    {
        return $this->authService->getUser()->getEmail();
    }
}
