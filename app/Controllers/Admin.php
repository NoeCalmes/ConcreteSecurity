<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\User;
use App\Models\Produit;

class Admin extends BaseController
{
    public function getHome()
    {
        return view("/header")
        .view('/admin/NavAdmin')
        .view('/admin/MainAdmin')
        .view('/admin/FooterAdmin');
    }

   
    public function getContrat()
    {
    
    }


}
