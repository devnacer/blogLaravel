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
    Mot de passe oublié
@endsection

@extends('layouts.master')

@section('section12')
    <form method="POST" action="{{ route('passwordUpdate', $hash) }}" class="form-signin">
        {{-- <form method="POST" action="" class="form-signin"> --}}
        @csrf

        <h2 class="h3 my-3 fw-normal">Réinitialiser le mot de passe</h2>

        @include('partials.alert')

        <input type="hidden" name="token" value="">

        {{-- <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        <label for="email">Adresse e-mail</label>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div> --}}

        <div class="form-floating my-2">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">Nouveau mot de passe</label>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating my-2">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <label for="password_confirmation">Confirmation du nouveau mot de passe</label>
            @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-lg btn-primary mt-3" type="submit">Réinitialiser le mot de passe</button>

    </form>
@endsection
