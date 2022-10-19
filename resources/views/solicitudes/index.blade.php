@extends('layouts.app')
@section('title', 'Solicitudes')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Solicitud</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <span>{{$mensaje}}</span>
                            @can('crear-solicitud')
                                <a href="{{ route('solicitudes.create') }}" class="btn btn-warning">Nueva</a><br/>
                            @endcan
                            <br/>
                            <table class="table table-striped mt 2">
                                <thead style="background-color: #004346">
                                    <th style="color: #fff">ID</th>
                                    <th style="color: #fff">Nombres</th>
                                    <th style="color: #fff">Primer Apellido</th>
                                    <th style="color: #fff">Segundo Apellido</th>
                                    <th style="color: #fff">Estado</th>
                                    <th style="color: #fff">Fecha</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{$solicitud->id}}</td>
                                            <td>{{$solicitud->nombres}}</td>
                                            <td>{{$solicitud->primerApellido}}</td>
                                            <td>{{$solicitud->segundoApellido}}</td>
                                            <td>{{$solicitud->estado->estadoSolicitud}}</td>
                                            <td>{{$solicitud->created_at}}</td>
                                            <td>
         
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-end">
                            {!! $solicitudes->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

