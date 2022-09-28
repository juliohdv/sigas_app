<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperativa;

class CooperativaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cooperativa | crear-cooperativa | editar-cooperativa | borrar-cooperativa', ['only'=>['index']]);
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
        Cooperativa::create($request->all());
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
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'logo_url' => 'required',
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
    public function destroy(Cooperativa $cooperativa)
    {
        //
        $cooperativa->delete();
        return view('cooperativas.index');
    }
}
