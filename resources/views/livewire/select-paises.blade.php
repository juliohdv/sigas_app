<div>
    <div class="form-group">
        <label for="">País de nacimiento:</label>
        <select wire:model="paisSeleccionado" name="paises" id="paises" class="form-control">
            <option>Seleccione un país...</option>
            @foreach($paises as $pais)
                <option value={{$pais->id}}>{{$pais->emoji}} {{$pais->name}}</option>
            @endforeach
        </select>
    </div>
    
    @if(!is_null($regiones))
    <div class="form-group">
    <label for="">Estado o Departamento:</label>
    
        <select wire:model="regionSeleccionada" name="regiones" id="regiones" class="form-control">
            <option>Seleccione una región...</option>
            @foreach($regiones as $region)
                <option value={{$region->id}}>{{$region->state_code}} {{$region->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    
    @if(!is_null($subregiones))
    <div class="form-group">
    <label for="">Ciudad o Municipio:</label>
        <select wire:model="subRegionSeleccionada" name="subregiones_id" id="subregiones_id" class="form-control">
            <option>Seleccione una sub-región...</option>
            @foreach($subregiones as $subregion)
                <option value={{$subregion->id}}>{{$subregion->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        
    </div>
    @endif
</div>
