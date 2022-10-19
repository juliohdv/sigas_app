<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Conyuge;
use App\Models\EstadoCivil;
use App\Models\TipoReferencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensaje = "";
        $solicitudes = Solicitud::with('estado')->paginate(5);
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
            return view('solicitudes.create',compact('estadosCiviles','tipoReferencias'));
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
        //
        request()->validate([
            'nombres' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'apellidoCasada' => '',
            'genero' => 'required',
            'fechaNacimiento' => 'required',
            'nacionalidad' => 'required',
            'email1' => 'required',
            'telefonoCasa' => 'required',
            'telefonoTrabajo' => 'required',
            'celular1' => 'required',
            'subregiones_id' => 'required',
            'estado_civil_id' => 'required',
            'estado_solicitud_id' => 'required'

        ]);
        $conyuge = Conyuge::create([
            'nombre' => $request->input('conyuge_nombre'),
            'direccion' => $request->input('conyuge_direccion'),
            'telefono' => $request->input('conyuge_telefono')
        ])->save();

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
            'telefonoCasa' => $request->input('telefonoCasa'),
            'telefonoTrabajo' => $request->input('telefonoTrabajo'),
            'celular1' => $request->input('celular1'),
            'celular2' => $request->input('celular2'),
            'subregiones_id' => $request->input('subregiones_id'),
            'estado_civil_id' => $request->input('estado_civil_id'),
            'estado_solicitud_id' => $request->input('estado_solicitud_id'),
            'conyuge_id'=>Conyuge::latest()->first()->id,
        ]);
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
