<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Demande;
use App\Models\Prestation;

class Panelclient extends BaseController
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
        // Récupérer l'ID de l'utilisateur connecté
        $userId = $session->get('user_id');
        // Récupérer toutes les demandes de l'utilisateur connecté
        $demandes = Demande::where('client_id', $userId)->get();


        $data = [];
        $dataEnAttente = [];
        $dataValide = [];
        $dataRefusee = [];
        $dataEnCours = [];
        // Compter le nombre de demandes dans chaque état

        $nombreTotalDemandes = Demande::where('client_id', $userId)->count();
        $nombreEnAttente = Demande::where('client_id', $userId)->where('etat', 'EnAttente')->count();
        $nombreValidees = Demande::where('client_id', $userId)->where('etat', 'Validé')->count();
        $nombreRefusees = Demande::where('client_id', $userId)->where('etat', 'Refusé')->count();
        $nombreEnCours = Demande::where('client_id', $userId)->where('etat', 'EnCours')->count();

        // Parcourir toutes les demandes
        foreach ($demandes as $demande) {
            // Récupérer les prestations liées à cette demande
            $prestations = $demande->prestations;
            // Initialiser le prix total des prestations pour cette demande
            $prixTotal = 0;


            $prestationsDetails = [];


            foreach ($prestations as $prestation) {

                $descriptionPrestation = $prestation->description;


                $prixPrestation = $prestation->prix;
                $adressePrestation = $prestation->adresse;
                // Ajouter le prix de cette prestation au prix total
                $prixTotal += $prixPrestation;

                // Stocker les détails de la prestation dans le tableau
                $prestationsDetails[] = [
                    'description' => $prestation->description,
                    'prix' => $prestation->prix,
                    'date_debut' => $prestation->pivot->date_debut,
                    'date_fin' => $prestation->pivot->date_fin,
                    'adresse' => $prestation->pivot->adresse,
                    'ville' => $prestation->pivot->ville,
                    'cp' => $prestation->pivot->cp,
                    'periode' => $prestation->pivot->periode,
                ];
            }

            // Ajouter les détails de la demande (avec les prestations, le prix total, la date de début et la date de fin) dans le tableau global
            $data[] = [
                'demande' => $demande,
                'prestations' => $prestationsDetails,
                'prixTotal' => $prixTotal
            ];
            // Si la demande est en attente, l'ajouter également aux données spécifiques des demandes en attente
            if ($demande->etat === 'EnAttente') {
                $dataEnAttente[] = [
                    'demande' => $demande,
                    'prestations' => $prestationsDetails,
                    'prixTotal' => $prixTotal
                ];
            }

            // Si la demande est validée, l'ajouter également aux données spécifiques des demandes validées
            if ($demande->etat === 'Validé') {
                $dataValide[] = [
                    'demande' => $demande,
                    'prestations' => $prestationsDetails,
                    'prixTotal' => $prixTotal
                ];
            }

            // Si la demande est refusée, l'ajouter également aux données spécifiques des demandes refusées
            if ($demande->etat === 'Refusé') {
                $dataRefusee[] = [
                    'demande' => $demande,
                    'prestations' => $prestationsDetails,
                    'prixTotal' => $prixTotal
                ];
            }

            // Si la demande est en cours, l'ajouter également aux données spécifiques des demandes en cours
            if ($demande->etat === 'EnCours') {
                $dataEnCours[] = [
                    'demande' => $demande,
                    'prestations' => $prestationsDetails,
                    'prixTotal' => $prixTotal
                ];
            }
        }


        return view('/header')
            . view('/user/navbar-client')
            . view('user/panel-client', [
                'data' => $data,
                'dataEnAttente' => $dataEnAttente,
                'dataValide' => $dataValide,
                'dataRefusee' => $dataRefusee,
                'dataEnCours' => $dataEnCours,
                'nomclient' => $nomclient,
                'nombreTotalDemandes' => $nombreTotalDemandes,
                'nombreEnAttente' => $nombreEnAttente,
                'nombreValidees' => $nombreValidees,
                'nombreRefusees' => $nombreRefusees,
                'nombreEnCours' => $nombreEnCours,
            ])
            . view('/template/footer');
    }

    public function postConfirmerEtPayer()
    {
        $demandeId = request()->getPost('demandeId');
        // Recherchez la demande correspondante dans la base de données
        $demande = Demande::find($demandeId);

        // Vérifiez si la demande existe
        if (!$demande) {
            // Gérer le cas où la demande n'est pas trouvée
            return redirect()->back()->with('error', 'La demande n\'existe pas.');
        }

        // Mettez à jour l'état de la demande pour la passer en "EnCours"
        $demande->etat = 'EnCours';
        $demande->save();

        // Redirigez l'utilisateur vers la page de son panel client
        return redirect()->to('/panelclient')->with('success', 'La demande a été passée en état "EnCours"');
    }
}
