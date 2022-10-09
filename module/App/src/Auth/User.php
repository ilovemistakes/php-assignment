<?php

namespace App\Auth;

class User
{
    private $name;

    private $email;

    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function setEmail(?string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
