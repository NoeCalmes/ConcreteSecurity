<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useradmin extends Model
{

    public $timestamps = false;
    
    public function isAdmin($nom,$pwd) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->getWhere(['nom' => $nom, 'password' => $pwd, 'role' => 'admin']);
        return count($query->getResult());
    }
}