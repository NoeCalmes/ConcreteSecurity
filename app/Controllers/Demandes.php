<?php


namespace App\Controllers;

use App\Models\Demande;

class Demandes extends BaseController
{
    public function getindex()
    {
        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant que
        if (!$session->has('user') || !$session->user) {
            return redirect()->to('/user/login');
        }

        // Récupérez le nom du client depuis la session
        $nomclient = $session->get('nom');

        // Récupérez toutes les demandes depuis la base de données avec Eloquent
        $demandes = Demande::all();

        // Passez les données à la vue
        $data['nomclient'] = $nomclient;
        $data['demandes'] = $demandes;

        return view('/header')
            . view('/user/navbar-client')
            . view('/demande-page', $data) // Passez les données à la vue
            . view('/template/footer');
    }
}
