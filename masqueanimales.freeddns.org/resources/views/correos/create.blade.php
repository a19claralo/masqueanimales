@extends('layouts.master')

@section('titulopagina', 'Formulario de contacto')

@section('textocabecera', 'Formulario de contacto')

@section('central')
    <form action={{ route('contactar.enviar') }} method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="" />
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="" />
        </div>
        <div class="form-group">
            <label for="name">Contenido</label>
            <textarea class="form-control" name="contenido"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar correo</button>
        </div>
    </form>
@endsection