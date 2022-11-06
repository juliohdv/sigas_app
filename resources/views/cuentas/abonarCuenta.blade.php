@extends('layouts.app')
@section('title', 'Abono a cuenta')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><i class="fa fa-piggy-bank"></i><h3>Abono a cuenta</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt 2">
                                <thead style="background-color: #004346">
                                    <th style="color: #fff">N° de Cuenta</th>
                                    <th style="color: #fff">Saldo actual</th>
                                    <th style="color: #fff">Tipo de cuenta</th>
                                </thead>
                                <tbody>
                                    <td>{{$cuenta[0]->numeroCuenta}}</td>
                                    <td>${{$cuenta[0]->saldo}}</td>
                                    <td>{{$cuenta[0]->tipoCuenta->tipoCuenta}}</td>
                                </tbody>
                            </table>
                            {!! Form::model($cuenta[0], ['method'=>'PUT','route'=>['cuentas.update',$cuenta[0]->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                     <div class="form-group">
                                         <label for="nombre">Monto:</label>
                                         {!! Form::text('saldo', null, array('class'=>'form-control')) !!}    
                                     </div> 
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Abonar</button>
                            </div>
                             
                         </div>
                       {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

