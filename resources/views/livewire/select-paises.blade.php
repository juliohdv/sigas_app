<div>
    <div>
        <select wire:model="paisSeleccionado" name="paises" id="paises" class="form-control">
            <option>Seleccione un país...</option>
            @foreach($paises as $pais)
                <option value={{$pais->id}}>{{$pais->emoji}} {{$pais->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <select wire:model="regionSeleccionada" name="regiones" id="regiones" class="form-control">
            <option>Seleccione ua región...</option>
            @foreach($regiones as $region)
                <option value={{$region->id}}>{{$region->state_code}} {{$region->name}}</option>
            @endforeach
        </select>
    </div>
</div>
