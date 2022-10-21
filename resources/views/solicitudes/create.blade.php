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
                {!! Form::open(array('route'=>'solicitudes.store','method'=>'POST')) !!}
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
                                        <input type="text" name="apellidoCasada" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Género:</label>
                                        <br>
                                        <br>
                                        <input type="radio" name="genero" value="M">
                                        <label for="Masculino">Masculino</label>
                                        <input type="radio" name="genero" value="F">
                                        <label for="Masculino">Femenino</label>
                                        <input type="radio" name=genero value="O">
                                        <label for="Masculino">Otro</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                        <input type="date" name="fechaNacimiento" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nacionalidad:</label>
                                        <input type="text" name="nacionalidad" class="form-control">
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
                                            const inputPosicion = document.getElementById("inputPosicion");
                                            marcador.setPosition(new google.maps.LatLng(13.698241793333022,-89.19260678719792));
                                            marcador.setMap(map);
                                            marcador.setTitle("Su ubicación.")
                                            marcador.addListener("drag",() =>{
                                                var posicion = marcador.position;
                                                infoWindow.close();
                                                infoWindow.setContent(`Pin ubicado en: ${posicion}`);
                                                infoWindow.open({anchor:marcador, map});
                                                inputPosicion.setAttribute("value",posicion);
                                                 });
                                            }
                                             window.initMap = initMap;
                                    </script>
                                <div class="col-lg-12">
                                        <label for="">Arrastre el marcador para seleccionar la ubicación aproximada:</label>
                                        <div id="map" style="height: 400px; width: 100%"></div>
                                        <div class="form-group">
                                            <label for="">Posición:</label>
                                            <input type="text" class="form-control" disabled for="inputPosicion" name="inputPosicion" id="inputPosicion" value="">
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
                                        <select name="" id="" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="">DUI</option>
                                            <option value="">Pasaporte</option>
                                            <option value="">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIT:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">ISSS:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Número de documento:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NUP:</label>
                                        <input type="text" class="form-control">
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
                                        <label for="">Teléfono:</label>
                                        <input type="text" id="conyuge_nombre" name="conyuge_telefono" class="form-control">
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
                                <input type="email" name="email1" id="email1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">e-mail alternativo:</label>
                                <input type="email" name="email2" id="email2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono fijo:</label>
                                <input type="text" name="telefonoCasa" id="telefonoCasa" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Celular 1:</label>
                                <input type="text" name="celular1" id="celular1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Celular 2:</label>
                                <input type="text" name="celular2" id="celular2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono de trabajo:</label>
                                <input type="text" name="telefonoTrabajo" id="telefonoTrabajo" class="form-control">
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
                                <input type="checkbox" name="" id="">
                                <label for="">Empleado</label>
                                <input type="checkbox" name="" id="">
                                <label for="">Empresario</label>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="">Sector:</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Público</option>
                                        <option value="">Privado</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="">Profesión:</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Ingeniero</option>
                                    </select>
                                </div>
                            </div>
                            
                            <label for="">Información laboral:</label>
                            <div class="form-group">
                                <label for="">Nombre de la empresa o institución:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cargo / Puesto:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row">
                                
                                    <label for="">Tiempo de laborar:</label>
                                    <div class="form-group col">
                                        <label>años</label>
                                        <input type="number" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group col">
                                        <label>meses</label>
                                        <input type="number" name="" id="" class="form-control">
                                    </div>
                                   
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                <label for="">Total ingresos:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col">
                                <label for="">Total ingresos:</label>
                                <input type="text" class="form-control">
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
                                                <input wire:model="referencias.nombre" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Teléfono:</label>
                                                <input wire:model="referencias.telefono" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">e-mail:</label>
                                                <input wire:model="referencias.email" type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                            <label for="tipo_referencia_id">Tipo:</label>
                                            <select wire:model="referencias.tipo_referencia_id" name="tipo_referencia_id" id="tipo_referencia_id" class="form-control">
                                                <option value="">Seleccione...</option>
                                                @foreach($tipoReferencias as $tipoReferencia)
                                                    <option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    var i = 0;
                                    $('#btnOtro').click(function(){  
                                        alert("hola")
                                        i++;  
                                        $('#otro').append(
                                            '<div class="col-lg-4">'+
                                            '<div class="form-group">'+
                                                '<label for="">Nombre:</label><input type="text" class="form-control">'+
                                            '</div></div>'+
                                        '<div class="col-lg-2"><div class="form-group">'+
                                                '<label for="">Teléfono:</label><input wire:model="referencias.telefono" type="text" class="form-control">'+
                                            '</div></div>'+
                                        '<div class="col-lg-4"><div class="form-group">'+
                                                '<label for="">e-mail:</label><input wire:model="referencias.email" type="email" class="form-control">'+
                                            '</div></div>'+
                                        '<div class="col-lg-2"><div class="form-group">'+
                                            '<label for="tipo_referencia_id">Tipo:</label><select  name="tipo_referencia_id" id="tipo_referencia_id" class="form-control">'+
                                                '<option value="">Seleccione...</option>'+
                                                '@foreach($tipoReferencias as $tipoReferencia)'+
                                                '<option value={{$tipoReferencia->id}}>{{$tipoReferencia->tipoReferencia}}</option>'+
                                                '@endforeach+</select>'+
                                            '</div></div></div>'
                                            );  
                                    });  
                                }
                                </script>
                                <div id="otro" class="col-lg-12">
                                </div>
                                <button  type="button" id="btnOtro" name="btnOtro" class="btn">Agregar otro...</button>
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
                                            <input type="text" class="form-control">
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">2. Nombre:</label>
                                            <input type="text" class="form-control">
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">3. Nombre:</label>
                                            <input type="text" class="form-control">
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="estado_solicitud_id" value="1">
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

