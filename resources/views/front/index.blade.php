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
                <x-article :article='$article' />
            @empty
                <p>Aucun article trouvé.</p>
            @endforelse

            @if ($articles->hasPages())
                {{ $articles->links() }}
            @endif

        </div>


    </div>
@endsection
