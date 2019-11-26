<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;


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
        $utilisateur = Utilisateur::where('email', $email)->first();

        //dump($utilisateur);

        return view('utilisateur', [
            'utilisateur' => $utilisateur,
        ]);

    }
}
