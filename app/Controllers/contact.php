<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function getindex(): string
    {

        $navbarView = 'template/navbar';

        // Vérifier si l'utilisateur est connecté en tant que client
        $session = session();
        if ($session->has('user') && $session->user) {
            $navbarView = 'user/navbar-client';
        }

        return view($navbarView)
            . view('/contact-view')
            . view('/header')
            . view('/template/footer');
    }
}