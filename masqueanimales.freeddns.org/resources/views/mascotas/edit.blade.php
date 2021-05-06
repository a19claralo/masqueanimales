@extends("layouts.master")

@section("titulopagina", "Editar")

@section("textocabecera", "Editar")

@section("central")
    <form method="post"  action="{{ route('mascotas.update', $mascota->id)}}" enctype="multipart/form-data">
        @method("PUT")
        @include('mascotas._form')
        
        <button type="submit" class="btn btn-primary mb-3">Modificar</button>
    </form>

    


@endsection