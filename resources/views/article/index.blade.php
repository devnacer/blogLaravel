@section('title33')
    Tous les articles
@endsection

@extends('layouts.master')

@section('section12')
@include('partials.alert')
    <h2>Tous les articles</h2>

    <div class="row d-flex justify-content-center">

        <table class="table">
            <thead>
                <tr>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Publié par</th>
                    <th scope="col">Créé le</th>
                </tr>

            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->profil->name }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td class="d-flex">

                            <a href="{{ route('article.show', $article->id) }}" class="btn-sm btn-info float-end">Voir</a>

                            @can('update', $article)
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
                            @endcan

                        </td>
                    </tr>
                @empty
                    <tr>
                        <th>Aucun article trouvé.</th>
                    <tr>
                @endforelse
            </tbody>
        </table>

    </div>

    @if ($articles->hasPages())
        {{ $articles->links() }}
    @endif
@endsection
