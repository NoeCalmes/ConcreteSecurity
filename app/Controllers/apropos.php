<?php

namespace App\Controllers;

class Apropos extends BaseController
{

    public function getIndex(): string
    {
        
        $navbarView = 'template/navbar';

        // Vérifier si l'utilisateur est connecté en tant que client
        $session = session();
        if ($session->has('user') && $session->user) {
            $navbarView = 'user/navbar-client';
        }

        return view($navbarView)
            . view('/header')
            . view('/apropos-view')
            . view('/template/footer');
    }
}