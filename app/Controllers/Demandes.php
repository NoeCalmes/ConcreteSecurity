<?php


namespace App\Controllers;

use App\Models\Prestation;
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
        // Récupérez toutes les prestations depuis la base de données avec Eloquent
        $prestations = Prestation::all();

        // Passez les données à la vue
        $data['nomclient'] = $nomclient;
        $data['prestations'] = $prestations;


        return view('/header')
            . view('/user/navbar-client')
            . view('user/demande-page', $data)
            . view('/template/footer');
    }

    public function postEnregistrer()
    {
        // Vérifiez d'abord si l'utilisateur est connecté
        if (!session()->has('user') || !session()->get('user')) {
            return redirect()->to('/user/login');
        }

        // Récupérez les données du formulaire soumises par l'utilisateur
        $dateDebut = request()->getPost('date_debut');
        $dateFin = request()->getPost('date_fin');
        $adresse = request()->getPost('adresse');
        $ville = request()->getPost('ville');
        $cp = request()->getPost('cp');
        $prestations = request()->getPost('prestations');
        $periode = request()->getPost('choix');
        /* Récupérer l'id du client */
        $user_id = session()->get('user_id');



        // Vérifier si la date de début est antérieure à la date de fin
        if (strtotime($dateDebut) >= strtotime($dateFin)) {
            // Rediriger avec un message d'erreur
            return redirect()->back()->withInput()->with('error', 'La date de début doit être antérieure à la date de fin.');
        }


        // Vérifiez si $prestations est défini et n'est pas null
        if ($prestations !== null) {
            // Créez une nouvelle demande
            $demande = new Demande();
            $demande->dated = date('Y-m-d'); // Date actuelle
            $demande->etat = 'EnAttente';
            $demande->client_id = $user_id;
            $demande->save();

            // Attachez chaque prestation sélectionnée à la demande avec les détails supplémentaires
            foreach ($prestations as $prestation) {
                $demande->prestations()->attach($prestation, [
                    'date_debut' => $dateDebut,
                    'date_fin' => $dateFin,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'cp' => $cp,
                    'periode' => $periode,
                ]);
            }
        } else {
            // Gérer le cas où aucune prestation n'a été sélectionnée
            // Par exemple, afficher un message d'erreur ou rediriger l'utilisateur
        }

        return redirect()->to('../panelclient');

    }

}




