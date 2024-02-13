@section('title33')
Inscription
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Inscription</h2>

    <form action="{{ route('store.registration') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" id="ProfilName" name="name"
                placeholder="Entrez votre nom" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label mt-4">Email</label>
            <input type="email" placeholder="Entrez votre adresse e-mail" value="{{ old('email') }}" name="email"
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
                <option value="standard">Standard </option>
            </select>
        </div>


        <div class="form-group">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="inputPassword"
                placeholder="Entrez votre mot de passe">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-4">Confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control"
                placeholder="Confirmez votre mot de passe">
        </div>

        <button type="submit" name="create" class="btn btn-primary mt-4 mb-4">je m'inscris</button>

    </form>
@endsection
