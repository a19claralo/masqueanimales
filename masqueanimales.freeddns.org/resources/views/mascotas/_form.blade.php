@csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $mascota->nombre)}}">
    </div>

    <div class="mb-3">
        <label for="idCategoria" class="form-label">Categoría</label>
       <select  class="custom-select" name="idCategoria">
            <option value="1" {{ old('idCategoria', $mascota->idCategoria) == 1 ? 'selected' : '' }}>Perros</option>
            <option value="2" {{ old('idCategoria', $mascota->idCategoria) == 2 ? 'selected' : '' }}>Gatos</option>
            <option value="3" {{ old('idCategoria', $mascota->idCategoria) == 3 ? 'selected' : '' }}>Otros</option>
       </select>
    </div>

    <label for="sexo">Sexo</label><br/>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="sexo" id="hembra" value="hembra" {{ old('sexo', $mascota->sexo) == 'hembra' ? 'checked' : '' }}>
        <label class="form-check-label mr-5" for="hembra">
          Hembra
        </label>
        <input class="form-check-input" type="radio" name="sexo" id="macho" value="macho" {{ old('sexo', $mascota->sexo) == 'macho' ? 'checked' : '' }}>
        <label class="form-check-label" for="macho">
          Macho
        </label>
    </div>
       
    <div class="mb-3">
        <label for="edad" class="form-label">Edad (años)</label>
        <input type="number" class="form-control" id="edad" name="edad" value="{{old('edad', $mascota->edad)}}">
    </div>
