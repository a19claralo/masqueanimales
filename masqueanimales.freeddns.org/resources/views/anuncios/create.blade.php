@extends('layouts.master')
@section('titulopagina', 'Registrar anuncio')
@section('textocabecera', 'Registrar anuncio')
@section('central')

    

        <form method="POST"  action="{{ route('anuncios.store')}}" enctype="multipart/form-data">
            @include ("anuncios._form")
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        
        


@endsection