<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

@section('title33')
    Modification de l'article {{ $article->title }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Modification de l'article: <strong>{{ $article->title }}</strong></h2>

    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label mt-4">Titre</label>
            <input type="text" class="form-control" id="articleTitle" name="title"
                placeholder="Entrez le titre de l'article" value="{{ old('title', $article->title) }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug" class="form-label mt-4">Slug</label>
            <input type="text" class="form-control" id="articleSlug" name="slug" placeholder="Entrez le titre le slug"
                value="{{ old('slug', $article->slug) }}" required>
            @error('slug')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label mt-4">Contenu</label>
            <textarea id="content" name="content">{{ old('content', $article->content) }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputImage" class="form-label mt-4">Image</label>
            <input type="file" name="image" class="form-control" value="{{ old('image', $article->image) }}">

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <img class="w-25 mt-4" src="{{ asset('storage/' . $article->image) }}" alt="">
        </div>


        <div class="form-group">
            <label for="category" class="form-label mt-4">Catégorie</label>
            <select class="form-select" name="category_id" aria-label="Sélectionnez une catégorie">
                <option value="{{ $article->category->id }}" selected>{{ $article->category->name }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" name="update" class="btn btn-primary mt-4 mb-4">Modifier</button>

        <script>
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    </form>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include JavaScript file -->
    <script>
        $(document).ready(function() {
            // Function to generate slug from title
            function generateSlug(title) {
                return title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            }

            // Event listener for the title input field
            $('#articleTitle').on('input', function() {
                // Get the entered title
                var title = $(this).val();

                // Generate the slug
                var slug = generateSlug(title);

                // Set the generated slug to the slug input field
                $('#articleSlug').val(slug);
            });
        });
    </script>
@endsection
