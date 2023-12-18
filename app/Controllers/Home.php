<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('/header')
        . view('/template/navbar')
        . view('/acceuil-view')
        . view('/template/footer');
    }
    
}