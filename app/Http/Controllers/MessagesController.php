<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    //
    public function nouveau()
    {

        //valider les données
        request()->validate([
            'message' =>['required'],
        ]);

        //ATTENTION
        //avec messages, récupère la liste de tous les messages
        //avec messages(), récupère la relation
        auth()->user()->messages()->create([
            'contenu' => request('message'),
        ]);

        //remplacé par la fonction plus haut, grâce à la relation HasMany
        // Message::create([
        //     //récupérer l'id de l'utilisateur courant
        //     'utilisateur_id' => auth()->id(),
        //     'contenu' => request('message'),
        // ]);

        flash("Votre message a bien été publié")->success();
        // revenir à la page précédente directement
        return back();

    }
}
