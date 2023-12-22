<?php

namespace App\Controllers;

use App\Models\Client;

class User extends BaseController
{
    public function getIndex(): string
    {
        return view('/template/navbar')
            . view('/user/userlogin')
            . view('/template/footer');
    }

    public function postCreateAccount()
    {
        // Utilisez le service input pour récupérer les données du formulaire
        $nom = request()->getPost('nom-user');
        $email = request()->getPost('email-user');
        $mot_de_passe = request()->getPost('mdp-user');

        // Créer une nouvelle instance du modèle Client
        $client = new Client();
        $client->nom = $nom;
        $client->mail = $email;
        $client->mdp = $mot_de_passe;

        // Enregistrer le client dans la base de données
        $client->save();

        // Vous pouvez également rediriger l'utilisateur vers une autre page après l'inscription
        return $this->getIndex();
    }


    public function postLogin()
    {
     /*    $email = request()->getPost('email-connect');
        $mdp = request()->getPost('mdp-connect');


        return view('/user/navbar-client')
        . view('/user/userlogin')
        . view('/template/footer'); */

    }

    public function gettest() {
        return view('/user/navbar-client')
        . view('/header');
        
    }

}
