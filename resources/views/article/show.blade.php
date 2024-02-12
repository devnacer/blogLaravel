@section('title33')
    {{ $article->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>{{ $article->title }}</h2>

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
                        {{-- delete comment --}}
                         <form action="{{ route('destroyComment',  ['article' => $article->id, 'comment' => $comment->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Voulez-vous vraiment supprimer cet commentaire ?');"
                                class="btn-sm btn-danger float-end mx-1">Supprimer</button>
                        </form> 
                        {{-- <small class="text-muted">Donec id elit non mi porta.</small> --}}
                    </div>
                @empty
                    <p>Aucun commentaire trouvé.</p>
                @endforelse 

            </div>

        </div>
    </div>

@endsection
