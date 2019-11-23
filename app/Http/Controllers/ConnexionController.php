<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    //
    public function formulaire()
    {
        return view('connexion');
    }


    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // va récupérer les éléments du formulaire et compare les aux données de la BDD
        //récupérer la fonction d'identification native de Laravel : auth()
        //attempt : prend un tableau qui vérifie les parametre de l'utilisateur

        // attention, bien penser à lui dire d'aller utiliser le Model Utilisateur et pas User (par défaut)
        $resultat = auth()->attempt([
            'email' => request('email'),
            //password : fonction clé de laravel, ne pas mettre mot_de_passe
            'password' => request('password'),
        ]);

        //var_dump($resultat);

        //redirection par défaut, si les identifiants sont ok
        if ($resultat) {
            //afficher un flash message signalant le succès de la connexion
            flash("Vous êtes maintenant connecté")->success();

            return redirect('/mon-compte');
        }

        //sinon, va etre redirigé vers la page précédente, avec les données précédemment saisies
        return back()->withInput()->withErrors([
            'email'=>'Vos identifiants sont incorrects'
        ]);
    }


}
