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
                                    <th style="color: #fff">Nombre del solicitante</th>
                                    <th style="color: #fff">Estado</th>
                                    <th style="color: #fff">Fecha de solicitud</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{$solicitud->id}}</td>
                                            <td>{{$solicitud->nombres}}, {{$solicitud->primerApellido}} {{$solicitud->segundoApellido}}</td>
                                            <td>{{$solicitud->estadoSolicitud->estadoSolicitud}}</td>
                                            <td>{{$solicitud->created_at}}</td>
                                            <td>
                                                @if ($solicitud->estado_solicitud_id == '1')
                                                    <a href="{{ route('editarEstado', ['idSolicitud'=>$solicitud->id,'nuevoEstado'=>2]) }}" class="btn btn-primary">Aprobar</a>
                                                @else
                                                    @if ($solicitud->estado_solicitud_id == '2')
                                                        <a href="{{ route('editarEstado', ['idSolicitud'=>$solicitud->id,'nuevoEstado'=>3]) }}" class="fa-solid fa-file-circle-xmark btn btn-primary"> Denegar</a>
                                                    @else
                                                        
                                                    @endif    
                                                @endif
                                                <a href="{{ route('verSolicitud', ['idSolicitud'=>$solicitud->id]) }}" class="fa fa-eye btn btn-primary"> Ver</a>
                                                <a href="{{ route('imprimirSolicitud', ['idSolicitud'=>$solicitud->id]) }}" class="fa fa-file-pdf btn btn-primary"> PDF</a>
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

