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

}
