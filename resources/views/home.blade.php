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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            @php
                                                use App\Models\User;
                                                $cant_usuarios = User::count();
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-users f-left"></i>
                                                <span>{{$cant_usuarios}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/usuarios" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Solicitudes</h5>
                                            @php
                                                use App\Models\Solicitud;
                                                $cant_solicitudes = Solicitud::count();
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-file-signature f-left"></i>
                                                <span>{{$cant_solicitudes}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/solicitudes" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Paises</h5>
                                            @php
                                                use App\Models\Pais;
                                                $cant_paises = Pais::count();
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-flag f-left"></i>
                                                <span>{{$cant_paises}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/paises" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-orange order-card">
                                        <div class="card-block">
                                            <h5>Asociados</h5>
                                            @php
                                                use App\Models\Asociado;
                                                $cant_asociados = Asociado::count();
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-user-check f-left"></i>
                                                <span>{{$cant_asociados}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/usuarios" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-gray order-card">
                                        <div class="card-block">
                                            <h5>Mi Cuenta</h5>
                                            @php
                                                use App\Models\Cuenta;
                                                $numero_cuenta = Cuenta::find(3,'numeroCuenta')->numeroCuenta;
                                                $saldo = Cuenta::find(3,'saldo')->saldo;
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-users f-left"></i>
                                                <span>{{$numero_cuenta}}</span>
                                            </h2>
                                            <h2 class="text-right">
                                                <span>$ {{$saldo}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/solicitudes" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-purple order-card">
                                        <div class="card-block">
                                            <h5>Cuentas</h5>
                                            @php
                                                
                                            @endphp
                                            <h2 class="text-right">
                                                <i class="fa fa-piggy-bank f-left"></i>
                                                <span></span>
                                            </h2>
                                            <p class="m-b-0 text-right">
                                                <a href="/paises" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

