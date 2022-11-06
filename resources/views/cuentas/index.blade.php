@extends('layouts.app')
@section('title', 'Cuentas')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><i class="fa fa-piggy-bank"></i>-><h3>Cuentas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <table class="table table-striped mt 2">
                                <thead style="background-color: #004346">
                                    <th style="color: #fff">N° de Cuenta</th>
                                    <th style="color: #fff">Saldo</th>
                                    <th style="color: #fff">Tipo de cuenta</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($cuentas as $cuenta)
                                        <tr>
                                            <td>{{$cuenta->numeroCuenta}}</td>
                                            <td>$ {{$cuenta->saldo}}</td>
                                            <td>{{$cuenta->tipoCuenta->tipoCuenta}}</td>
                                            <td><a href="{{ route('abonarCuenta',['idCuenta'=>$cuenta->id]) }}" class="fa fa-money-bill btn btn-primary" id="btn-abonar"> Abonar</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-end">
                            {!! $cuentas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

