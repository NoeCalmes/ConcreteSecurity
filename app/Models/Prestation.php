<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    public $timestamps = false;

    public function demande() {
        return $this->belongsToMany('App\Models\Demande')->withPivot('demande_id','prestation_id', 'date_debut', 'date_fin', 'adresse', 'ville', 'cp', 'commentaire');
    }
}