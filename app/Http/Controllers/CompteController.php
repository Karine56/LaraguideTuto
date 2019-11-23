<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{

    //vérifier si un utilisateur est connecté et gerer sa redirection
    public function accueil()
    {
        // vérifier si connecté
        //var_dump(auth()->check());

        //à l'inverse, vérifie si l'utilisateur est un invité
        //var_dump(auth()->guest());

        //si l'utilisateur est un invité, on le renvoie vers la page de connexion, avec message d'erreur
        if(auth()->guest()) {
            return redirect('/connexion')->withErrors([
                'email' => "Vous devez être connecté pour voir cette page",
            ]);
        }

        return view('mon-compte');
    }

    public function deconnexion()
    {
        //gerer la deconnexion
        auth()->logout();

        return redirect('/');

    }
}
