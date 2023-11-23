<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    public $timestamps = false;

    public function employe() {
        return $this->belongsTo('App\Models\Employe');
    }

    public function periode() {
        return $this->belongsTo('App\Models\Periode');
    }
}