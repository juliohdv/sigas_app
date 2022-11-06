<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperativa;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CooperativaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cooperativa|crear-cooperativa|editar-cooperativa|borrar-cooperativa', ['only'=>['index']]);
        $this->middleware('permission:crear-cooperativa', ['only'=>['create','store']]);
        $this->middleware('permission:editar-cooperativa', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-cooperativa', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cooperativas = Cooperativa::paginate(5);
        return view('cooperativas.index',compact('cooperativas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cooperativas.crear');
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
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'logo_url' => 'required',
        ]);
        $this->validate($request,[
            'logo_url.*'=> 'mimes:doc,pdf,docx,zip,png,jpeg',
        ]);
        if($request->hasFile('logo_url')){
            $file = $request->file('logo_url');
            $nombreArchivo=$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/',$nombreArchivo);          
            Cooperativa::create([
                'nombre' => $request->input('nombre'),
                'mision' => $request->input('mision'),
                'vision' => $request->input('vision'),
                'logo_url' => $nombreArchivo,
                'presidente' => $request->input('presidente'),
                'secretario' => $request->input('secretario'),
                'montoApertura' => $request->input('montoApertura'),
                'montoAhorro' => $request->input('montoAhorro'),
            ]);
        }
        
        return redirect()->route('cooperativas.index');
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
    public function edit(Cooperativa $cooperativa)
    {
        //
        return view('cooperativas.editar',compact('cooperativa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperativa $cooperativa)
    {
        //
        request()->validate([
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'logo_url' => 'required',
            'presidente' => 'required',
            'secretario' => 'required',
            'montoApertura' => 'required',
            'montoAhorro' => 'required'
        ]);
        $cooperativa->update($request->all());
        return redirect()->route('cooperativas.index');
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
        DB::table('cooperativas')->where('id',$id)->delete();
        return redirect()->route('cooperativas.index');
    }
}
