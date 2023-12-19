<?php

namespace App\Controllers;
use App\Models\Useradmin;

class useradminctrl extends BaseController
{
    public function getindex(): string
    {
        return view('/admin/login-admin');
    }

    public function postAdminlogin() {
        $identifiant = request()->getPost('identifiant');
        $mdp = request()->getPost('mdp');


        $useradminModele = new Useradmin();

        if ($useradminModele->isAdmin($identifiant,$mdp)) {
            // Si les identifiants sont bien ceux d'un admin
                $session = session();
                $sessiondata = array(
                       'nom'  => $identifiant,
                       'admin'=> true
                    );
                $session->set($sessiondata);
                return redirect()->to('/admin/home');
            }
            else {
                return view('/admin/login-admin');
            }
    }

    public function getAdminlogout(){
        $session = session();
        
        $session->destroy();
        
        return redirect()->to('/');
    }
}