@section('title33')
    Contact
@endsection

@extends('layouts.master')

@section('section12')
    <h2>Contact</h2>
    
    @include('partials.alert')

    <div class="container">

        <form action="{{route('front.sendMessage')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label mt-4">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom"
                    value="{{ old('name') }}" required>
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
                <label class="form-label mt-4">Sujet </label>
                <input type="text" class="form-control" id="subject" name="subject"
                    placeholder="Entrez le sujet de votre message" value="{{ old('subject') }}" required>
                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Message </label>
                <textarea class="form-control" id="content" name="content" rows="4"> {{ old('content') }} </textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary mt-4 mb-4">Envoyer</button>


        </form>

    </div>
@endsection
