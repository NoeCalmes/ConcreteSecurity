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

        $data['Identifiant'] = $identifiant;

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




        $session = session();

        // Vérifiez d'abord si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil ou une autre page si l'admin n'est pas connecté
        }

        // Récupérez le nom de l'admin depuis la session
        $nom = $session->get('nom');

        $data['Name'] = $nom;

        $data['employee'] = Employe::all();

        if ($data['contrats']->count() == 0) {
            return view("/header")
                . view('/admin/NavAdmin', $data)
                . view('/admin/ContratAdmin', $data)
                . view('/admin/FooterAdmin');
        } else {
            if ($id == 'null') {
                $data['contrat'] = $data['contrats'][0];
            } else {
                $data['contrat'] = Contrat::find($id);
            }
        }

        return view("/header")
            . view('/admin/NavAdmin', $data)
            . view('/admin/ContratAdmin', $data)
            . view('/admin/FooterAdmin');
    }

    public function postAssigner()
    {

        $employe_id = $_POST['employe_id'];

        $contrat_id = $_POST['contrat_id'];

        $contrat_modif = Contrat::where('id', $contrat_id)->first();

        $contrat_DateDebut = $contrat_modif->datedebut;

        $contrat_DateFin = $contrat_modif->datefin;


        if ($contrat_modif->employe_id != null) {
            return $this->getContrats(1, null);
        }

        $allcontrat = Contrat::all();

        foreach ($allcontrat as $c) {
            if ($c->employe_id == $employe_id) {
                if ($contrat_DateDebut == $c->datedebut || $contrat_DateFin == $c->datefin) {
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
        $data['identifiant'] = $identifiant;

        // Récupérer les demandes en fonction de l'identifiant
        if ($identifiant == "1") {
            $data['title'] = "Demandes En Attentes";
            $data['demandes'] = Demande::where('etat', "EnAttente")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>';
        } elseif ($identifiant == "2") {
            $data['title'] = "Demandes Refusées";
            $data['demandes'] = Demande::where('etat', "Refusee")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; // Logo à Changer !
        } elseif ($identifiant == "4") {
            $data['title'] = "Demandes Acceptées";
            $data['demandes'] = Demande::where('etat', "Acceptee")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; // Logo à Changer !
        } elseif ($identifiant == "5") {
            $data['title'] = "Demandes En Cours";
            $data['demandes'] = Demande::where('etat', "EnCours")->get();
            $data['logo'] = '<i class="fa-regular fa-hourglass-half"></i>'; // Logo à Changer !
        }

        // Vérifier si l'ID est 'null' pour récupérer la première demande
        if ($id == 'null') {
            if ($data['demandes']->count() > 0) {
                $data['demande'] = $data['demandes'][0];
            }
        } else {
            // Sinon, récupérer la demande par son ID
            $data['demande'] = Demande::find($id);
        }

        $session = session();

        // Vérifiez si l'utilisateur est connecté en tant qu'admin
        if (!$session->has('admin') || !$session->admin) {
            return redirect()->to('/'); // Rediriger vers la page d'accueil si l'admin n'est pas connecté
        }

        // Récupérer le nom de l'admin depuis la session
        $nom = $session->get('nom');
        $data['Name'] = $nom;

        return view("/header")
            . view('/admin/NavAdmin', $data)
            . view('/admin/DemandeAdmin', $data)
            . view('/admin/FooterAdmin');
    }
    public function getEmploye()
    {

        $data['date'] = Date::now()->format('Y-m-d');

        $data['employes'] = Employe::all();

        $data['title'] = "Tous Les Employés";

        $data['employes_contrat'] = Contrat::whereNotNull('employe_id')
            ->whereDate('datefin', '>', $data['date'])
            ->get();




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
            . view('/admin/EmployeAdmin', $data)
            . view('/admin/FooterAdmin');
    }
    public function postValidedemande()
    {
        $demandeIdAcceptee = request()->getPost('demandeIdAccepte');

        // Vérifier si l'identifiant de la demande acceptée existe
        if ($demandeIdAcceptee) {
            // Trouver la demande dans la base de données
            $demande = Demande::find($demandeIdAcceptee);

            // Vérifier si la demande existe et si son état est "EnAttente"
            if ($demande && $demande->etat === 'EnAttente') {
                $demande->etat = 'Acceptee';
                $demande->save();

                // Redirection vers la page admin/demandes/1/null
                return redirect()->to('/admin/demandes/1/null');
            } else {

                return redirect()->to('/admin/demandes/1/null');
            }
        } else {
            // Gérer le cas où l'identifiant de la demande acceptée n'est pas disponible dans les données postées
            // Peut-être afficher un message d'erreur ou rediriger vers une autre page
            return redirect()->to('/admin/demandes/1/null');
        }
    }


    public function postRefusedemande()
    {
        $demandeIdRefusee = request()->getPost('demandeIdRefuse');

        // Vérifier si l'identifiant de la demande acceptée existe
        if ($demandeIdRefusee) {
            // Trouver la demande dans la base de données
            $demande = Demande::find($demandeIdRefusee);

            // Vérifier si la demande existe et si son état est "EnAttente"
            if ($demande && $demande->etat === 'EnAttente') {
                $demande->etat = 'Refusee';
                $demande->save();

                // Redirection vers la page admin/demandes/1/null
                return redirect()->to('/admin/demandes/1/null');
            } else {

                return redirect()->to('/admin/demandes/1/null');
            }
        } else {
            // Gérer le cas où l'identifiant de la demande acceptée n'est pas disponible dans les données postées
            // Peut-être afficher un message d'erreur ou rediriger vers une autre page
            return redirect()->to('/admin/demandes/1/null');
        }
    }


}
