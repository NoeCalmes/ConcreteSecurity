<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Userclient;

class User extends BaseController
{
    public function getIndex(): string
    {
        return view('header')
            . view('template/navbar')
            . view('/user/userlogin')
            . view('/template/footer');
    }

    public function postCreateAccount()
    {
        // Utilisez le service input pour récupérer les données du formulaire
        $nom = request()->getPost('nom-user');
        $email = request()->getPost('email-user');
        $mot_de_passe = request()->getPost('mdp-user');

        // Hacher le mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Créer une nouvelle instance du modèle Client
        $client = new Client();
        $client->nom = $nom;
        $client->mail = $email;
        $client->mdp = $hashed_password; // Utiliser le mot de passe haché

        // Enregistrer le client dans la base de données
        $client->save();

        // Vous pouvez également rediriger l'utilisateur vers une autre page après l'inscription
        return $this->getIndex();
    }

    public function postLogin()
    {
        $emailconnect = request()->getPost('emailconnect');
        $mdpconnect = request()->getPost('mdpconnect');

        $useradminModele = new Userclient();

        $user = $useradminModele->getClientByEmail($emailconnect);

        if ($user && password_verify($mdpconnect, $user->mdp)) {
            // Si les identifiants sont bien ceux d'un client
            $session = session();
            $sessiondata = array(
                'mail' => $emailconnect,
                'user' => true,
                'nom' => $user->nom, // Ajoutez le nom du client dans la session
                'tel' => $user->tel,
                'rue' => $user->rue,
                'cp' => $user->cp,
                'ville' => $user->ville,
                'user_id' => $user->id,
            );
            $session->set($sessiondata);

            // Redirection explicite vers la nouvelle URL
            return redirect()->to('/client/pannel');
        } else {
            return $this->getIndex();
        }
    }

    public function getClientByEmail($email)
    {
        return $this->where('mail', $email)->first();
    }

    public function getUserlogout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to('/');
    }

    public function getHomeuser()
    {
        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant que client
        if (!$session->has('user') || !$session->user) {
            return $this->getIndex();
        }
    }
}
