<?php

namespace App\Http\Middleware;

use Closure;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     //la fonction handle prend 2 paramètres : la 1ere est la requete de l'utilisateur
     //la 2eme : closure qui est une fonction représentant la suite de l'application : on ne sait donc pas ce qu'il y a dedans précisement
    public function handle($request, Closure $next)
    {
        //pour l'appliquer par défaut aux routes spécifiées
        if(auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page")->error();

            // pas obligé de rediriger l'utilisateur pour tous les middleware
            return redirect('/connexion');
        }

        return $next($request);
    }
}
