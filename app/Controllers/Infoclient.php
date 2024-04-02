<?php

namespace App\Controllers;

use App\Models\Client;


class InfoClient extends BaseController
{
    public function getindex()
    {
        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant que
        if (!$session->has('user') || !$session->user) {
            return redirect()->to('/user/login');
        }

      

        return view('/header')
            . view('/user/navbar-client')
            . view('user/page-infoclient')
            . view('/template/footer');
    }

    
}
