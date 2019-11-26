@extends('layout')


@section('contenu')

<h1 class="title is-1">Bienvenue</h1>

    <ul>
        @foreach($utilisateurs as $utilisateur)
            <li>
                <a href="/{{ $utilisateur->email }}">{{ $utilisateur->email }}</a>
            </li>
        @endforeach
    </ul>

    <a href="/connexion" class="button">Se connecter</a>

@endsection
