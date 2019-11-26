 <!-- avec bulma, is-activ pour mettre l'onglet en surbrillance si c'est l'onglet actif -->
<!-- condition ternaire :  true / false ? si vrai : si faux-->
<a href="{{ url($lien) }}" class="navbar-item {{ request()->is($lien) ? 'is-active' : '' }}">{{ $texte }}</a>
