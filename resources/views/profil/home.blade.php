@section('title33')
 Accueil
@endsection

@extends('layouts.master')

@section('section12')

@include('partials.alert')

{{-- <h2>Hello {{ $Profil->name }}</h2> --}}
<h2>Hello <strong>{{Auth::user()->name}}</strong></h2>

@endsection
