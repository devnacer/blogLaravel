<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

@section('title33')
    Se connecter
@endsection

@extends('layouts.master')

@section('section12')
    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf

        <h2 class="h3 my-3 fw-normal">Connexion</h2>

        @include('partials.alert')

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="login" value="{{ old('login') }}">
            <label for="floatingInput">Adresse e-mail</label>
            @error('login')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating my-2">
            <input type="password" class="form-control" id="floatingPassword" name="password">
            <label for="floatingPassword">Mot de passe</label>
        </div>

        <div class="form-floating my-2">
            <a href="{{ route('password.reset') }}">Mot de passe oublié?</a>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>

    </form>
@endsection
