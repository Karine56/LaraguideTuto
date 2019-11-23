<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model {

    // fillable pour éviter une erreur de type MassAssigment au sujet de l'email : autorise laravel à le rajouter en bdd en qq sorte
    protected $fillable = [
        'email',
        'mot_de_passe'
    ];

}
