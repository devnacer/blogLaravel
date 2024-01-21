@section('title33')
    {{ $article->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Article {{ $article->id }}</h2>




    <div class="card mb-3">

        <div class="d-flex align-items-start flex-row m-2 justify-content-end">
                        
            <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');"
                    class="btn-sm btn-danger float-end mx-1">Supprimer</button>
            </form>
    
            <form action="{{ route('article.edit', $article->id) }}" method="GET">
                @csrf
                <button class="btn-sm btn-primary float-end">Modifier</button>
            </form>
        </div>

        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
            <hr>
            <p class="card-text">{{ $article->content }}</p>
            <hr>
            <p class="card-text"><strong>Publié par :</strong> {{ $article->profil->name }}</p>
            <hr>
            <p class="card-text"><strong>Catégorie :</strong> {{ $article->category->name }}</p>
            <hr>
            <p class="card-text"><strong>Créé le :</strong> {{ $article->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
