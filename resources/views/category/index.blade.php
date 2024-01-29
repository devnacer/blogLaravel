@section('title33')
    Mes Catégories
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Mes Catégories</h2>

    @include('partials.alert')

    <div class="row d-flex justify-content-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>

                        @can('viewAny', $category)
                            <td class="d-flex">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');"
                                        class="btn-sm btn-danger float-end mx-1">Supprimer</button>
                                </form>

                                <form action="{{ route('category.edit', $category->id) }}" method="GET">
                                    @csrf
                                    <button class="btn-sm btn-primary float-end">Modifier</button>
                                </form>
                            </td>
                        @endcan
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{ $categories->links() }}
@endsection
