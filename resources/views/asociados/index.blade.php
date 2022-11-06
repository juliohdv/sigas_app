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
                            <table class="table table-striped mt 2">
                                <tr>
                                    <td><img src="{{asset('assets/images/'.$primeraAportacion->logo_url) }}" alt="logo" width="150" ></td>
                                    <td>{{$primeraAportacion->nombre}}</td>
                                </tr>
                                <tr>
                                   @foreach ($asociados as $asociado)
                                       <td>Código: {{$asociado->codigo}}</td>
                                       <td>Nombre: {{$asociado->nombres}} {{$asociado->primerApellido}}</td>

                                       <td id="fecha">Asociado desde: {{$asociado->updated_at}}</td>
                                   @endforeach
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

