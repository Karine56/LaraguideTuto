<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NouveauSuiveurMail extends Mailable
{
    use Queueable, SerializesModels;


    public $suiveur;


    public function __construct($suiveur)
    {
        //
        $this->suiveur = $suiveur;
    }



    public function build()
    {
        return $this->subject('Vous avez un nouveau suiveur !')
            // ->view('mails.nouveau_suiveur')
            // ->text('mails.nouveau_suiveur_test');

            //2 lignes du dessus remplacées par :
            ->markdown('mails.nouveau_suiveur');
    }
}
