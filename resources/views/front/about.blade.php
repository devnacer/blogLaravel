@section('title33')
À propos
@endsection

@extends('layouts.master')

@section('section12')
    <h2>À propos</h2>
    <div class="d-flex flex-column justify-content-center mt-4">

        <p>Hello and welcome to this blog! I created this site with Laravel to deepen my skills as part of my learning journey with the framework.</p>

        <br>

        <p>Bonjour et bienvenue sur ce blog ! J'ai créé ce site avec Laravel dans le but d'approfondir mes compétences dans le cadre de mon apprentissage du framework.</p>

        <br>

        <h3>Statistiques pour ce blog</h3>

        <ul class="list-group mt-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre de membres
                <span class="badge bg-primary rounded-pill">{{ $profilsCount }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre d'articles 
                <span class="badge bg-primary rounded-pill">{{ $articleCount }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre de catégories 
                <span class="badge bg-primary rounded-pill">{{ $categoryCount }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Dernier article publié
                <span class="badge bg-primary rounded-pill">{{ $latestArticle->title }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre total de commentaires 
                <span class="badge bg-primary rounded-pill">{{ $commentCount }}</span>
            </li>            
        </ul>
        

    </div>

@endsection
