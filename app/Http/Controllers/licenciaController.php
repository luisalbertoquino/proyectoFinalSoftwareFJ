<?php

namespace App\Http\Controllers;

use App\licencia;
use App\User;
use App\usuario;
use App\Rol;
use App\Permiso;
use App\documento;
use App\negocio;
use Illuminate\Http\Request;

class licenciaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$licencia = licencia::get();
        return view('licencia'/*,['licencia'=>$licencia]*/);
    }

    public function index2()
    {
        $licencia = licencia::get();
        return view('AdminFJ/planesLicencia/planesLicencia',['licencia'=>$licencia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licencia = licencia::get();
      
        return view('AdminFJ.planesLicencia.nuevoPlanLicencia',['licencia'=>$licencia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombreLicencia'=>'required|max:150',
            'tipoLicencia'=>'required|max:250',
            'descripcion'=>'required|max:500',
            'cantidadTiempo'=>'required',
            'tiempoExtra'=>'required',
            'valor'=>'required',
            'estado'=>'required',
        ]);

        $licencia = new licencia();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $licencia->nombreLicencia = request('nombreLicencia');
        $licencia->tipoLicencia=request('tipoLicencia');
        $licencia->descripcion=request('descripcion');
        $licencia->cantidadTiempo=request('cantidadTiempo');
        $licencia->tiempoExtra=request('tiempoExtra');
        $licencia->valor=request('valor');
        $licencia->estado=request('estado');

        $licencia->save();

        return redirect('/licenciaFJ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function show(licencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function edit(licencia $licencia)
    {
        $licencia = licencia::find($licencia->id);
        return view('AdminFJ.planesLicencia.editarPlanLicencia',['licencia'=>$licencia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, licencia $licencia)
    {
        $data = request()->validate([
            'nombreLicencia'=>'required|max:150',
            'tipoLicencia'=>'required|max:250',
            'descripcion'=>'required|max:500',
            'cantidadTiempo'=>'required',
            'tiempoExtra'=>'required',
            'valor'=>'required',
            'estado'=>'required',
        ]); 

        $licencia = licencia::findOrFail($licencia->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $licencia->nombreLicencia = request('nombreLicencia');
        $licencia->tipoLicencia=request('tipoLicencia');
        $licencia->descripcion=request('descripcion');
        $licencia->cantidadTiempo=request('cantidadTiempo');
        $licencia->tiempoExtra=request('tiempoExtra');
        $licencia->valor=request('valor');
        $licencia->estado=request('estado');

        $licencia->save();

        return redirect('/licenciaFJ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(licencia $licencia)
    {
        $licencia->delete();

        return redirect('/licenciaFJ');
    }


    public function estado(Request $request, licencia $licencia){

        $licencia = licencia::findOrFail($licencia->id);
        if($licencia->estado==0){
            $licencia->estado='1';
        }else{
            $licencia->estado='0'; 
        }
        $licencia->save();

        return redirect('/licenciaFJ');
    }
}
