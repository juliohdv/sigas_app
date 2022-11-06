<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Asociado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\Cooperativa;
use App\Models\Solicitud;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class CuentaController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:ver-cuenta|crear-cuenta|editar-cuenta|borrar-cuenta|abonar-cuenta', ['only'=>['index']]);
        $this->middleware('permission:crear-cuenta', ['only'=>['create','store']]);
        $this->middleware('permission:editar-cuenta', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-cuenta', ['only'=>['destroy']]);
        $this->middleware('permission:abonar-cuenta', ['only'=>['abonarCuenta']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar solo cuentas del asociado
        $primeraAportación = Cooperativa::first();
        $emailUsuario = Auth::user()->email;
        $asociado = DB::table('solicitud')
        ->join('asociado','solicitud.id','=','asociado.solicitud_id','inner')
        ->select('asociado.id','solicitud.email1')->where('solicitud.email1','=',$emailUsuario)->get();
        $aportado = Cuenta::where([['asociado_id','=',$asociado[0]->id],['tipo_cuenta_id','=',2]])->get(['saldo']);
        if(Auth::user()->hasRole('Asociado')){
            if(($aportado[0]->saldo == 0.0) || ($aportado[0]->saldo < $primeraAportación->montoApertura)){
                Alert('Debe realizar o completar la primera aportación.','La primera aportación tiene un monto de $'.$primeraAportación->montoApertura.', luego de que se haga efectiva podrá ver su carnet de asociado.','Info');
            }else{
                $cuentas = Cuenta::with('tipoCuenta')->where('asociado_id','=',$asociado[0]->id)->paginate(5);
                return view('cuentas.index',compact('cuentas'));
            }
            $cuentas = Cuenta::with('tipoCuenta')->where('asociado_id','=',$asociado[0]->id)->paginate(5);
            return view('cuentas.index',compact('cuentas'));
        }else{
            //Mostrar todas las cuentas
            $cuentas = Cuenta::with('tipoCuenta')->paginate(5);
            return view('cuentas.index',compact('cuentas'));
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
        $cuenta = Cuenta::find($id);
        if($request->input('saldo') != null){
            DB::table('cuenta')->where('id','=',$id)->update(['saldo' => $cuenta->saldo + $request->input('saldo')]);
            Alert('Abono a cuenta','El abono a la cuenta '.$cuenta->numeroCuenta.' por el monto de $'.$request->input('saldo').' se ha realizado correctamente','Success');
            return redirect()->route('cuentas.index');
        }else{
            Alert('Error!','Hubo en error');
            return redirect()->route('cuentas.index');
        }
        
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

    public function abonarCuenta($idCuenta)
    {
        $cuenta = Cuenta::where('id','=',$idCuenta)->get();   
        return view('cuentas.abonarCuenta',compact('cuenta'));
    }
}
