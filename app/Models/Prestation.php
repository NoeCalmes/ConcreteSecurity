<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    public $timestamps = false;

    public function demandes() {
        return $this->belongsToMany('App\Models\Demande')->withPivot('date_debut', 'date_fin', 'adresse', 'ville', 'cp', 'periode');
    }
}