<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    public $timestamps = false;

    public function contrat() {
        return $this->hasMany('App\Models\Contrat');
    }
}