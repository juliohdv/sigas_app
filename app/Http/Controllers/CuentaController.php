<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Asociado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\Solicitud;

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
        $emailUsuario = Auth::user()->email;
        $asociado = DB::table('solicitud')
        ->join('asociado','solicitud.id','=','asociado.solicitud_id','inner')
        ->select('asociado.id','solicitud.email1')->where('solicitud.email1','=',$emailUsuario)->get();
        if(Auth::user()->hasRole('Asociado')){
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
       Alert::html('<input type="text" name="monto" class="form-control" value="0.00">','Ingrese el monto a abonar');
        return redirect()->route('cuentas.index');
    }
}
