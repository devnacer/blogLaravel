@section('title33')
Créer une catégorie
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Créer une catégorie</h2>

    @include('partials.alert')

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Entrer le nom de catégorie" value="{{ old('name')}}"
                required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label mt-4">Description</label>
            <textarea type="text" class="form-control" id="categoryDescription" name="description"
                placeholder="Entrer la description de la catégorie" required>{{ old('description')}}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <button type="submit" name="create" class="btn btn-primary mt-4 mb-4">Créer une catégorie</button>


    </form>
@endsection
