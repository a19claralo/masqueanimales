@extends('layouts.master')
@section('titulopagina', 'Listado de anuncios')
@section('textocabecera', 'Tablón de anuncios')


@section('central')


    <div class="container">

      <div class="row">
        @foreach ($anuncios as $anuncio)
    
            <div class="col-md-4">
                <div class="card m-4 shadow-sm ">
                        
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Sin imagen disponible</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="26%" y="50%" fill="#eceeef">Sin imagen disponible</text></svg>
                    
                        <div class="card-body">
                        <h5 class="card-title">{{$anuncio->titulo}}</h5>
                        <p class="card-text">{{$anuncio->descripcion}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">DATOS DE CONTACTO</li>
                        <li class="list-group-item">Email: {{$anuncio->email}}</li>
                        @if($anuncio->telefono!='')
                        <li class="list-group-item">Teléfono: {{$anuncio->telefono}}</li>
                        @endif
                        
                        <li class="list-group-item">
                            <a href="{{route('anuncios.show', $anuncio->id)}}" class="btn btn-primary">Ver</a>
                            @auth
                                @if(auth()->user()->id == $anuncio->idUsuario)
                                    <a href="{{route('anuncios.edit', $anuncio->id)}}" class="btn btn-warning">Editar</a>
                                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$anuncio->id}}">Borrar</button>
                                @endif
                            @endauth
                        </li>
                        </ul>
                    </div>
            </div>
                @endforeach
        </div>
    </div>

    {{$anuncios->links()}}


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <p>Está seguro de que desea eliminar este anuncio?</p></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
              <form id="formularioBorrado" action="{{route('anuncios.destroy', 0)}}" 
                      data-action="{{route('anuncios.destroy', 0)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger">Eliminar anuncio</button>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('scripts')

<script>
window.onload = function(){
    $('#deleteModal').on('show.bs.modal', function (event) {

      var button= $(event.relatedTarget)
      var id= button.data('id')
      var modal = $(this)
      modal.find('.modal-title').text('Borrado de la mascota con id: ' + id)

      accion= $('#formularioBorrado').attr('data-action').slice(0, -1) + id
      $("#formularioBorrado").attr('action', accion)

    })
  }
</script>
    
@endsection
