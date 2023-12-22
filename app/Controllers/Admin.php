<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Produit;
use App\Models\Contrat;
use App\Models\Demande;
use App\Models\Employe;

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

        $data['contrats'] = Contrat::all();

        if($identifiant == "1"){
            $data['title'] = "Contrat en Attente";
            $data['contrats'] = Contrat::where('employe_id', NULL)->get();
        }else if($identifiant == '2'){
            $data['title'] = "Contrat Assignés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')->get();
        }else if($identifiant == '3'){
            $data['title'] = "Contrat Terminés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')->get();
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
            .view('/admin/ContratAdmin', $data)
            .view('/admin/FooterAdmin');
    
    }

    public function getDemande()
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
            .view('/admin/DemandeAdmin')
            .view('/admin/FooterAdmin');
    }



    public function getEmploye()
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
            .view('/admin/EmployeAdmin')
            .view('/admin/FooterAdmin');
    }


}
