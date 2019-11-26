<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;
use App\Message;


class UtilisateursController extends Controller
{
    //
    public function liste()
    {
        // pour aller chercher la classe, le model nécessaire
        $utilisateurs = Utilisateur::all();

        return view('utilisateurs', [
        'utilisateurs' => $utilisateurs,
        ]);
    }

    public function voir()
    {
        //récupérer l'email de la personne
        $email = request('email');

        //cible uniquement les utilisateur de la BDD dont l'email correspond à notre $email (cf route générique dans web.php)
        //first() : pour récupérer le 1er résultats uniquement
        //firstOrFail() : affiche le 1er élément et s'il n'y en a pas, affiche une 404
        $utilisateur = Utilisateur::where('email', $email)->firstOrFail();
        //get() pour récupérer tous les résultats
        //attention à bien redéfinir le use App\Message !
        //'utilisateur_id', $utilisateur->id : permet de dire que l'utilisateur récupéré correspond à utilisateur id dans la colonne de la bdd
        //latest correspond à orderByDesc('created_at')
        //$messages = Message::where('utilisateur_id', $utilisateur->id)->latest('created_at')->get();

        //avec la relation hasMany
        //messages : se réfère au nom de la fonction dans le Model Utilisateur => va trouver la relation
        //$messages = $utilisateur->messages;
        //mais peut aussi le passer directement dans la view, au vu de la simplicité du code

        //dump($utilisateur);

        return view('utilisateur', [
            'utilisateur' => $utilisateur,
        ]);

    }
}
