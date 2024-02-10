@section('title33')
    Accueil
@endsection

@extends('layouts.master')

@section('section12')
    <!-- categories -->
    <h2>Catégories</h2>

    <div class="py-1 mb-5">
        <ul class="list-group list-group-horizontal d-flex justify-content-center flex-wrap list-unstyled">
            @forelse ($categories as $category)
                <li class="my-1 mx-1">
                    <a class="btn btn-primary" href="{{ route('ArticlesByCategory', $category->name) }}">
                        {{ $category->name }}
                        <span class='"badge bg-light text-dark'>
                            {{ '(' . $category->articles_count . ')' }}articles
                        </span>
                    </a>
                </li>

            @empty
                <p>Aucune catégorie trouvée</p>
            @endforelse
        </ul>
    </div>

    <!-- articles -->
    <h2>Derniers articles</h2>

    <div class="container d-flex justify-content-center my-5">

        <div class="d-flex flex-column justify-content-center flex-wrap gap-3">

            @forelse ($articles as $article)
                <div class="card" style="width: 30rem;">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{!! Str::limit($article->content, 100) !!}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Catégorie : <strong>{{ $article->category->name }}</strong></li>
                        <li class="list-group-item">Publié le <strong>{{ $article->created_at->format('d/m/Y') }}</strong>
                            par
                            <strong>{{ $article->profil->name }}</strong>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('front.showArticle', $article->id) }}"
                            class="btn btn-primary d-flex justify-content-center">Lire la suite</a>
                    </div>
                </div>
            @empty
                <p>Aucun article trouvé.</p>
            @endforelse

            @if ($articles->hasPages())
                {{ $articles->links() }}
            @endif

        </div>


    </div>
@endsection
