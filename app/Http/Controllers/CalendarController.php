<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller
{
    //
    public function voir()
    {
        return view('calendrier');
    }

    public function nouveau(Request $request)
    {
        //dd($request);

        //valider les données
        request()->validate([
            'titre_evenement' =>['required'],
            'contenu_evenement' =>['required'],
            'date_debut_evenement' =>['required'],
            'heure_debut_evenement'=>['required'],
            'date_fin_evenement' =>['required'],
            'heure_fin_evenement'=>['required'],
        ]);

        $evenement = Calendar::create([
            'contenu' => request('contenu_evenement'),
            'titre' => request('titre_evenement'),
            'date_debut' => request('date_debut_evenement'),
            'heure_debut' => request('heure_debut_evenement'),
            'date_fin' => request('date_fin_evenement'),
            'heure_fin' => request('heure_fin_evenement'),
        ]);


        flash("Votre evenement a bien été publié")->success();
        // revenir à la page précédente directement
        return back();

    }
}
