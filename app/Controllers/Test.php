<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Demande;
use App\Models\Employe;
use App\Models\Periode;
use App\Models\Prestation;

class Test extends BaseController {

    public function getIndex() {
        //MODELE CLIENT
        /*     $clients = Client::all();
            d($clients);
            $client = new Client();
            $client->nom="DUPRAT";
            $client->save();

            //demandes
            $client = Client::find(1);
            foreach ($client->demandes as $demande) {
                echo $demande->etat."
                <br>";
            } */

        //----------Test Contrat---------------------//
        /*ss
        $contrats = Contrat::all();
        d($contrats);

        $contrat = new Contrat();
        $contrat->adresse = "youpi";

        $contrat->employe_id = "2";
        $contrat->periode_id = "2";
        //$contrat->save();

        $contrat1 = Contrat::find(1);

        $employe = $contrat1->employe;
        $periode = $contrat1->periode;
        if($employe) {
            echo $employe->nom."<hr>";
            echo $periode->libelle;
        } else {
            echo "<h1>Nom de l'employe pas trouvé ou inexistant</h1>";
        } */


        //----------Test Employe---------------------//

        /* $employe = new Employe();
        $employe->nom = "Fourquet";
        $employe->prenom = "Raphael";
        $employe->id = "";


        //$employe->save();


        $employe1 = Employe::find(1);

        foreach ($employe1->contrats as $contrats) {
            echo $contrats->ville;
            echo $employe1->nom."
            <br>";
        } */


        //----------Test Periode---------------------//

        /* $periode = Periode::find(1);

        foreach ($periode->contrats as $contract){
            echo $contract->id."<br>";
        } */


        //----------Test Prestation avec Pivot---------------------//
        /*
        $prestationId = 2; // Remplacez 2 par l'id de la prestation souhaitée
        $demandesPourPrestation = Prestation::find(2)->demandes;
        
        // Afficher les ID des demandes
        foreach ($demandesPourPrestation as $demande) {
            echo "Etat de la demande : " . $demande->etat . "<br>";
            echo "Date de début de la demande : " . $demande->pivot->date_debut . "<br>";
        }
        */




        //----------Test Demande avec Pivot---------------------//

        /*
        $PrestationPourDemande = Demande::find(115)->prestations;

        //dd($PrestationPourDemande);

        echo $PrestationPourDemande->prix;

        */


    }
}
