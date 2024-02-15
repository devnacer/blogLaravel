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
    <form method="POST" action="{{ route('password.reset.send.mail')}}" class="form-signin">
        @csrf

        <h2 class="h3 my-3 fw-normal">Mot de passe oublié?</h2>

        @include('partials.alert')

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" value="{{ old('email') }}">
            <label for="floatingInput">Adresse e-mail</label>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-lg btn-primary mt-3" type="submit">Envoyer</button>

    </form>
@endsection
