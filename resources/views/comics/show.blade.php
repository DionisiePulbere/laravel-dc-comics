@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <h5 class="card-title">{{ $comic->title }}</h5>
        <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
        <div class="card-body">
            <div>Serie: {{ $comic->series }}</div>
            <div>Tipo: {{ $comic->type }}</div>
            <div>Prezzo {{ $comic->price }} €</div>
            <div>Data di uscita: {{ $comic->sale_date }}</div>
            <p class="card-text">Descrizione: {{ $comic->description }}</p>
        </div>
    </div>
    </div>
@endsection