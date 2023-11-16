<?php

namespace App\Controllers;

class contact extends BaseController
{
    public function getindex(): string
    {
        return view('/template/navbar')
            . view('/contact/contact')
            . view('/template/footer');
    }
}