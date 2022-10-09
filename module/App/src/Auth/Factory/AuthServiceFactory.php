<?php

namespace App\Auth\Factory;

use App\Auth\AuthServiceInterface;
use App\Auth\AuthServiceStub;

class AuthServiceFactory
{
    public static function create(): AuthServiceInterface
    {
        return new AuthServiceStub(
            $_ENV['USER_NAME'],
            $_ENV['USER_EMAIL']
        );
    }
}
