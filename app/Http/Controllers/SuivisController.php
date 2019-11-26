<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class SuivisController extends Controller
{
    //
    public function nouveau()
    {
        $utilisateurQuiVaSuivre = auth()->user();
        $utilisateurQuiVaEtreSuivi = Utilisateur::where('email', request('email'))->firstOrFail();

        //attach() permet de relier les 2 utilisateurs, via la table suivis()
        $utilisateurQuiVaSuivre->suivis()->attach($utilisateurQuiVaEtreSuivi);

        flash("Vous suivez maintenant {$utilisateurQuiVaEtreSuivi->email}.")->success();

        return back();
    }

    public function enlever()
    {
        $utilisateurQuiSuit = auth()->user();
        $utilisateurQuiEstSuivi = Utilisateur::where('email', request('email'))->firstOrFail();

        //attach() permet de relier les 2 utilisateurs, via la table suivis()
        $utilisateurQuiSuit->suivis()->detach($utilisateurQuiEstSuivi);

        flash("Vous ne suivez plus {$utilisateurQuiEstSuivi->email}.")->success();

        return back();
    }

}
