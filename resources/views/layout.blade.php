
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
                    <a href="/" class="navbar-item {{ request()->is('/') ? 'is-active' : '' }}">Accueil</a>
                </div>
                <div class="navbar-end">
                <!-- modification de la navbar selon le statut connecté ou non -->
                    @if(auth()->check())

                        <a href="/mon-compte" class="navbar-item {{ request()->is('mon-compte') ? 'is-active' : '' }}">Mon compte</a>
                        <a href="/deconnexion" class="navbar-item">Déconnexion</a>
                    @else
                    <!-- avec bulma, is-activ pour mettre l'onglet en surbrillance si c'est l'onglet actif -->
                    <!-- condition ternaire :  true / false ? si vrai : si faux  -->
                        <a href="/connexion" class="navbar-item {{ request()->is('connexion') ? 'is-active' : '' }}">Connexion</a>
                        <a href="/inscription" class="navbar-item {{ request()->is('inscription') ? 'is-active' : '' }}">Inscription</a>
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
