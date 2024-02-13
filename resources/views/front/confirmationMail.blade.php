@extends('layouts.master')

@section('title33')
    Confirmation
@endsection

@section('section12')
    <div>
        <h2>Confirmation pour {{ $name }}</h2>
        <p>S'il vous plaît, vérifiez votre e-mail pour confirmer l'inscription de votre compte, {{ $name }}.</p>
    </div>
@endsection
