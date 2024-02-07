@section('title33')
    Ajouter un article
@endsection

@extends('layouts.master')

@section('section12')
    <!-- categories -->
    <h2>Catégories</h2>

    <div class="py-1 mb-2">
        <ul class="list-group list-group-horizontal d-flex justify-content-center flex-wrap list-unstyled">
            <?php foreach($categories as $category):?>
        
                <li class="my-1 mx-1">
                    <a class="btn btn-primary" href="">
                        {{ $category->name }}
                        <span class='"badge bg-light text-dark'>
                            {{ '('.$category->articles_count.')' }}articles
                        </span>
                    </a>
                </li>

            <?php endforeach?>
        </ul> 
    </div>

    <!-- articles -->
    <h2>Derniers articles</h2>

    <div class="container d-flex justify-content-center my-5">
        
        <div class="d-flex flex-column justify-content-center flex-wrap gap-3">
    
            @foreach ($articles as $article)
    
                <div class="card" style="width: 30rem;">
                    <img src="storage/{{ $article->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{!! Str::limit($article->content, 100) !!}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Catégorie : <strong>{{ $article->category->name }}</strong></li>
                        <li class="list-group-item">Publié le <strong>{{ $article->created_at->format('d/m/Y') }}</strong> par
                            <strong>{{ $article->profil->name }}</strong></li>
                    </ul>
                    <div class="card-body">
                        <a href="article.php" class="btn btn-primary d-flex justify-content-center">Lire la suite</a>
                    </div>
                </div>
    
            @endforeach
    
        </div>

        {{ $articles->links() }}

    </div>



@endsection
