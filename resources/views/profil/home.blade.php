@section('title33')
    Accueil
@endsection

@extends('layouts.master')

@section('section12')
    @include('partials.alert')

    <h2>Hello <strong>{{ Auth::user()->name }}</strong></h2>
    <hr>
    <h3>Voici tes trois articles les plus récents que tu as publiés.</h3>

    <div class="row row-cols-1 g-4 mb-5 my-2">
        @foreach ($latestArticles as $article)
            <div class="card mx-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">{!! Str::limit($article->content, 100) !!}</p>


             <div class="d-flex">

                 <a href="{{ route('article.show', $article->id) }}" class="card-link btn-sm btn-info">Voir</a>

                 <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                     @csrf
                     @method('delete')
                     <button onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');"
                         class="card-link btn-sm btn-danger mx-1">Supprimer</button>
                 </form>

                 <form action="{{ route('article.edit', $article->id) }}" method="GET">
                     @csrf
                     <button class="card-link btn-sm btn-primary">Modifier</button>
                 </form>

             </div>

                    
                    {{-- <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a> --}}
                </div>
            </div>
        @endforeach


    </div>
@endsection
