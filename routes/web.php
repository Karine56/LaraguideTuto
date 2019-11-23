<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/a-propos', function () {
    return view('a-propos');
});


Route::get('/bonjour/{nom}', function () {
    $nom = request('nom');

    return view('bonjour', [
        //c'est bien le prenom que l'on va rappeler dans la view : {{ $prenom}} et sa valeur sera $nom soit request('nom') passé dans l'url
        'prenom' => $nom,
    ]);
});

//test formulaire
Route::get('/inscription', function() {
    return view('inscription');
});

//test formulaire
Route::post('/inscription', function() {

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
    $utilisateur = App\Utilisateur::create([
        //si ne définit par email comme colonne autorisé, affiche erreur massassigment : il faut définir email comme fillable ("remplissable") dans le model
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password'))
    ]);


    //save pour sauvegarder nos infos en bdd : fais le insert en bdd
    //n'est plus utile grâce au ::create à la place d'un New
    //$utilisateur->save();

    return "Nous avons reçu votre email qui est " . request('email'). ' et votre mot de passe est ' . request('password');
});

Route::get('/utilisateurs', function(){
    $utilisateurs = App\Utilisateur::all();

    return view('utilisateurs', [
        'utilisateurs' => $utilisateurs,
    ]);
});


