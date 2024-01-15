@section('title33')
    Mes Catégories
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Créer une catégorie</h2>

    {{-- @include('partials.flashBag') --}}

    <form action=" {{ route('category.store') }}"  method="POST">
      @csrf

      <div class="form-group">
          <label for="name" class="form-label mt-4">Nom</label>
          <input type="text" class="form-control" id="categoryName" name="name" placeholder="Entrer le nom de catégorie"
              required>
      </div>
  
      <div class="form-group">
          <label for="description" class="form-label mt-4">Description</label>
          <input type="text" class="form-control" id="categoryDescription" name="description"
              placeholder="Entrer la description de la catégorie" required>
      </div>
  
  
      <input type="submit" name="createCategory" value="Créer une catégorie" class="btn btn-primary mt-4 mb-4">

    </form>
@endsection
