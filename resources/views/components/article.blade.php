<div class="card mb-3" style="width: 28rem;">

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
        <li class="list-group-item">Commentaires(<strong>{{ $article->comments_count }}</strong>)</li>
    </ul>

    <div class="card-body">
        
        @forelse ($article->tags ?? [] as $tag)
        <span class="badge bg-primary mb-3">{{ $tag }}</span>
        @empty
        @endforelse
        
        <a href="{{ route('front.showArticle', $article->id) }}"
            class="btn btn-primary d-flex justify-content-center stretched-link">Lire la suite</a>
    </div>

</div>