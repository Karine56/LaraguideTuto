<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function voir()
    {
        return view('calendrier');
    }

    public function nouveau()
    {

        //valider les données
        request()->validate([
            'titre_evenement' =>['required'],
            'contenu_evenement' =>['required'],
            'date_debut_evenement' =>['required'],
            'heure_debut_evenement'=>['required'],
            'date_fin_evenement' =>['required'],
            'heure_fin_evenement'=>['required'],
        ]);

        auth()->user()->calendar->create([
            'contenu' => request('contenu_evenement'),
            'titre' => request('titre_evenement'),
            'date_debut_evenement' => request('date_debut_evenement'),
            'heure_debut_evenement' => request('heure_debut_evenement'),
            'date_fin_evenement' => request('date_fin_evenement'),
            'heure_fin_evenement' => request('heure_fin_evenement'),
        ]);


        flash("Votre evenement a bien été publié")->success();
        // revenir à la page précédente directement
        return back();

    }
}
