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

        Message::create([
            //récupérer l'id de l'utilisateur courant
            'utilisateur_id' => auth()->id(),
            'contenu' => request('message'),
        ]);

        flash("Votre message a bien été publié")->success();
        // revenir à la page précédente directement
        return back();

    }
}
