@section('title33')
    {{ $article->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>{{ $article->title }}</h2>

    <div class="card mb-3">
        
        <div class="card-body">
            <img src="{{ asset('storage/' . $article->image) }}" class="mx-3 my-3 card-img-top w-25" alt="...">
            <hr>
            <p class="card-text"><strong>Publié par :</strong> {{ $article->profil->name }}</p>
            <hr>
            <p class="card-text"><strong>Catégorie :</strong> {{ $article->category->name }}</p>
            <hr>
            <p class="card-text"><strong>Créé le :</strong> {{ $article->created_at->format('d/m/Y H:i') }}</p>
            <hr>
            <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
            <hr>
            <div class="container">{!! $article->content !!}</div>
        </div>

        {{-- Comments --}}
        <div class="card-footer">

            {{-- index comments --}}
            <h4 class="card-title my-5"><strong>Commentaires</strong></h4>
            <div class="list-group mb-5">

                @forelse ($article->comments as $comment)
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $comment->name }}</h5>
                            <small class="text-muted">{{ $comment->created_at }}</small>
                        </div>
                        <p class="mb-1">{{ $comment->content }}</p>
                        {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                    </div>
                @empty
                    <p>Aucun commentaire trouvé.</p>
                @endforelse

            </div>

            {{-- add comment --}}
            <h4 class="card-title my-4"><strong>Ajouter un commentaire</strong></h4>
            <form method="post" action="{{ route('front.storeComment', $article->id) }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label mt-4">Votre Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom"
                        required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label mt-4">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Entrez votre adresse email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content" class="form-label mt-4">Votre Commentaire</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Entrez votre commentaire"
                        required></textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary my-4">Envoyer</button>
            </form>

        </div>
    </div>

@endsection
