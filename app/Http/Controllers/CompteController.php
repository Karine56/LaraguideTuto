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
        //if(auth()->guest()) {
            //pour lui permettre de s'afficher, ne pas oublier de mettre dans layout.blade.php le "@include('flash::message')" avant le @yield('contenu')
            // pour l'afficher avec une mise en page correcte, copier dans le terminal : php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
            // puis aller vérifier dans ressources\views\vendor\flash\message.blade.php
            //flash("Vous devez être connecté pour voir cette page")->error();

            //return redirect('/connexion');


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


    public function modificationMotDePasse()
    {

        //vérifier que le mot de passe est correct : repasser les regles de validation

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        // récupérer l'utilisateur connecté
        //dump(auth()->user());

        //3 lignes en détail pour sauvegarder les modifications
        // $utilisateur = auth()->user();
        // $utilisateur->mot_de_passe = bcrypt(request('password'));
        // $utilisateur->save();

        // ou plus rapide : seul les champs spécifiés dans le tableau sont modifiées
        auth()->user()->update([
            'mot_de_passe' => bcrypt(request('password')),
        ]);

        flash("Votre mot de passe a bien été mis à jour")->success();

        return redirect('/mon-compte');
    }


    public function modificationAvatar()
    {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        //pour traiter l'image, le recupérer et le stocker dans un dossier image
        //ce fichier sera stocké par défaut dans le dossier de stockage par défaut : storage\app\nom_du_dossier défini en store('')
        $path = request('avatar')->store('avatars', 'public');
        //mise à jour de l'utilisateur
        auth()->user()->update([
            'avatar' => $path,
        ]);

        flash("Votre avatar a bien été mis à jour")->success();
        return back();
    }

}
