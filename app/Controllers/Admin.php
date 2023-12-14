<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Produit;

class Admin extends BaseController
{
    public function postLogin()
    {
        $rules = [
            "login" => [
                "label" => "'Identifiant'",
                "rules" => "required"
            ],
            "pwd" => [
                "label" => "'Mot de passe'",
                "rules" => "required"
            ]
        ];

        if ($this->validate($rules)) {
            $login = $this->request->getPost('login');
            $pwd = $this->request->getPost('pwd');
            $userModele = new User();
            if ($userModele->isAdmin($login, $pwd)) {
                // Si les identifiants sont bien ceux d'un admin
                $session = session();
                $sessiondata = array(
                    'nom' => $this->request->getPost('login'),
                    'admin' => true
                );
                $session->set($sessiondata);
                return redirect()->to('/admin/home');
            } else {
                // Si erreur d'identification
                $data['titre'] = "Bienvenue sur ProdIgniter";
                $data['soustitre'] = "Les identifiants saisis ne permettent pas de se connecter en tant qu'administrateur";
                return view('template/header')
                    . view('login_form', $data)
                    . view('template/footer');
            }
        } else {
            // Si saisie non valide
            $data['erreurs'] = $this->validator->getErrors();
            $data['titre'] = "Bienvenue sur ProdIgniter";
            $data['soustitre'] = "Les valeurs saisies ne sont pas valides.";
            return view('template/header')
                . view('login_form', $data)
                . view('template/footer');
        }
    }

    public function getLogout()
    {
        /* $session = session();
        $session->destroy();
        return redirect()->to('/'); */
    }

    public function getHome()
    {
        return view('/admin/NavAdmin')
        .view('/admin/MainAdmin')
        .view('/admin/FooterAdmin');
    }

   
    public function getContrat()
    {
    
    }


}
