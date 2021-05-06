@extends('layouts.master')
@section('titulopagina', 'Registrar mascota')
@section('textocabecera', 'Registrar mascota')
@section('central')

    

        <form method="POST"  action="{{ route('mascotas.store')}}" enctype="multipart/form-data">
            @include ("mascotas._form")
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        
        


@endsection