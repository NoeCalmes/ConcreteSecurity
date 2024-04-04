<?php

namespace App\Controllers;

class mentionlegales extends BaseController
{

    public function getIndex(): string
    {
        $navbarView = 'template/navbar';




        // Vérifier si'utilisateur est connecté en  ltant que client
        $session = session();
        if ($session->has('user') && $session->user) {
            $navbarView = 'user/navbar-client';
        }

        return view($navbarView)
            . view('/header')
            . view('/mention')
            . view('/template/footer');
    }
}