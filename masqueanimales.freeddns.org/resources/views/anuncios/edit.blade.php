@extends("layouts.master")

@section("titulopagina", "Editar anuncio")

@section("textocabecera", "Editar anuncio")

@section("central")
    <form method="post"  action="{{ route('anuncios.update', $anuncio->id)}}" enctype="multipart/form-data">
        @method("PUT")
        @include('anuncios._form')
        
        <button type="submit" class="btn btn-primary mb-3">Modificar</button>
    </form>

    


@endsection