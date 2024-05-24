@extends('layouts.app')

@section('content')
<h1 class="text-center">Lista fumetti</h1>
<div class="container d-flex flex-wrap">
    @foreach($comics as $comic)
    <div class="card" style="width: 18rem;">
        <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <div>Seire: {{ $comic->series }}</div>
            <div>Tipo: {{ $comic->type }}</div>
            <div>€ {{ $comic->price }}</div>
            <div>Data di uscita: {{ $comic->sale_date }}</div>
            <p class="card-text">Descrizione: {{ $comic->description }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection