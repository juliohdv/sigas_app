@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Cooperativa</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-cooperativa')
                                <a href="{{ route('cooperativas.create') }}" class="btn btn-warning">Nueva</a><br/>
                            @endcan
                            <br/>
                            <table class="table table-striped mt 2">
                                <thead style="background-color: #004346">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Misión</th>
                                    <th style="color: #fff">Visión</th>
                                    <th style="color: #fff">Logo</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($cooperativas as $cooperativa)
                                        <tr>
                                            <td style="display: none">{{$cooperativa->id}}</td>
                                            <td>{{$cooperativa->nombre}}</td>
                                            <td>{{$cooperativa->mision}}</td>
                                            <td>{{$cooperativa->vision}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/'.$cooperativa->logo_url) }}" alt="" width="50px">
                                            </td>
                                            <td>
                                                <form action="{{route('cooperativas.destroy', $cooperativa->id)}}" method="POST">
                                                    @can('editar-cooperativa')
                                                        <a href="{{ route('cooperativas.edit', $cooperativa->id) }}"  class="btn btn-primary">Editar</a>
                                                    @endcan
                                                   @csrf
                                                    @method('DELETE')
                                                    @can('borrar-cooperativa')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination justify-content-end">
                            {!! $cooperativas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

