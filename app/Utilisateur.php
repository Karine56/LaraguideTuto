<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Database\Eloquent\Model;


class Utilisateur extends Model implements Authenticatable {

    // utilise les 6 méthodes par défaut
    use BasicAuthenticatable;
    // aller verifier dans vendor\laravel\framework\src\Illuminate\Auth\Authenticatable.php si le getAuthPAssword() est le bon
    // si ce n'est pas le bon, la réécrire ici avec le nom de la colonne dans la BDD


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }


    // fillable pour éviter une erreur de type MassAssigment au sujet de l'email : autorise laravel à le rajouter en bdd en qq sorte
    protected $fillable = [
        'email',
        'mot_de_passe'
    ];

}
