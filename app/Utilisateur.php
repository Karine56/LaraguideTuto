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


     // fillable pour éviter une erreur de type MassAssigment au sujet de l'email : autorise laravel à le remplir en bdd en qq sorte
     protected $fillable = ['email','mot_de_passe', 'avatar'];


    public function messages()
    {
        //l'utilisateur a plusieurs messages : relation OneToMany
        return $this->hasMany(Message::class)->latest();
    }


    public function suivis()
    {
        // relation ManyToMany
        //suivis, en 2eme parametre sera la table de pivot
        //peut renommer les colonnes attendues par laravel : suiveur_id et suivi_id
        // ecrase donc les valeurs par défaut pr la table de pivot
        return $this->belongsToMany(Utilisateur::class, 'suivis', 'suiveur_id', 'suivi_id');
    }

    public function suit($utilisateur)
    {
        //suivis() pour récupérer le querybuilder
        //where (requete de type select)
        //retourne un booleen grâce à exists
        return $this->suivis()->where('suivi_id', $utilisateur->id)->exists();
    }



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }


    // pour pouvoir gérer la déconnexion de l'utilisateur, sans pêter d'erreur lié au token
    // dira à laravel : je n'ai pas de colonne RememberToken

     /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }




}
