@section('title33')
    Modifier l'administrateur' {{ $profil->name }}
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Modifier {{ $profil->name }}</h2>


    <form method="POST" action="{{ route('profil.update', $profil->id) }}">
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
            <input type="email" placeholder="Entrez votre adresse e-mail" value="{{ old('email', $profil->email) }}" name="email"
                class="form-control" id="inputEmail">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role" class="form-label mt-4">Rôle</label>
            <select name="role" class="form-control">
                <option value="" disabled selected>Choisissez un rôle</option>
                <option value="admin">Admin</option>
                <option value="superAdmin">Super Admin</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="inputPassword"
                placeholder="Entrez votre nouveau mot de passe">
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
@endsection
