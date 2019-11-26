@extends('layout')


@section('contenu')

<div class="section">

    <h1 class="title is-1">Bienvenue</h1>

    @auth
        <section>
        <h2>Tous les utilisateurs suivis</h2>

           <!--  @if (auth()->user()->suivis->isEmpty())
                Vous ne suivez aucun utilisateur
            @endif

            <ul>
            utilise la relation belongsToMany pour récupérer les utilisateurs suivis / uniquement si l'utilisateurSuivieur est authentifié
                @foreach(auth()->user()->suivis as $utilisateur)
                    <li>
                        <a href="/{{ $utilisateur->email }}">{{ $utilisateur->email }}</a>
                    </li>
                @endforeach
            </ul>
            -->

            <!-- remplacé par : -->
            <ul>
                @forelse(auth()->user()->suivis as $utilisateur)
                    <li>
                        <a href="/{{ $utilisateur->email }}">{{ $utilisateur->email }}</a>
                    </li>
                @empty
                    Vous ne suivez aucun utilisateur
                @endforelse
            </ul>

        </section>
    @endauth

    <section>

    <h2>Tous les utilisateurs</h2>
        <ul>
            @foreach($utilisateurs as $utilisateur)
                <li>
                    <a href="/{{ $utilisateur->email }}">{{ $utilisateur->email }}</a>
                </li>
            @endforeach
        </ul>
    </section>

</div>

@endsection
