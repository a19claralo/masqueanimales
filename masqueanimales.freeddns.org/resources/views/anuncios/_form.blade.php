@csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo', $anuncio->titulo)}}">
    </div>

    <div class="mb-3">
        <label for="idCategoria" class="form-label">Categoría</label>
       <select  class="custom-select" name="idCategoria">
            <option value="1" {{ old('idCategoria', $anuncio->idCategoria) == 1 ? 'selected' : '' }}>Desaparecidos</option>
            <option value="2" {{ old('idCategoria', $anuncio->idCategoria) == 2 ? 'selected' : '' }}>Solidario</option>
            <option value="3" {{ old('idCategoria', $anuncio->idCategoria) == 3 ? 'selected' : '' }}>Otros</option>
       </select>
    </div>
    
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{old('titulo', $anuncio->descripcion)}}</textarea>
    </div>

    <label class="">-DATOS DE CONTACTO-</label><br/>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $anuncio->email)}}">
    </div>

    <div class="mb-3" id="divtelefono">
        <label for="telefono" class="form-label" id="labeltelefono">Teléfono (opcional)</label>
        <input type="number" class="form-control" id="telefono" name="telefono" value="{{old('telefono', $anuncio->telefono)}}">
    </div>
