<?php

namespace App\Controllers;

class useradmin extends BaseController
{
    public function getindex(): string
    {
        return view('/user/login-admin');
    }
}