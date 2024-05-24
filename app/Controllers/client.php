<?php
namespace App\Controllers;

class Client extends BaseController
{
     
    public function getPannel()
    {
        $navbarView = 'template/navbar';

        // Vérifier si l'utilisateur est connecté en tant que client
        $session = session();
        if ($session->has('user') && $session->user) {
            $navbarView = 'user/navbar-client';
        }


        return view("/header")
            .view($navbarView)
            .view('/acceuil-view')
            .view('/template/footer');

    }
    
}