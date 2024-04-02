<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function prestations()
    {
        return $this->belongsToMany('App\Models\Prestation')->withPivot('date_debut', 'date_fin', 'adresse', 'ville', 'cp', 'periode');
    }
}