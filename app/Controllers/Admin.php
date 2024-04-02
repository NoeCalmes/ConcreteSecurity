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
            . view('/admin/NavAdmin', $data)
            . view('/admin/MainAdmin')
            . view('/admin/FooterAdmin');
    }


    public function getContrat($identifiant)
    {
        //$identifiant = $this->request->getPost('contratChoice');

        //dd($identifiant);

        $data['date'] = Date::now()->format('Y-m-d');

        $data['contrats'] = Contrat::all();

        if ($identifiant == "1") {
            $data['title'] = "Contrats en Attente";
            $data['contrats'] = Contrat::where('employe_id', NULL)->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        } else if ($identifiant == '2') {
            $data['title'] = "Contrats Assignés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
                ->whereDate('datefin', '>=', $data['date'])
                ->get();
            $data['logo'] = '<i class="fa-solid fa-sheet-plastic"></i>';
        } else if ($identifiant == '3') {
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

        return view("/header")
            . view('/admin/NavAdmin', $data)
            . view('/admin/ContratAdmin', $data)
            . view('/admin/FooterAdmin');

    }


    public function getContrats($identifiant, $id)
    {

        $data['date'] = Date::now()->format('Y-m-d');

        $data['contrats'] = Contrat::all();

        $data['identifiant'] = $identifiant;


        if ($identifiant == "1") {
            $data['title'] = "Contrats en Attente";
            $data['contrats'] = Contrat::where('employe_id', NULL)->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        } else if ($identifiant == '2') {
            $data['title'] = "Contrats Assignés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
                ->whereDate('datefin', '>=', $data['date'])
                ->get();
            $data['logo'] = '<i class="fa-solid fa-sheet-plastic"></i>';
        } else if ($identifiant == '3') {
            $data['title'] = "Contrats Terminés";
            $data['contrats'] = Contrat::whereNotNull('employe_id')
                ->whereDate('datefin', '<', $data['date'])
                ->get();
            $data['logo'] = '<i class="fa-solid fa-file-circle-check"></i>';
        }

        if ($id == 'null') {
            $data['contrat'] = $data['contrats'][0];
        } else {
            $data['contrat'] = Contrat::find($id);
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
            . view('/admin/NavAdmin', $data)
            . view('/admin/ContratAdmin', $data)
            . view('/admin/FooterAdmin');
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
            . view('/admin/NavAdmin', $data)
            . view('/admin/DemandeAdmin')
            . view('/admin/FooterAdmin');
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
            . view('/admin/NavAdmin', $data)
            . view('/admin/EmployeAdmin')
            . view('/admin/FooterAdmin');
    }


}
