<?php

namespace App\Auth;

/**
 * Application-wide authentication guard stub.
 * It just mocks the user with credentials passed
 * as constructor parameters.
 *
 * Another possible implementation are JWT decoder
 * or PHP user session storage.
 */
class AuthServiceStub implements AuthServiceInterface
{
    /**
     * @var User
     */
    private $user;

    public function __construct(private string $name, private string $email)
    {
        $this->user = new User();
        $this->user->setName($name);
        $this->user->setEmail($email);
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
