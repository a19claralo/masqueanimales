@extends('layouts.master')
@section('titulopagina', 'Detalles mascota')
@section('textocabecera', 'Información detallada')

@section('central')

    <h2>Imagen:</h2>
    @if ($mascota->imagen != '')
            
    @else
    <div><p>Sin fotografía</p></div>
    @endif

    @include('mascotas._form')


    <a href="{{url()->previous()}}" class="btn btn-secondary mb-5">Volver</a>

@endsection



@section('scripts')
<script>
  
        window.addEventListener("DOMContentLoaded", function () {
            (function ($) {
                $("input").attr("disabled", true);
                $("textarea").attr("readonly", true);
                $("select").attr("disabled", true);
            })(jQuery);
        });
</script>
@endsection