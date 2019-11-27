<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //pour éviter l'erreur MassAssigment
    protected $fillable = [
        'titre', 'contenu','date_debut','date_fin','heure_debut','heure_fin'
    ];

}
