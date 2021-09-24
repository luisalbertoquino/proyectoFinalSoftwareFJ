<?php

namespace App\Http\Controllers;

use App\contacto;
use App\User;
use App\usuario;
use App\Rol;
use App\Permiso;
use App\documento; 
use App\negocio;
use App\licencia; 
use Illuminate\Http\Request;

class contactoController extends Controller
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
        //$contacto = contacto::get();
    return view('contact'/*,['contacto'=>$contacto]*/);
    }

    public function index2()
    {   
        $usuario = User::get();
        $documento= documento::get();
        $contacto = contacto::get();
        $configu= negocio::find(1);
        if($configu==null){
            $config="No Registrada";
            
        }else{
            $config=$configu->nombreEmpresa;
        }
        return view('AdminFJ.clienteEmpresa.empresaRegistrada',['contacto'=>$contacto,'usuario'=>$usuario,'documento'=>$documento,'config'=>$config]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = User::get();
        $documento = documento::get();
        $contacto = contacto::find(1);
        $licencia = licencia::get();
        $usuario2 = User::get();
        $configu= negocio::find(1);
        if($configu==null){
            $config="No Registrada";
            
        }else{
            $config=$configu->nombreEmpresa;
        }
        return view('AdminFJ.clienteEmpresa.nuevoServicio',['contacto'=>$contacto,'usuario'=>$usuario,'usuario2'=>$usuario2,'documento'=>$documento,'licencia'=>$licencia,'config'=>$config]);
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
            'idCliente'=>'required',
            'idResponsable'=>'required',
            'idLicencia'=>'required',
            'horaInicio'=>'required',
            'fechaInicio'=>'required',
            'fechaFinal'=>'required',
            'estado'=>'required',
        ]);
        //dd($request);
        $contacto = contacto::find(1);
        if($contacto==null){
            $contacto = new contacto();
            $contacto->idCliente = request('idCliente');
            $contacto->idResponsable=request('idResponsable');
            $contacto->idLicencia=request('idLicencia');
            $contacto->horaInicio=request('horaInicio');
            $contacto->fechaInicio=request('fechaInicio');
            $contacto->fechaFinal=request('fechaFinal');
            $contacto->estado=request('estado');
            $contacto->save();
            return redirect('/contactoFJ');
        }else{
            //para la imagen del formulario $filename
            //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
            $contacto->idCliente = request('idCliente');
            $contacto->idResponsable=request('idResponsable');
            $contacto->idLicencia=request('idLicencia');
            $contacto->horaInicio=request('horaInicio');
            $contacto->fechaInicio=request('fechaInicio');
            $contacto->fechaFinal=request('fechaFinal');
            $contacto->estado=request('estado');
            $contacto->save();
            return redirect('/contactoFJ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(contacto $contacto)
    {
        
        $documento = documento::get();
        $contacto = contacto::find(1);
        $usuario = User::get();
        $usuario2 = User::get();
        $licencia = licencia::get();
        $configu= negocio::find(1);
        if($configu==null){
            $config="No Registrada";
            
        }else{
            $config=$configu->nombreEmpresa;
        } 

        return view('AdminFJ.clienteEmpresa.editarServicio',['contacto'=>$contacto,'usuario'=>$usuario,'usuario2'=>$usuario2,'documento'=>$documento,'licencia'=>$licencia,'config'=>$config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacto $contacto)
    {
        $data = request()->validate([
            'idCliente'=>'required',
            'idResponsable'=>'required',
            'idLicencia'=>'required',
            'horaInicio'=>'required',
            'fechaInicio'=>'required',
            'fechaFinal'=>'required',
            'estado'=>'required',
        ]);

        $contacto = contacto::find(1);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $contacto->idCliente = request('idCliente');
        $contacto->idResponsable=request('idResponsable');
        $contacto->idLicencia=request('idLicencia');
        $contacto->horaInicio=request('horaInicio');
        $contacto->fechaInicio=request('fechaInicio');
        $contacto->fechaFinal=request('fechaFinal');
        $contacto->estado=request('estado');
        $contacto->save();
        return redirect('/contactoFJ'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(contacto $contacto)
    {
        $contacto->delete();
        //contacto::statement('ALTER TABLE contacto AUTO_INCREMENT = 1;');
        return redirect('/contactoFJ');
    }


    public function estado(Request $request, contacto $contacto){

        $contacto = contacto::findOrFail($contacto->id);
        if($contacto->estado==0){
            $contacto->estado='1';
        }else{
            $contacto->estado='0';
        }
        $contacto->save();

        return redirect('/contactoFJ');
    }
}
