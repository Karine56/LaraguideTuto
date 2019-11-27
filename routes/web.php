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



// utilisation du formulaire
Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');


// gestion formulaire de connexion
Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');


// affichage des utilisateurs présent dans la bdd
//url suivi du Nom du Controller et du nom de la methode utilisée
Route::get('/', 'UtilisateursController@liste');


// GROUPE DE ROUTES
// 1er paramètre contient des options du groupe
//2eme paramètre : fonction anonyme contenant les routes du groupe
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {

    Route::get('/mon-compte', 'CompteController@accueil')->middleware('App\Http\Middleware\Auth');
    Route::get('/actualites', 'ActualitesController@liste');
    Route::get('/deconnexion', 'CompteController@deconnexion')->middleware('App\Http\Middleware\Auth');
    Route::post('/modification-mot-de-passe', 'CompteController@modificationMotDePasse')->middleware('App\Http\Middleware\Auth');
    Route::post('/messages', 'MessagesController@nouveau')->middleware('App\Http\Middleware\Auth');
    Route::post('/{email}/suivis', 'SuivisController@nouveau');
    Route::delete('/{email}/suivis', 'SuivisController@enlever');

});

// important de mettre les url contenant des variables à la fin. Les routes génériques prendront le pas dessus. A moins de completer l'url avec /utilisateurs/{email}
Route::get('/{email}', 'UtilisateursController@voir');







// test de passage de paramètre dans la view via url / à supprimer
// Route::get('/bonjour/{nom}', function () {
//     $nom = request('nom');
//     return view('bonjour', [
//         //c'est bien le prenom que l'on va rappeler dans la view : {{ $prenom}} et sa valeur sera $nom soit request('nom') passé dans l'url
//         'prenom' => $nom,
//     ]);
// });
