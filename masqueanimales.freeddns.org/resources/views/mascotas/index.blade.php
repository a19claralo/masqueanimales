@extends('layouts.master')
@section('titulopagina', 'Listado de mascotas')
@section('textocabecera', 'Mascotas')


@section('central')

    <div class="container">
            
        <div class="row row-cols-2">
            @foreach ($mascotas as $mascota)
            <div class="card m-4" style="max-width: 500px;">
                <div class="row no-gutters">
                    <div class="col-sm-5" style="background: #868e96;">
                      <svg class="bd-placeholder-img card-img-top" width="225" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Sin imagen disponible</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="16%" y="50%" fill="#eceeef">Sin imagen disponible</text></svg>

                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title">{{$mascota->nombre}}</h5>
                            <a href="{{route('mascotas.show', $mascota->id)}}" class="btn btn-primary">Ver</a>
                            <button type="button"  class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$mascota->id}}">Borrar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{$mascotas->links()}}


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
                 <p>Está seguro de que desea borrar este registro?</p></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
                  <form id="formularioBorrado" action="{{route('mascotas.destroy', 0)}}" 
                          data-action="{{route('mascotas.destroy', 0)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Borrar mascota</button>
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