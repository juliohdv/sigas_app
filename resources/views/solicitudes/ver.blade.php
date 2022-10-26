@extends('layouts.app')
@section('title', 'Detalle de Solicitud')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Solicitud de registro de asociado</h3>
        </div>
        <div class="section-body">
                <p>{{$solicitud->nombres}}</p>
                <p>{{$solicitud->primerApellido}}</p>
                <p>{{$solicitud->segundoApellido}}</p>
                <p>{{$documento->id}}</p>    
                <p>{{$documento->numeroDocumento}}</p>   
                <p>{{$documento->tipoDocumento->tipoDocumento}}</p>
                <p>{{$residencia->barrioColoniaResidencial}}</p>
                <p>{{$residencia->ubicacionmapa}}</p>
                <p>{{$residencia->subregion_id}}</p>
                <p>{{$residencia->subregion->name}}</p>
                <p>{{$residencia->subregion->region->name}}</p>
                <p>{{$residencia->subregion->region->pais->name}}</p>
                
        </div>
    </section>
@endsection



