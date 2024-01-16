@section('title33')
Tous les Profils
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Tous les Profils</h2>

    @include('partials.alert')

    <div class="row d-flex justify-content-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de création</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profils as $profil)
                    <tr>
                        <th scope="row">{{ $profil->id }}</th>
                        <td>{{ $profil->name }}</td>
                        <td>{{ $profil->role }}</td>
                        <td>{{ $profil->email }}</td>
                        <td>{{ $profil->created_at }}</td>
                        <td class="d-flex">
                            <form action="{{ route('profil.destroy', $profil->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Voulez-vous vraiment supprimer cette personne ?');"
                                    class="btn-sm btn-danger float-end mx-2">Supprimer</button>
                            </form>

                            <form action="{{ route('profil.edit', $profil->id) }}" method="GET">
                                @csrf
                                <button class="btn-sm btn-primary float-end mx-2">Modifier</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    {{ $profils->links() }}
@endsection
