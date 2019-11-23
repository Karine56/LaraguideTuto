<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;

class InscriptionController extends Controller
{
    //
    public function formulaire()
    {
        return view('inscription');
    }


    public function traitement()
    {
        //definir des regles de validation du formulaire
    request()->validate([
        'email' => ['required', 'email'],
        //confirmed : vérifier que les 2 mdp de passe sont bien identiques, sous réserve que le champ utilise bien le meme nom, avec du _confirmation après : fera le lien avec le champ password automatiquement
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required'],
    ], [
        //pour personnaliser un seul champ du formulaire, pour une condition uniquement
        'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères'
    ]);


    //request('email') pour récupérer les infos passés dans le formulaire
    //mot_de_passe correspond au nom de la table
    //password correspond au nom du champ dans le form
    //hasher le mdp pr l'encrypter via bcrypt
    $utilisateur = Utilisateur::create([
        //si ne définit par email comme colonne autorisé, affiche erreur massassigment : il faut définir email comme fillable ("remplissable") dans le model
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password'))
    ]);

    //save pour sauvegarder nos infos en bdd : fais le insert en bdd
    //n'est plus utile grâce au ::create à la place d'un New
    //$utilisateur->save();

    return "Nous avons reçu votre email qui est " . request('email'). ' et votre mot de passe est ' . request('password');
    }
}
