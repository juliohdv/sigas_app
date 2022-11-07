@extends('layouts.app')
@section('title', 'Carnet')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><i class="fa fa-id-card"></i><h3>Carnet de indentificación</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt 2 bordered-table" style="max-width: 250px; border:2px solid gray;" >
                                <tr>
                                    <td>Teléfono: ####-####</td>
                                    <td>Dirección de la cooperativa</td>
                                    <td><i class="fa fa-id-card"></i></td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/images/'.$primeraAportacion->logo_url) }}" alt="logo" width="100" ></td>
                                    <td><h3 class="text-center">{{$primeraAportacion->nombre}}</h3></td>
                                    <td><img src="{{asset('assets/images/'.$asociados[0]->solicitud_id.'_user_pic.png') }}" alt="foto" width="100"></td>
                                </tr>
                                <tr>
                                   @foreach ($asociados as $asociado)
                                       <td>Código de asociado: <h5>{{$asociado->codigo}}</h5></td>
                                       <td>Nombre: <h5 class="text-center">{{$asociado->nombres}} {{$asociado->primerApellido}}</h5></td>
                                       <td id="fecha">Socio desde: {{$asociado->updated_at}}</td>
                                   @endforeach
                            </tr>
                            
                            </table>
                            <div>
                                <button class="btn btn-info">Imprimir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

