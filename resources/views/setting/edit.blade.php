@section('title33')
    Paramètre
@endsection

@extends('layouts.master')

@section('section12')
    @include('partials.alert')

    <h2>Paramètre</h2>


    <div class="card my-3">

        {{-- <div class="d-flex align-items-start flex-row m-2 justify-content-end">

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

        </div> --}}

        <div class="card-header">
            Information
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('setting.update', $profil->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-label mt-4">Nom</label>
                    <input type="text" class="form-control" id="ProfilName" name="name"
                        placeholder="Entrez le nom de l'administrateur" value="{{ old('name', $profil->name) }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email</label>
                    <input type="email" placeholder="Entrez votre adresse e-mail"
                        value="{{ old('email', $profil->email) }}" name="email" class="form-control" id="inputEmail">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label mt-4">Mot de passe</label>
                    <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                        id="inputPassword" placeholder="Entrez votre nouveau mot de passe">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label mt-4">Confirmation du mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirmez votre nouveau mot de passe">
                </div>

                <button type="submit" name="edit" class="btn btn-primary mt-4 mb-4">Modifier</button>


            </form>

        </div>

    </div>


    <div class="card my-3">

        <div class="card-header">
            Suppression de Compte
        </div>
        
        <div class="card-body">
        
            <form action="{{ route('setting.destroy', $profil->id) }}" method="POST">
                @csrf
                @method('delete')
                
                <p class="form-label mt-4">Si vous choisissez de supprimer votre compte, toutes vos données seront définitivement effacées. Cette action est irréversible, êtes-vous sûr de vouloir continuer ?</p>
                
                <button onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');" class="btn btn-danger mt-4 mb-4">Supprimer mon profil</button>
            
            </form>
        
        </div>
    
    </div>
    
@endsection
