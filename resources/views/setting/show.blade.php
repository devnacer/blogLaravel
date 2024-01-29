@section('title33')
Paramètre
@endsection

@extends('layouts.master')

@section('section12')


<h2>{{ $profil->name }}</h2>


    <div class="card mb-3">

        <div class="d-flex align-items-start flex-row m-2 justify-content-end">

            <form action="{{ route('profil.edit', $profil->id) }}" method="GET">
                @csrf
                <button class="btn-sm btn-primary float-end">Modifier mon profil</button>
            </form> 

            <form action="{{ route('setting.destroy', $profil->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');"
                    class="btn-sm btn-danger float-end mx-1">Supprimer mon profil</button>
            </form>

        </div>

        <div class="card-body">

            <p class="card-text"><strong>Role :</strong> {{ $profil->role }}</p>
            <hr>

            <p class="card-text"><strong>Email :</strong> {{ $profil->email }}</p>
            <hr>

            <p class="card-text"><strong>Créé le :</strong> {{ $profil->created_at->format('d/m/Y H:i') }}</p>

        </div>
    </div>
@endsection
