@extends('layouts.app')

@section('content')
<h1 class="text-center">Lista fumetti</h1>
<div class="container d-flex flex-wrap">
    @foreach($comics as $comic)
    <div class="card me-3 mb-3" style="width: 18rem;">
        <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <div>Seire: {{ $comic->series }}</div>
            <div>Tipo: {{ $comic->type }}</div>
            <div>€ {{ $comic->price }}</div>
            <div>Data di uscita: {{ $comic->sale_date }}</div>
            <div class="buttons d-flex">
                <div class='my-1'>
                    <a href="{{ route('comics.show', ['comic' => $comic->id] ) }}" class="btn btn-primary">Scopri</a>
                </div>
                <div class='my-1'>
                    <a href="{{ route('comics.edit', ['comic' => $comic->id] ) }}" class="btn btn-primary">Modiifca</a>
                </div>
                <div class='my-1'>
                    <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger js-delete-btn" data-comic-title="{{ $comic->title }}">Elimina</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma Eliminazione</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" id="confirm-deletion" class="btn btn-danger">Cancella</button>
            </div>
        </div>
    </div>
</div>
@endsection