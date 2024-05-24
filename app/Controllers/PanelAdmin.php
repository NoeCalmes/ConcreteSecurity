<?php

namespace App\Controllers;

class PanelAdmin extends BaseController
{
    public function getindex(): string
    {
        return view('/admin/NavAdmin')
        .view('/admin/MainAdmin')
        .view('/admin/FooterAdmin');
    }
}