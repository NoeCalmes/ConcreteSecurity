<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Produit;
use App\Models\Contrat;
use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Support\Facades\Date;


class Admin extends BaseController
{
    public function getHome()
    {
        $session = session();
        
        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');
        
        $data['Name'] = $nom;

        return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/MainAdmin')
            .view('/admin/FooterAdmin');
    }

   
    public function getContrat($identifiant)
    {
        //$identifiant = $this->request->getPost('contratChoice');

        //dd($identifiant);

        $data['date'] = Date::now()->format('Y-m-d');

        $data['contrats'] = Contrat::all();

        if($identifiant == "1"){
            $data['title'] = "Contrats en Attente";
            $data['contrats'] = Contrat::where('employe_id', NULL)->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        }else if($identifiant == '2'){
            $data['title'] = "Contrats Assignés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
            ->whereDate('datefin', '>=', $data['date'])
            ->get();
            $data['logo'] = '<i class="fa-solid fa-sheet-plastic"></i>';
        }else if($identifiant == '3'){
            $data['title'] = "Contrats Terminés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
            ->whereDate('datefin', '<', $data['date'])
            ->get();
            $data['logo'] = '<i class="fa-solid fa-file-circle-check"></i>';
        }
        


        $session = session();
        
        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');
        
        $data['Name'] = $nom;

        $data['Identifiant'] = $identifiant;

        return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/ContratAdmin', $data)
            .view('/admin/FooterAdmin');
    
    }


    public function getContrats($identifiant, $id){

        $data['date'] = Date::now()->format('Y-m-d');

        $data['contrats'] = Contrat::all();

        $data['identifiant'] = $identifiant;


        if($identifiant == "1"){
            $data['title'] = "Contrats en Attente";
            $data['contrats'] = Contrat::where('employe_id', NULL)->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        }else if($identifiant == '2'){
            $data['title'] = "Contrats Assignés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
            ->whereDate('datefin', '>=', $data['date'])
            ->get();
            $data['logo'] = '<i class="fa-solid fa-sheet-plastic"></i>';
        }else if($identifiant == '3'){
            $data['title'] = "Contrats Terminés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
            ->whereDate('datefin', '<', $data['date'])
            ->get();
            $data['logo'] = '<i class="fa-solid fa-file-circle-check"></i>';
        }



        
        $session = session();
        
        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');
        
        $data['Name'] = $nom;

        $data['employee'] = Employe::all();

        if ($data['contrats']->count() == 0){
            return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/ContratAdmin', $data)
            .view('/admin/FooterAdmin');
        }else{
            if ($id == 'null'){
                $data['contrat'] =  $data['contrats'][0];
            }else{
                $data['contrat'] = Contrat::find($id);
            }
        }

        return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/ContratAdmin', $data)
            .view('/admin/FooterAdmin');
    }

    public function postAssigner()
    {
        //var_dump($_POST);

        $employe_id = $_POST['employe_id'];

        $contrat_id = $_POST['contrat_id'];

        $contrat_modif = Contrat::where('id', $contrat_id)->first();

        $contrat_DateDebut = $contrat_modif->datedebut;

        $contrat_DateFin = $contrat_modif->datefin;

        print($contrat_modif);
        
        if ($contrat_modif->employe_id != null){
            return $this->getContrats(1, null);
        }

        $allcontrat = Contrat::all();

        foreach ($allcontrat as $c){
            if ($c->employe_id == $employe_id){
                if ($contrat_DateDebut == $c->datedebut || $contrat_DateFin == $c->datefin){
                    return $this->getContrats(1, null);
                }
            }
        }

        $contrat_modif->employe_id = $employe_id;
        $contrat_modif->save();


        return $this->getContrats(1, null);
    }

    

    public function getDemandes($identifiant, $id)
    {

        $data['demandes'] = Demande::all();

        $data['identifiant'] = $identifiant;

        if($identifiant == "1"){
            $data['title'] = "Demandes En Attentes";
            $data['demandes'] = Demande::where('etat', "EnAttente")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        }elseif($identifiant == "2"){
            $data['title'] = "Demandes Refusées";
            $data['demandes'] = Demande::where('etat', "Refusee")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; //Logo à Changer !
        }elseif($identifiant == "3"){
            $data['title'] = "Demandes Signées";
            $data['demandes'] = Demande::where('etat', "Signee")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; //Logo à Changer !
        }elseif($identifiant == "4"){
            $data['title'] = "Demandes Acceptée";
            $data['demandes'] = Demande::where('etat', "Acceptee")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; //Logo à Changer !
        }elseif($identifiant == "5"){
            $data['title'] = "Demandes En Cours";
            $data['demandes'] = Demande::where('etat', "EnCours")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; //Logo à Changer !
        }

        if ($id == 'null'){
            $data['demande'] =  $data['demandes'][0];
        }else{
            $data['demande'] = Demande::find($id);
        }



        $session = session();
        
        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');
        
        $data['Name'] = $nom;
        

        return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/DemandeAdmin', $data)
            .view('/admin/FooterAdmin');
    }



    public function getEmploye()
    {

        $data['employes'] = Employe::all();


        $session = session();
        
        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');
        
        $data['Name'] = $nom;

        $data['Name'] = $nom;

        return view("/header")
            .view('/admin/NavAdmin', $data)
            .view('/admin/EmployeAdmin', $data)
            .view('/admin/FooterAdmin');
    }


}
