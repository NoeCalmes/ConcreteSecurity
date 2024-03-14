<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userclient extends Model
{
    protected $table = 'clients'; // Nom de la table dans la base de données

    public $timestamps = false;

    public function isClient($emailconnect, $mdpconnect)
    {
        $user = $this->where('mail', $emailconnect)->first();
    
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($mdpconnect, $user->mdp)) {
            return true;
        }
    
        return false;
    }

    public function getClientByEmail($email)
    {
        return $this->where('mail', $email)->first();
    }
    
    // Méthode pour obtenir le mot de passe haché
    public function getHashedPassword($email) {
        $user = $this->where('mail', $email)->first();
        return $user ? $user->mdp : null;
    }
}
