@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Cooperativa</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>!Revise los campos!</strong>
                                        @foreach($errors->all() as $error)
                                            <span class="badge badge-danger">{{$error}}</span>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                            @endif
                            {!! Form::open(array('route'=>'cooperativas.store','method'=>'POST')) !!}
                                <div class="row">
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre </label>
                                            {!! Form::text('nombre', null, array('class'=>'form-control')) !!}    
                                        </div> 
                                   </div> 
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="mision">Misión </label>
                                            {!! Form::text('mision', null, array('class'=>'form-control')) !!}    
                                        </div> 
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="vision">Visión </label>
                                            {!! Form::text('vision', null, array('class'=>'form-control')) !!}    
                                        </div> 
                                   </div> 
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="logo_url">Logo URL </label>
                                        {!! Form::text('logo_url', null, array('class'=>'form-control')) !!}    
                                    </div> 
                               </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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



