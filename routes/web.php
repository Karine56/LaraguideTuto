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

use App\Http\Controllers\ConnexionController;

Route::view('/', 'welcome');
// est l'équivalent de :
    // Route::get('/', function () {
    //     return view('welcome');
    // });

// utilisation du formulaire
Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');


// gestion formulaire de connexion
Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');


// affichage des utilisateurs présent dans la bdd
//url suivi du Nom du Controller et du nom de la methode utilisée
Route::get('/utilisateurs', 'UtilisateursController@liste');


Route::get('/mon-compte', 'CompteController@accueil');
Route::get('/deconnexion', 'CompteController@deconnexion');





// test de passage de paramètre dans la view via url / à supprimer
// Route::get('/bonjour/{nom}', function () {
//     $nom = request('nom');
//     return view('bonjour', [
//         //c'est bien le prenom que l'on va rappeler dans la view : {{ $prenom}} et sa valeur sera $nom soit request('nom') passé dans l'url
//         'prenom' => $nom,
//     ]);
// });
