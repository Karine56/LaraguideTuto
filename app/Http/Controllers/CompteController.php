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
            //pour lui permettre de s'afficher, ne pas oublier de mettre dans layout.blade.php le "@include('flash::message')" avant le @yield('contenu')
            // pour l'afficher avec une mise en page correcte, copier dans le terminal : php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
            // puis aller vérifier dans ressources\views\vendor\flash\message.blade.php
            flash("Vous devez être connecté pour voir cette page")->error();

            return redirect('/connexion');
        }

        return view('mon-compte');
    }



    public function deconnexion()
    {
        //gerer la deconnexion
        auth()->logout();

        //afficher un flash message affichant la bonne déconnexion
        flash("Vous êtes maintenant déconnecté")->success();
        return redirect('/');

    }
}
