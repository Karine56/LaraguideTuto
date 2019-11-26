<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //pour éviter l'erreur MassAssigment
    protected $fillable = [
        'utilisateur_id', 'contenu',
    ];
}
