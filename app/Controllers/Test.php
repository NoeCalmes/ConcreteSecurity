<?php

namespace App\Controllers;

use App\Models\Client;

class Test extends BaseController
{
    public function getIndex()
    {
        $clients = Client::all();

        dd($clients);
    }
}
