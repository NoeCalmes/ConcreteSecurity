<?php

namespace App\Controllers;

class apropos extends BaseController
{
    public function getindex(): string
    {
        return view('/template/navbar')
            . view('/apropos/apropos')
            . view('/template/footer');
    }
}