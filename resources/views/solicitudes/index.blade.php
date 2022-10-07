@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><h3>Solicitud de registro de asociado</h3>
        </div>
        <div class="section-body">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Datos Personales:</h5>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Primer apellido:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Segundo apellido:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Apellido de casada:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Género:</label>
                                        <br>
                                        <br>
                                        <input type="radio">
                                        <label for="Masculino">Masculino</label>
                                        <input type="radio">
                                        <label for="Masculino">Femenino</label>
                                        <input type="radio">
                                        <label for="Masculino">Otro</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nacionalidad:</label>
                                        <input type="text" class="form-control">
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
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Calle, Pasaje:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">#Casa, Departamento:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Seleccione la ubicación:</label>
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
                                        <label for="tipoDocumento">Estado civil:</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="">Casado/a</option>
                                            <option value="">Soltero/a</option>
                                            <option value="">Viudo/a</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nombre completo:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Dirección de trabajo:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Teléfono:</label>
                                        <input type="text" class="form-control">
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
                                <input type="email" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">e-mail alternativo:</label>
                                <input type="email" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono fijo:</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Celular 1:</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Celular 2:</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono de trabajo:</label>
                                <input type="text" name="" id="" class="form-control">
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
                            <div class="col-lg-12">
                                <label>Personales:</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">1. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Teléfono:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">e-mail:</label>
                                            <input type="email" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">2. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Teléfono:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">e-mail:</label>
                                            <input type="email" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                <label>Familiares:</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">1. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Teléfono:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">e-mail:</label>
                                            <input type="email" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">2. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Teléfono:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">e-mail:</label>
                                            <input type="email" class="form-control"></input>
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
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">2. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">3. Nombre:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">Edad:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Parentesco:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="">%:</label>
                                            <input type="text" class="form-control"></input>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                            
                        </div>  
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection

