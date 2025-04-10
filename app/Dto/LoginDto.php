<?php

namespace App\Dto;

class LoginDto
{
    public string $login;
    public string $password;
    public bool $remember;
    public string $throttleKey;

    public function __construct(string $login,string $password,bool $remember)
    {
        $this->login = $login;
        $this->password = $password;
        $this->remember = $remember;
        $this->throttleKey = $login.'|'.request()->ip();
    }

}
