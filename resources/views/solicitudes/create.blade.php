@extends('layouts.app')
@section('title', 'Nueva Solicitud')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Solicitud de registro de asociado</h3>
        </div>
        <div class="section-body">
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
            <div class="row">
                {!! Form::open(array('route'=>'solicitudes.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Datos Personales:</h5>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" id="nombres" name="nombres" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="primerApellido">Primer apellido:</label>
                                        <input type="text" id="primerApellido" name="primerApellido" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Segundo apellido:</label>
                                        <input type="text" name="segundoApellido" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Apellido de casada:</label>
                                        <input type="text" name="apellidoCasada" id="apellidoCasada" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Género:</label>
                                        <br>
                                        <br>
                                        <input type="radio" name="genero" id="genero" value="M">
                                        <label for="genero">Masculino</label>
                                        <input type="radio" name="genero" id="genero" value="F">
                                        <label for="genero">Femenino</label>
                                        <input type="radio" name="genero" id="genero" value="O">
                                        <label for="genero">Otro</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                        <input type="date" name="fechaNacimiento" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nacionalidad">Nacionalidad:</label>
                                        <select id="nacionalidad" name="nacionalidad" class="form-control">
                                            <option>Seleccione...</option>
                                            @foreach ($nacionalidades as $nacionalidad)
                                                <option value={{$nacionalidad->nacionalidad}}>{{$nacionalidad->emoji}} - {{$nacionalidad->nacionalidad}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="nacionalidad" class="form-control"> --}}
                                    </div>
                                    <div class="form-group">
                                        @livewire('select-paises')
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Dirección de residencia:</h5>
                            <div class="form-row">
                                <div class="col-lg-12">
                                    @livewire('select-paises-horizontal')
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Barrio, Colonia, Residencial:</label>
                                        <input type="text" name="barrioColoniaResidencial" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Calle, Pasaje:</label>
                                        <input type="text" name="callePasaje" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">#Casa, Departamento:</label>
                                        <input type="text" name="casaDepartamento" class="form-control">
                                    </div>
                                </div>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKIDD2l5v0UdeIsFakOXR7apoyk_-tuog&callback=initMap&libraries=marker" defer></script>
                                    <script type="text/javascript">
                                            function initMap() {
                                            const map = new google.maps.Map(document.getElementById("map"), {
                                                center: { lat: 13.698241793333022, lng: -89.19260678719792 },
                                                zoom: 12,
                                            });
                                            const infoWindow = new google.maps.InfoWindow();
                                            var marcador = new google.maps.Marker({draggable:true, clickable:true,});
                                            var inputPosicion = document.getElementById("ubicacionmapa");
                                            marcador.setPosition(new google.maps.LatLng(13.698241793333022,-89.19260678719792));
                                            marcador.setMap(map);
                                            marcador.setTitle("Su ubicación.")
                                            marcador.addListener("drag",() =>{
                                                var posicion = marcador.position;
                                                infoWindow.close();
                                                infoWindow.setContent(`Pin ubicado en: ${posicion}`);
                                                infoWindow.open({anchor:marcador, map});
                                                $('#ubicacionmapa').attr('value',posicion);
                                                 });
                                            }
                                             window.initMap = initMap;
                                    </script>
                                <div class="col-lg-12">
                                        <label for="">Arrastre el marcador para seleccionar la ubicación aproximada:</label>
                                        <div id="map" style="height: 400px; width: 100%"></div>
                                        <div class="form-group">
                                            <label for="ubicacionmapa">Posición:</label>
                                            <input type="text" class="form-control" readonly placeholder="(0.00, 0.00)" name="ubicacionmapa" id="ubicacionmapa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div> 
                    <div class="card">
                        <div class="card-body">
                            <label for="">Documentos:</label>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tipoDocumento">Tipo de documento:</label>
                                        <select name="tipo_documento_id" id="tipo_documento_id" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">DUI</option>
                                            <option value="2">Pasaporte</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIT:</label>
                                        <input type="text" name="nit" id="nit" class="form-control" pattern="^[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]$">
                                    </div>
                                    <div class="form-group">
                                        <label for="">ISSS:</label>
                                        <input type="text" name="isss" id="isss" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Número de documento:</label>
                                        <input type="text" name="numero_documento" id="numero_documento" class="form-control" pattern="^[0-9]{8}-[0-9]$">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NUP:</label>
                                        <input type="text" name="nup" id="nup" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>  
                    <div class="card">
                        <div class="card-body">
                            <label for="">Estado familiar:</label>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="estado_civil_id">Estado civil:</label>
                                        <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                                            <option value="">Seleccione...</option>
                                            @foreach($estadosCiviles as $estado)
                                                <option value={{$estado->id}}>{{$estado->estadoCivil}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nombre completo:</label>
                                        <input type="text" id="conyuge_nombre" name="conyuge_nombre" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Dirección de trabajo:</label>
                                        <input type="text" id="conyuge_direccion" name="conyuge_direccion" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="conyuge_telefono">Teléfono:</label>
                                        <input type="tel" id="conyuge_telefono" name="conyuge_telefono" class="form-control">
                                        <small id="stelConyuge"></small>
                                        <input type="hidden" name="telInternacionalConyuge" id="telInternacionalConyuge">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>          
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Datos de Contacto:</label>
                            <div class="form-group">
                                <label for="">e-mail:</label>
                                <input type="email" name="email1" id="email1" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                            </div>
                            <div class="form-group">
                                <label for="">e-mail alternativo:</label>
                                <input type="email" name="email2" id="email2" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                            </div>
                            <div class="form-group">
                                <label for="telefonoCasa">Teléfono fijo:</label>
                                <input type="tel"  name="telefonoCasa" id="telefonoCasa" class="form-control">
                                <small id="stelCasa"></small>
                                <input type="hidden" name="telInternacionalCasa" id="telInternacionalCasa">
                            </div>
                            <div class="form-group">
                                <label for="celular1">Celular 1:</label>
                                <input type="tel"  name="celular1" id="celular1" class="form-control">
                                <small id="stelCelular1"></small>
                                <input type="hidden" name="telInternacionalCelular1" id="telInternacionalCelular1">
                            </div>
                            <div class="form-group">
                                <label for="celular2">Celular 2:</label>
                                <input type="tel"  name="celular2" id="celular2" class="form-control">
                                <small id="stelCelular2"></small>
                                <input type="hidden" name="telInternacionalCelular2" id="telInternacionalCelular2">
                            </div>
                            <div class="form-group">
                                <label for="telefonoTrabajo">Teléfono de trabajo:</label>
                                <input type="tel" name="telefonoTrabajo" id="telefonoTrabajo" class="form-control">
                                <small id="stelTrabajo"></small>
                                <input type="hidden" name="telInternacionalTrabajo" id="telInternacionalTrabajo">
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Actividad Económica:</label>
                            <div class="form-group">
                                <label for="">Tipo:</label>
                                <input type="checkbox" name="empleado" id="empleado" value="0">
                                <label for="">Empleado</label>
                                <input type="checkbox" name="empresario" id="empresario" value="1">
                                <label for="">Empresario</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="">Sector:</label>
                                    <select name="sector_id" id="sector_id" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <option value="1">Público</option>
                                        <option value="2">Privado</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="profesion_id">Profesión:</label>
                                    <select name="profesion_id" id="profesion_id" class="form-control">
                                        <option value="1">Ingeniero</option>
                                    </select>
                                </div>
                            </div>
                            <label for="Informacionlaboral">Información laboral:</label>
                            <div class="form-group">
                                <label for="">Nombre de la empresa o institución:</label>
                                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa">
                            </div>
                            <div class="form-group">
                                <label for="">Cargo / Puesto:</label>
                                <input type="text" class="form-control" id="cargoPuesto" name="cargoPuesto">
                            </div>
                            <div class="row">
                                    <label for="">Tiempo de laborar:</label>
                                    <div class="form-group col">
                                        <label>años</label>
                                        <input type="number" name="años" id="años" class="form-control">
                                    </div>
                                    <div class="form-group col">
                                        <label>meses</label>
                                        <input type="number" name="meses" id="meses" class="form-control">
                                    </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Total ingresos:</label>
                                    <input type="text" class="form-control" name="ingresos" id="ingresos">
                                </div>
                                <div class="form-group col">
                                    <label for="">Total egresos:</label>
                                    <input type="text" class="form-control" name="egresos" id="egresos">
                                </div>
                            </div>
                        </div>  
                    </div>          
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Referencias:</label>
                            <div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Nombre:</label>
                                                <input type="text" class="form-control" name="nombreReferencia1" id="nombreReferencia1">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input type="tel" class="form-control" id="referencias1" name="telReferencia1">
                                                <small id="stelReferencia1"></small>
                                                <input type="hidden" name="telInternacional1" id="telInternacional1">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">e-mail:</label>
                                                <input  type="email" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="emailReferencia1">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                            <label for="tipo_referencia_id">Tipo:</label>
                                            <select name="tipo_referencia_id_1" id="tipo_referencia_id_1" class="form-control">
                                                <option value="">Seleccione...</option>
                                                @foreach($tipoReferencias as $tipoReferencia)
                                                    <option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Nombre:</label>
                                                <input type="text" class="form-control" name="nombreReferencia2" id="nombreReferencia2">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input type="tel" name="telReferencia2" id="referencias2" class="form-control">
                                                <small id="stelReferencia2"></small>
                                                <input type="hidden" name="telInternacional2" id="telInternacional2">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">e-mail:</label>
                                                <input type="email" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="emailReferencia2">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                            <label for="tipo_referencia_id">Tipo:</label>
                                            <select name="tipo_referencia_id_2" id="tipo_referencia_id" class="form-control">
                                                <option value="">Seleccione...</option>
                                                @foreach($tipoReferencias as $tipoReferencia)
                                                    <option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Nombre:</label>
                                                <input  type="text" class="form-control" name="nombreReferencia3" id="nombreReferencia3">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input type="tel" class="form-control" id="referencias3" name="telReferencia3">
                                                <small id="stelReferencia3"></small>
                                                <input type="hidden" name="telInternacional3" id="telInternacional3">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">e-mail:</label>
                                                <input  type="email" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="emailReferencia3">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                            <label for="tipo_referencia_id">Tipo:</label>
                                            <select name="tipo_referencia_id_3" id="tipo_referencia_id" class="form-control">
                                                <option value="">Seleccione...</option>
                                                @foreach($tipoReferencias as $tipoReferencia)
                                                    <option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Nombre:</label>
                                                <input type="text" class="form-control" name="nombreReferencia4" id="nombreReferencia4">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input type="tel" class="form-control" id="referencias4" name="telReferencia4">
                                                <small id="stelReferencia4"></small>
                                                <input type="hidden" name="telInternacional4" id="telInternacional4">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">e-mail:</label>
                                                <input type="email" class="form-control" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="emailReferencia4">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                            <label for="tipo_referencia_id">Tipo:</label>
                                            <select name="tipo_referencia_id_4" id="tipo_referencia_id" class="form-control">
                                                <option value="">Seleccione...</option>
                                                @foreach($tipoReferencias as $tipoReferencia)
                                                    <option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <label for="">Beneficiarios:</label>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">1. Nombre:</label>
                                            <input type="text" class="form-control" name="beneficiarioNombre1" id="beneficiarioNombre1">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control" name="beneficiarioEdad1" id="beneficiarioEdad1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control" name="beneficiarioParentesco1" id="beneficiarioParentesco1">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="number" min="0" max="100" class="form-control" name="procentaje1" id="porcentaje1" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">2. Nombre:</label>
                                            <input type="text" class="form-control" name="beneficiarioNombre2" id="beneficiarioNombre2">
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control" name="beneficiarioEdad2" id="beneficiarioEdad2">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control" name="beneficiarioParentesco2" id="beneficiarioParentesco2">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="number" min="0" max="100" class="form-control" id="porcentaje2" name="porcentaje2" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">3. Nombre:</label>
                                            <input type="text" class="form-control" name="beneficiarioNombre3" id="beneficiarioNombre3">
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control" name="beneficiarioEdad3" id="beneficiarioEdad3">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control" name="beneficiarioParentesco3" id="beneficiarioParentesco3">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="number" min="0" max="100" class="form-control" id="porcentaje3" name="porcentaje3" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                        <label for="">Total:</label><input type="text" class="form-control" readonly placeholder="0%" name="totalP" id="totalP">
                                    </div>
                                </div>
                                <input type="hidden" name="estado_solicitud_id" value="1">
                            </div>
                            <h5 class="text-center">Archivos:</h5>
                            <div class="input-group control-group" id="increment" >

                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-success" id="btnArchivo" type="button"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
                                </div>
                              </div>
                              <div class="clone" id="clone" hidden>
                                <div class="control-group input-group" id="control-group" style="margin-top:10px">
                                  <input type="file" name="filename[]" class="form-control">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-danger" id="btnQuitarArchivo" type="button"><i class="glyphicon glyphicon-remove"></i> Quitar</button>
                                  </div>
                                </div>
                              </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </div>  
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

