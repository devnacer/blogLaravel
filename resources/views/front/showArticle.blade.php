@section('title33')
    {{ $article->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>{{ $article->title }}</h2>

    <div class="card mb-3">
        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top w-25" alt="...">
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
            <hr>
            <div class="container">{!! $article->content !!}</div>
            <hr>
            <p class="card-text"><strong>Publié par :</strong> {{ $article->profil->name }}</p>
            <hr>
            <p class="card-text"><strong>Catégorie :</strong> {{ $article->category->name }}</p>
            <hr>
            <p class="card-text"><strong>Créé le :</strong> {{ $article->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection
