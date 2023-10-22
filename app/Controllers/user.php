<?php

namespace App\Controllers;

class user extends BaseController
{
    public function getindex(): string
    {
        return view('/template/navbar')
            . view('/user/userlogin')
            . view('/template/footer');
    }
}