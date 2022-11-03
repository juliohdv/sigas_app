
                <table class="table table-bordered">
                    <tr>
                        <td><img src="{{ asset('img/sigas.svg') }}" alt="logo" width="150" ></td>
                        <td>CÓDIGO:</td>
                        <td>RC-PRM-01-01-01 VX</td>
                    </tr>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="3"><h4>DATOS PERSONALES</h4></td>
                    </tr>
                    <tr>
                        <td><strong>Nombre:</strong> <u>{{$solicitud->nombres}}, {{$solicitud->primerApellido}} {{$solicitud->segundoApellido}}</u></td>
                        <td><strong>Género:</strong> 
                            @if ($solicitud->genero == "F")
                                <u>Femenino</u>
                                @else
                                    @if ($solicitud->genero == "M")
                                        <u>Masculino</u>
                                    @endif
                                <u>Otro</u>
                            @endif 
                        <td>Fecha de nacimiento: {{$solicitud->fechaNacimiento}}</td>
                    </tr>
                    <tr>
                        <td>Lugar de nacimiento: Pais: {{$solicitud->subRegion->region->pais->name}}</td>
                        <td>Departamento/Estado: {{$solicitud->subRegion->region->name}}</td>
                        <td>Municipio/Cuidad:  {{$solicitud->subRegion->name}}</td>
                    </tr>
                    <tr>
                        <td>Nacionalidad: {{$solicitud->nacionalidad}}</td>
                        <td>DUI: {{$documento->numeroDocumento}}</td>
                    </tr>
                    <tr>
                        <td>Estado Familiar: {{$solicitud->estadoCivil->estadoCivil}}</td>
                        <td colspan="2">Datos del cónyuge o compañero de vida:</td>
                    </tr>
                    <tr>
                        <td>Nombre completo: {{$solicitud->conyuge->nombre}}</td>
                        <td>Teléfono: {{$solicitud->conyuge->telefono}}</td>
                        <td>Dirección: {{$solicitud->conyuge->direccion}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><h4>DOMICILIO Y DATOS DE CONTACTO</h4></td>
                    </tr>
                    <tr>
                        <td>Pais: {{$residencia->subRegion->region->pais->name}}</td>
                        <td>Departamento/Estado: {{$residencia->subRegion->region->name}}</td>
                        <td>Municipio/Cuidad:  {{$residencia->subRegion->name}}</td>
                    </tr>
                    <tr>
                        <td>Barrio/Colonia/Residencial: {{$residencia->barrioColoniaResidencial}}</td>
                        <td>Calle/Pasaje: {{$residencia->callePasaje}}</td>
                        <td>Casa/Apartamento: {{$residencia->casaDepartamento}}</td>
                    </tr>
                    <tr>
                        <td>e-mail: {{$solicitud->email1}}</td>
                        <td colspan="2">e-mail alternativo: {{$solicitud->email2}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">Teléfono casa: {{$solicitud->telefonoCasa}},
                        Teléfono trabajo: {{$solicitud->telefonoTrabajo}},
                        Célular: {{$solicitud->celular1}}, Celular alternativo:{{$solicitud->celular2}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><h4>ACTIVIDAD ECONÓMICA / INFORMACIÓN LABORAL</h4></td>
                    </tr>
                    <tr>
                        @if ($actividad->empleadoEmpresario):
                        <td>Tipo: Empresario</td>
                        @endif
                        <td>Tipo: Empleado</td>
                        <td>Sector: {{$actividad->sector->sector}}</td>
                        <td colspan="2">Nombre de la empresa o institución: {{$actividad->nombreEmpresa}}</td>
                    </tr>
                    <tr>
                        <td>Cargo/Puesto: {{$actividad->cargoPuesto}}</td>
                        <td>Tiempo de laborar: {{$actividad->años}} años, {{$actividad->meses}} meses</td>
                        <td>Ingresos: ${{$actividad->ingresos}}</td>
                    </tr>
                    <tr>
                        <td><h4>REFERENCIAS</h4></td>
                    </tr>
                    <tr>
                        <td>Tipo  -  Nombre: </td>
                        <td>Teléfono:</td>
                        <td>e-mail:</td>
                    </tr>
                    @foreach ($referencias as $referencia)
                        <tr>
                            <td>{{$referencia->tipoReferencia->tipoReferencia}} - {{$referencia->nombre}}</td>
                            <td>{{$referencia->telefono}}</td>
                            <td>{{$referencia->email}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><h4>BENEFICIARIOS</h4></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>Parentesco</td>
                        <td>Edad</td>
                        <td>% Porcentaje</td>
                    </tr>
                    @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{$beneficiario->nombre}}</td>
                        <td>{{$beneficiario->parentesco}}</td>
                        <td>{{$beneficiario->edad}}</td>
                        <td>{{$beneficiario->porcentaje}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><h4>DECLARACIÓN DE ADMISIÓN Y DECLARACIÓN JURADA</h4></td>
                </tr>
                <tr>
                    <td colspan="3">yo, {{$solicitud->nombres}} {{$solicitud->primerApellido}} {{$solicitud->segundoApellido}}
                    por medio de la presente solicito, se me admita como miembro de NOMBRE_COOPERATIVA comprometiendome a conocer y
                    cumplir los estatutos y reglamentos que rigen la misma, así como las enmiendas que se le hagan. En este acto
                    aporto en concepto de Membresía, Cuota de Aportación y Ahorro las siguientes cantidades MEMBRESIA $_____, AHORRO $_____.
                    Así mismo, bajo juramento DECLARO: que toda la información proporcionada y anexada por mi persona en este formulario es fidedigna
                    en todas sus partes; que el origen y destino de mis fondos son lícitos y que de ninguna manera estan relacionados con los delitos contemplados 
                    en la Ley de Lavado de Dinero y Activos, ni con actividades de Financiación al Terrorismo, por lo tanto, eximo de toda rsponsabilidad
                    civil o penal a NOMBRE_COOPERATIVA, así como a los miembros del Consejo de Administración, Comités y empleados en caso de verme
                    involucrado con los delitos antes mencionados en. En caso de que fuere necesario, <strong>me comprometo a presentar
                        documentación que sea solicitada por NOMBRE_COOPERATIVA,</strong> y para constancia firmo el presente documento:
                    </td>
                </tr>
                <tr>
                    <td>Firma de Solicitante: _______________________</td>
                    <td>Fecha y hora: <u>{{$solicitud->created_at}}</u></td>
                </tr>
                <tr>
                    <td><h5>ESPACIO RESERVADO PARA NOMBRE_COOPERATIVA</h5></td>
                </tr>
                <tr>
                    <td>El Consejo de Administración en Sesión celebrada con fecha y hora {{$solicitud->updated_at}} acuerda:
                        @if ($solicitud->estado_solicitud_id == 2 )
                            <strong>APROBAR</strong>
                        @else
                            @if($solicitud->estado_solicitud_id == 3 )
                            <strong>DENEGAR</strong>
                            @endif
                        @endif
                        esta solicitud. 
                    </td>
                </tr>
                <tr>
                    <td>Presidente:__________________________</td>
                    <td>Secretario:___________________________</td>
                    <td>Sello:_________________</td>
                </tr>
                </table>
