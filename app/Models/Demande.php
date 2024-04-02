<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public $timestamps = false;
    protected $table = 'prestations'; // Nom correct de votre table de base de données
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'description', 'prix', 'periode'];
    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function prestations()
    {
        return $this->belongsToMany('App\Models\Prestation')->withPivot('date_debut', 'date_fin', 'adresse', 'ville', 'cp', 'periode');
    }
}