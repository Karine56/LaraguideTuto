<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    //
    public function liste()
    {
        $messages = auth()->user()
        //suivis est ici un attribut
            ->suivis
            //map() est une fonction pour obtenir la liste des messages echangés - fait appel à une fonction anonyme "de transformation" (on transforme l'utilisateur 1 en liste de message, l'utilisateur 2 en liste de messages)
            // ->map(function ($utilisateur) {
            //     return $utilisateur->messages;
            // })
            //on peut utiliser une syntaxe plus rapide : ->map->messages : je mappe et je transforme en message
            ->map->messages
            //flatten permet de réduire un tableau (et pu un tableau dans un tableau)
            ->flatten()
            //les trier, les + recents avant, par type
            // ->sortByDesc(function ($message) {
            //     return $message->created_at;
            // });
            //idem que map, possible de simplifier :
            ->sortByDesc->created_at;

            
            //a noter qu'une fonction flatMap existe aussi, en version plus rapide encore
            //->flatMap->messages au lieu de ->map->messages et ->flatten


        return view('actualites', [
            'messages' => $messages
        ]);
    }
}
