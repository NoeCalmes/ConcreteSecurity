<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    public function demandes() {
        return $this->hasMany('App\Models\Demande');
    }  
}
