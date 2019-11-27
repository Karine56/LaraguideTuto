@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class='title is-1'>
            <div class="level-left">
                <div class="level-item">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="/storage/{{ $utilisateur->avatar }}" alt="Avatar">
                            </figure>
                        </div>
                        <div class="media-content">
                            {{ $utilisateur->email }}
                        </div>
                    </div>


                </div>

                @auth
                <form class="level-item" method="post" action="/{{ $utilisateur->email }}/suivis">
                    {{ csrf_field() }}
                    <!-- mais attention, modifier la route dans web.app de type delete -->
                    @if (auth()->user()->suit($utilisateur))
                        {{ method_field('delete') }}
                    @endif


                    <button type="submit" class="button">
                        @if (auth()->user()->suit($utilisateur))
                            Ne plus suivre
                        @else
                            Suivre
                        @endif
                    </button>
                </form>
                @endauth

            </div>
        </h1>
    </div>

    <!--  vérifier que seul l'utilisateur connecté pourra accéder au formulaire de message -->
    @if (auth()->check() AND auth()->user()->id === $utilisateur->id)

        <form action="/messages" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label class="label">Message</label>
                <div class="control">
                    <textarea class="'textarea" name="message" placeholder="Qu'avez-vous à dire ?"></textarea>
                </div>
                @if($errors->has('message'))
                    <p class="help is-danger"> {{ $errors->first('message') }}</p>
                @endif
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Publier</button>
                </div>
            </div>
        </form>

    @endif

    @foreach ($utilisateur->messages as $message)
        <hr>
        <p>
            <strong>{{ $message->created_at }}
            {{ $message->contenu }}
        </p>
    @endforeach

