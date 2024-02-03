@section('title33')
    Accueil
@endsection

@extends('layouts.master')

@section('section12')
    @include('partials.alert')

    <h2>Hello <strong>{{ Auth::user()->name }}</strong></h2>
    <hr>
    <h3>Tes derniers articles publié par toi</h3>



    @foreach ($latestArticles as $profil)
        @foreach ($profil->articles as $article)

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
             
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->content }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        @endforeach
    @endforeach


@endsection
