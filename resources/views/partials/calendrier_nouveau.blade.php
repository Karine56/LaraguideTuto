@extends('layout')

    @section('contenu')


    @auth
        <form class="calendar" method="post" action="/calendrier">
            {{ csrf_field() }}

            <div class="field">
                <label class="label">Intitulé de l'évenement</label>
                <div class="control">
                    <input class="input" type="text" name="titre_evenement" placeholder="Titre de l'évènement">
                </div>
                 @if($errors->has('titre_evenement'))
                    <p class="help is-danger">{{ $errors->first('titre_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Détail</label>
                <div class="control">
                    <input class="input" type="text" name="contenu_evenement" placeholder="Détail de l'évènement">
                </div>
                 @if($errors->has('contenu_evenement'))
                    <p class="help is-danger">{{ $errors->first('contenu_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Date de début</label>
                <div class="control">
                    <input class="input" type="date" name="date_debut_evenement" placeholder="Date de début">
                </div>
                 @if($errors->has('date_debut_evenement'))
                    <p class="help is-danger">{{ $errors->first('date_debut_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Heure de début</label>
                <div class="control">
                    <input class="input" type="time" name="heure_debut_evenement" placeholder="Heure de début">
                </div>
                 @if($errors->has('heure_debut_evenement'))
                    <p class="help is-danger">{{ $errors->first('heure_debut_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Date de fin</label>
                <div class="control">
                    <input class="input" type="date" name="date_fin_evenement" placeholder="Détail de l'évènement">
                </div>
                 @if($errors->has('date_fin_evenement'))
                    <p class="help is-danger">{{ $errors->first('date_fin_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Heure de fin</label>
                <div class="control">
                    <input class="input" type="time" name="heure_fin_evenement" placeholder="Heure de fin">
                </div>
                 @if($errors->has('heure_fin_evenement'))
                    <p class="help is-danger">{{ $errors->first('heure_fin_evenement') }}</p>
                @endif
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Enregistrer l'évènement</button>
                </div>
            </div>


        </form>

    @endauth

    @endsection
