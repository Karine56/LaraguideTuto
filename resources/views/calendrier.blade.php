@extends('layout')

    @section('contenu')


    LE CALENDRIER DU CLUB

    @include('partials.calendrier_nouveau', ['lien' => '/calendrier', 'texte' => 'Calendrier'])



    @endsection
