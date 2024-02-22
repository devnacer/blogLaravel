@section('title33')
    Modifier la catégorie {{ $category->name }}
@endsection

@extends('layouts.master')

@section('section12')
    @include('partials.alert')

    <h2>Modifier la catégorie {{ $category->name }}</h2>


    <form method="POST" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Entrer le nom de catégorie"
                value="{{ old('name', $category->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label mt-4">Description</label>
            <textarea type="text" class="form-control" id="categoryDescription" name="description"
                placeholder="Entrer la description de la catégorie" required>{{ old('description', $category->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <button type="submit" name="edit" class="btn btn-primary mt-4 mb-4">Modifier</button>


    </form>
@endsection
