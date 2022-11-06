@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @role('Asociado')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Hola</h5>
                                                <h2 class="text-right">
                                                    <i class="fa fa-user f-left"></i>
                                                    <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                                </h2>
                                                <p class="m-b-0 text-right">
                                                   <span>Tipo de usuario: {{\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0]}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endrole
                        @role('Administrador')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Hola</h5>
                                            <h2 class="text-right">
                                                <i class="fa fa-user f-left"></i>
                                                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                               <span>Tipo de usuario: {{\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0]}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        @role('Invidato')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Hola</h5>
                                            <h2 class="text-right">
                                                <i class="fa fa-user f-left"></i>
                                                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                               <span>Tipo de usuario: {{\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0]}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        @role('Jefe de Operaciones')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-purple order-card">
                                        <div class="card-block">
                                            <h5>Hola</h5>
                                            <h2 class="text-right">
                                                <i class="fa fa-user f-left"></i>
                                                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                               <span>Tipo de usuario: {{\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0]}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

