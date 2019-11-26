
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - test</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.css" />

    </head>
    <body>

        <nav class="navbar is-light">
            <div class="navbar-menu">
                <div class="navbar-start">

                    @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Accueil'])
                    @if(auth()->check())
                        @include('partials.navbar-item', ['lien' => auth()->user()->email, 'texte' => auth()->user()->email])
                    @endif
                </div>

                <div class="navbar-end">
                <!-- modification de la navbar selon le statut connecté ou non -->
                    @if(auth()->check())
                        @include('partials.navbar-item', ['lien' => '/mon-compte', 'texte' => 'Mon compte'])
                        @include('partials.navbar-item', ['lien' => '/deconnexion', 'texte' => 'Déconnexion'])
                    @else
                        @include('partials.navbar-item', ['lien' => '/connexion', 'texte' => 'Connexion'])
                        @include('partials.navbar-item', ['lien' => '/inscription', 'texte' => 'inscription'])
                    @endif
                </div>
            </div>
        </nav>

        <div class="container">
        @include('flash::message')

        @yield('contenu')

        </div>
    </body>
</html>
