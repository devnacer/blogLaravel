@section('title33')
    Ajouter un article
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Ajouter un article</h2>

    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label mt-4">Titre</label>
            <input type="text" class="form-control" id="articleTitle" name="title"
                placeholder="Entrez le titre de l'article" value="{{ old('title') }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="content" class="form-label mt-4">Contenu</label>
            <textarea type="text" class="form-control" id="articleContent" name="content"
                placeholder="Entrez le contenu de l'article" required>{{ old('content') }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputImage" class="form-label mt-4">Image</label>
            <input type="file" name="image" class="form-control">

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label for="category" class="form-label mt-4">Catégorie</label>
            <select class="form-select" name="category_id" aria-label="Sélectionnez une catégorie">
                <option selected disabled>Ouvrir le menu de sélection</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>






        <button type="submit" name="create" class="btn btn-primary mt-4 mb-4">Ajouter un article</button>

    </form>
@endsection
