<?php

namespace App\Controllers;

use App\Models\Client;


class Modification extends BaseController
{
    public function getindex()
    {
        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant que
        if (!$session->has('user') || !$session->user) {
            return redirect()->to('/user/login');
        }

        // Récupérez les informations du client depuis la session
        $nomclient = $session->get('nom');
        $mailclient = $session->get('mail');
        $telclient = $session->get('tel');
        $villeclient = $session->get('ville');
        $cpclient = $session->get('cp');
        $rueclient = $session->get('rue');

        // Passez les données à la vue
        $data['nomclient'] = $nomclient;
        $data['mailclient'] = $mailclient;
        $data['telclient'] = $telclient;
        $data['villeclient'] = $villeclient;
        $data['cpclient'] = $cpclient;
        $data['rueclient'] = $rueclient;

        return view('/header')
            . view('/user/navbar-client')
            . view('user/modification-infoclient', $data) // Passez les données à la vue
            . view('/template/footer');
    }

    public function postupdate()
    {
        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant que
        if (!$session->has('user') || !$session->user) {
            return redirect()->to('/user/login');
        }

        // Récupérez les données du formulaire à partir de la superglobale $_POST
        $nom = $_POST['nom'] ?? null;
        $tel = $_POST['tel'] ?? null;
        $rue = $_POST['rue'] ?? null;
        $cp = $_POST['cp'] ?? null;
        $ville = $_POST['ville'] ?? null;

        // Mettez à jour les informations du client dans la session
        $session->set([
            'nom' => $nom,
            'tel' => $tel,
            'rue' => $rue,
            'cp' => $cp,
            'ville' => $ville,
        ]);

        // Mettez à jour les informations du client dans la base de données
        // Remplacez "Client" par le modèle correspondant à votre table client
        $client = new Client();
        $client->where('mail', $session->get('mail'))->update([
            'nom' => $nom,
            'tel' => $tel,
            'rue' => $rue,
            'cp' => $cp,
            'ville' => $ville,
        ]);

        // Redirigez l'utilisateur vers la page d'index après la mise à jour
        return redirect()->to('modification');
    }

}
