<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActividadEconomica;
use App\Models\Archivo;
use App\Models\Asociado;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Conyuge;
use App\Models\Cuenta;
use App\Models\EstadoCivil;
use App\Models\Residencia;
use App\Models\Documento;
use App\Models\Pais;
use App\Models\User;
use App\Models\Referencia;
use App\Models\TipoReferencia;
use Auth;
use PDF;

class SolicitudController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-solicitud|crear-solicitud|editar-solicitud|borrar-solicitud|cambiar-estado-solicitud' , ['only'=>['index']]);
        $this->middleware('permission:crear-solicitud', ['only'=>['create','store']]);
        $this->middleware('permission:editar-solicitud', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-solicitud', ['only'=>['destroy']]);
        $this->middleware('permission:cambiar-estado-solicitud',['only'=>['editarEstado']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensaje = "";  
        if(Auth::user()->hasRole('Invitado') || Auth::user()->hasRole('Asociado')){
            $solicitudes = Solicitud::where('email1', Auth::user()->email)->orderBy('id','asc')->paginate(10);
        }else{
            $solicitudes = Solicitud::with('estadoSolicitud')->orderBy('id','asc')->paginate(10);
        }
        
        return view('solicitudes.index',compact('solicitudes','mensaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Solicitud::where('email1', Auth::user()->email)->count() >= 1)
        {
            $solicitudes = Solicitud::with('estado')->paginate(5);
            $mensaje = "Usted ya tiene una solicitud en revisión.";
            return view('solicitudes.index',compact('solicitudes','mensaje'));
        }else{
            
            $tipoReferencias = TipoReferencia::get()->all();
            $estadosCiviles = EstadoCivil::get()->all();
            $nacionalidades = Pais::all()->sortBy('nacionalidad');
            return view('solicitudes.create',compact('estadosCiviles','tipoReferencias','nacionalidades'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        request()->validate([
            'nombres' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'apellidoCasada' => '',
            'genero' => 'required',
            'fechaNacimiento' => 'required',
            'nacionalidad' => 'required',
            'email1' => 'required',
            'telInternacionalCasa' => 'required',
            'telInternacionalTrabajo' => 'required',
            'telInternacionalCelular1' => 'required',
            'subregiones_id' => 'required',
            'estado_civil_id' => 'required',
            'estado_solicitud_id' => 'required'

        ]);
        // Conyuge
        if($request->input('conyuge_nombre') != null || $request->input('conyuge_direccion') || $request->input('telInternacionalConyuge')){
            Conyuge::create([
                'nombre' => $request->input('conyuge_nombre'),
                'direccion' => $request->input('conyuge_direccion'),
                'telefono' => $request->input('telInternacionalConyuge')
            ]);
        }
       
        // Datos Solicitud
        Solicitud::create([
            'nombres' => $request->input('nombres'),
            'primerApellido' => $request->input('primerApellido'),
            'segundoApellido' => $request->input('segundoApellido'),
            'apellidoCasada' => $request->input('apellidoCasada'),
            'genero' => $request->input('genero'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'nacionalidad' => $request->input('nacionalidad'),
            'email1' => $request->input('email1'),
            'email2' => $request->input('email2'),
            'telefonoCasa' => $request->input('telInternacionalCasa'),
            'telefonoTrabajo' => $request->input('telInternacionalTrabajo'),
            'celular1' => $request->input('telInternacionalCelular1'),
            'celular2' => $request->input('telInternacionalCelular2'),
            'subregiones_id' => $request->input('subregiones_id'),
            'estado_civil_id' => $request->input('estado_civil_id'),
            'estado_solicitud_id' => $request->input('estado_solicitud_id'),
            'conyuge_id'=>Conyuge::latest()->first()->id,
        ]);
        // Residencia
        Residencia::create([
            'barrioColoniaResidencial' => $request->input('barrioColoniaResidencial'),
            'callePasaje' => $request->input('callePasaje'),
            'casaDepartamento' => $request->input('casaDepartamento'),
            'ubicacionmapa' => $request->input('ubicacionmapa'),
            'subregion_id' => $request->input('residencia_subregion_id'),
            'solicitud_id' => Solicitud::latest()->first()->id,
        ]);
        //DUI o PASAPORTE
        Documento::create([
            'numeroDocumento' => $request->input('numero_documento'),
            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'solicitud_id' => Solicitud::latest()->first()->id,
        ]);
        //NIT
        if($request->input('nit') != null){
            Documento::create([
                'numeroDocumento' => $request->input('nit'),
                'tipo_documento_id' => 3,
                'solicitud_id' => Solicitud::latest()->first()->id,
            ]);
        }
        //ISSS
        if($request->input('isss') != null){
            Documento::create([
                'numeroDocumento' => $request->input('isss'),
                'tipo_documento_id' => 3,
                'solicitud_id' => Solicitud::latest()->first()->id,
            ]);
        }
        //NUP
        if($request->input('bup') != null){
            Documento::create([
                'numeroDocumento' => $request->input('nup'),
                'tipo_documento_id' => 3,
                'solicitud_id' => Solicitud::latest()->first()->id,
            ]);
        }

        // Actividad Económica
        ActividadEconomica::create([
            'nombreEmpresa' => $request->input('nombreEmpresa'),
            'cargoPuesto' => $request->input('cargoPuesto'),
            'años' => $request->input('años'),
            'meses' => $request->input('meses'),
            'empleadoEmpresario' => $request->input('empleado'),
            'ingresos' => floatval($request->input('ingresos')),
            'egresos' => floatval($request->input('egresos')),
            'sector_id' => $request->input('sector_id'),
            'profesion_id' => $request->input('profesion_id'),
            'solicitud_id' => Solicitud::latest()->first()->id,
        ]);
        // Referencias
        for($a=1; $a<=4; $a++){
            Referencia::create([
                'nombre' => $request->input('nombreReferencia'.$a),
                'telefono' => $request->input('telInternacional'.$a),
                'email' => $request->input('emailReferencia'.$a),
                'tipo_referencia_id' => $request->input('tipo_referencia_id_'.$a),
                'solicitud_id' => Solicitud::latest()->first()->id,
            ]);
        };
        // Beneficiarios
        for($b=1; $b<=3; $b++){
           Beneficiario::create([
                'nombre' => $request->input('beneficiarioNombre'.$b),
                'edad' => $request->input('beneficiarioEdad'.$b),
                'parentesco' => $request->input('beneficiarioParentesco'.$b),
                'porcentaje' => floatval($request->input('porcentaje'.$b)),
                'solicitud_id' => Solicitud::latest()->first()->id,
            ]);
        };
        // Archivos PDF o Imágenes
        $this->validate($request,[
            'filename' => 'required',
            'filename.*'=> 'mimes:doc,pdf,docx,zip,png,jpeg',
        ]);
        if($request->hasFile('filename')){
            foreach($request->file('filename') as $file){
                $nombreArchivo=$file->getClientOriginalName();
                $file->move(public_path().'/files/',$nombreArchivo);
                Archivo::create([
                    'nombreArchivo' => $nombreArchivo,
                    'path' => public_path().'/files/'.$nombreArchivo,
                    'solicitud_id' => Solicitud::latest()->first()->id,
                ]);
            }
        }

        return redirect()->route('solicitudes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Edita el estado a Aprobado.
     *
     * @param  int  $idSolicitud
     * @return \Illuminate\Http\Response
     */
    public function editarEstado($idSolicitud, $nuevoEstado)
    {
        $solicitud = Solicitud::find($idSolicitud);
        $solicitud->estado_solicitud_id = $nuevoEstado;
        $solicitud->save();
        if($solicitud->estado_solicitud_id == 2){
            //Crear asociado
            Asociado::create([
                'codigo' => 'A-'.mt_rand(),
                'estado' => 1,
                'solicitud_id' => $solicitud->id,
            ]);
            //Crear las dos cuentas
            //Ahorro
            Cuenta::create([
                'numeroCuenta' => 'C-H'.mt_rand(),
                'saldo' => 0.00,
                'asociado_id' => Asociado::latest()->first()->id,
                'tipo_cuenta_id' => 1,
            ]);
            //Aportaciones
            Cuenta::create([
                'numeroCuenta' => 'C-A'.mt_rand(),
                'saldo' => 0.00,
                'asociado_id' => Asociado::latest()->first()->id,
                'tipo_cuenta_id' => 2,
            ]);
            $user = User::where('email',Solicitud::where('id',$idSolicitud)->first()->email1);
            $user->roles()->sync(5);
            return redirect()->route('solicitudes.index');
        }else{
            return redirect()->route('solicitudes.index');
        }
        
    }


    /**
     * Ver solicitud.
     *
     * @param  int  $idSolicitud
     * @return \Illuminate\Http\Response
     */
    public function verSolicitud($idSolicitud)
    {
        $solicitud = Solicitud::with('subRegion')->find($idSolicitud);
        $documento = Documento::with('tipoDocumento')->where('solicitud_id','=',$idSolicitud)->first();
        $residencia = Residencia::with('subregion')->where('solicitud_id','=',$idSolicitud)->first();
        $actividad = ActividadEconomica::where('solicitud_id',$idSolicitud)->first();
        $referencias = Referencia::where('solicitud_id',$idSolicitud)->get();
        $beneficiarios = Beneficiario::where('solicitud_id', $idSolicitud)->get();
        return view('solicitudes.ver',compact('solicitud','documento','residencia','actividad','referencias','beneficiarios'));
    }    
    public function imprimirSolicitud($idSolicitud)
    {
        $solicitud = Solicitud::with('subRegion')->find($idSolicitud);
        $documento = Documento::with('tipoDocumento')->where('solicitud_id','=',$idSolicitud)->first();
        $residencia = Residencia::with('subregion')->where('solicitud_id','=',$idSolicitud)->first();
        $actividad = ActividadEconomica::where('solicitud_id',$idSolicitud)->first();
        $referencias = Referencia::where('solicitud_id',$idSolicitud)->get();
        $beneficiarios = Beneficiario::where('solicitud_id', $idSolicitud)->get();
        //return view('pdf.pdf_solicitud',compact('solicitud','documento','residencia','actividad','referencias','beneficiarios'));
        $pdf = PDF::loadView('pdf.pdf_solicitud',
        [
        'solicitud' => $solicitud,
        'documento' => $documento,
        'residencia'=> $residencia,
        'actividad' => $actividad,
        'referencias' => $referencias,
        'beneficiarios' => $beneficiarios
    ]);
        return $pdf->download();
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
