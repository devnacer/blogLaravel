@section('title33')
    Mes Catégories
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Mes Catégories</h2>

    {{-- @include('partials.flashBag') --}}

    <div class="row d-flex justify-content-center">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
            
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->name}}</td>
              <td>{{$category->description}}</td>
              <td>btn</td>
            </tr>
            
            @endforeach

            </tbody>
          </table>

    </div>

    {{ $categories->links() }}

@endsection
