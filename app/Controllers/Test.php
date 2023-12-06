<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Contrat;

class Test extends BaseController
{
    public function getIndex()
    {
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
        
        //----------Test Contrat

        $contrats = Contrat::all();
        d($contrats);

        $contrat = new Contrat();
        $contrat->adresse="youpi";
 
        $contrat->employe_id="2";
        $contrat->periode_id="2";
        $contrat->save();

        $contrat = Contrat::find(3);
        foreach ($contrat->employe as $employe) {
            echo $employe->adresse."<br>";
        } 

    }
}
