<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $navbarView = 'template/navbar';

        // Vérifier si l'utilisateur est connecté en tant que client
        $session = session();
        if ($session->has('user') && $session->user) {
            $navbarView = 'user/navbar-client';
        }

        return view('header')
            . view($navbarView)
            . view('acceuil-view')
            . view('template/footer');
    }
}
