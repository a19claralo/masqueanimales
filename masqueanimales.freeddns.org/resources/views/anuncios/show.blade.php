@extends('layouts.master')
@section('titulopagina', 'Detalles anuncio')
@section('textocabecera', 'Información detallada')

@section('central')

    <h2>Imagen:</h2>
    @if ($anuncio->imagen != '')
            
    @else
    <div><p>Sin fotografía</p></div>
    @endif

    

    @include('anuncios._form')
    


    <a href="{{url()->previous()}}" class="btn btn-secondary mb-5">Volver</a>

@endsection



@section('scripts')
<script>
  
        window.addEventListener("DOMContentLoaded", function () {
            (function ($) {
                $("input").attr("readonly", true);
                $("textarea").attr("readonly", true);
                $("select").attr("disabled", true);
            })(jQuery);

            //ocultar el campo telefono si está vacío
            if($('#telefono').val()==''){
                $('#divtelefono').addClass('ocultar');
            }else{
                $('#labeltelefono').html('Teléfono')
                $('#divtelefono').removeClass('ocultar');
            }
        });
</script>
@endsection