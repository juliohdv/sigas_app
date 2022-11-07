<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cooperativa;
use App\Models\Cuenta;
use Illuminate\Support\Facades\DB;
class AsociadoController extends Controller
{
    //
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $primeraAportacion = Cooperativa::first();
        $emailUsuario = Auth::user()->email;
        $asociado = DB::table('solicitud')
        ->join('asociado','solicitud.id','=','asociado.solicitud_id','inner')
        ->select('asociado.id','solicitud.email1')->where('solicitud.email1','=',$emailUsuario)->get();
        $asociados = DB::table('solicitud')
        ->join('asociado','solicitud.id','=','asociado.solicitud_id','inner')
        ->select('asociado.id','asociado.codigo','solicitud.nombres','solicitud.primerApellido','solicitud.segundoApellido','solicitud.updated_at','asociado.solicitud_id')->where('solicitud.email1','=',$emailUsuario)->get();
        $aportado = Cuenta::where([['asociado_id','=',$asociado[0]->id],['tipo_cuenta_id','=',2]])->get(['saldo']);
        if($aportado[0]->saldo >= $primeraAportacion->montoApertura){
            return view('asociados.index',compact('asociados','primeraAportacion'));
        }else{
            Alert('Sin Aportaciones','Usted no ha realizado su primera apotación!','Error');
            return redirect()->route('cuentas.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
