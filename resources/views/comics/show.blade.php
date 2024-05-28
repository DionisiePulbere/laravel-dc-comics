@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
    <div class="card" style="width: 600px;">
        <h5 class="card-title text-center">{{ $comic->title }}</h5>
        <img src="https://picsum.photos/600/400" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="d-flex">
                <div class="me-2"> <span class="fw-bold">Serie:</span> {{ $comic->series }}</div>
                <div class="me-2"><span class="fw-bold">Tipo:</span> {{ $comic->type }}</div>
                <div><span class="fw-bold">Data di uscita:</span> {{ $comic->sale_date }}</div>
            </div>
            <p class="card-text">Descrizione: {{ $comic->description }}</p>
            <div>Prezzo <h1>{{ $comic->price }} €</h1></div>
        </div>
    </div>
    </div>
@endsection