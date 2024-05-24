<?php

namespace App\Controllers;

class Useradmin extends BaseController
{
    public function getIndex(): string
    {
        return view('/user/login-admin');
    }
}