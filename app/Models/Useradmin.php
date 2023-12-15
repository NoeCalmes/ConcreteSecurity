<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useradmin extends Model
{

    public $timestamps = false;

    public function isAdmin($identifiant,$mdp) {
        $db = \Config\Database::connect();
        $builder = $db->table('useradmins');
        $query = $builder->getWhere(['nom' => $identifiant, 'password' => $mdp, 'role' => 'admin']);
        return count($query->getResult());
    }

}