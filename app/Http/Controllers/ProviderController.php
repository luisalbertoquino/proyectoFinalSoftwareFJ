<?php

namespace App\Http\Controllers;

use App\proveedor;
use App\documento;
use App\negocio; 
use Illuminate\Http\Request; 
use Barryvdh\DomPDF\Facade as PDF; 

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index()
    {
        $proveedor = proveedor::get();
        return view('Provider.provider',['proveedor'=>$proveedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documento = documento::get();
      
        return view('Provider.newProvider',['documento'=>$documento]);
    }

    public function create2()
    {
        $documento = documento::get();
      
        return view('Provider.newProviderSM',['documento'=>$documento]);
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
            'razonSocial'=>'required|max:150',
            'idDocumento'=>'required|max:150',
            'numeroDocumento'=>'required|unique:provider|max:11',
            'direccion'=>'required|max:255',
            'telefono'=>'required|max:255',
            'email'=>'required|unique:provider|max:255',
            'estado'=>'required'
        ]);

        $proveedor = new proveedor();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $proveedor->razonSocial = request('razonSocial');
        $proveedor->idDocumento=request('idDocumento');
        $proveedor->numeroDocumento=request('numeroDocumento');
        $proveedor->direccion=request('direccion');
        $proveedor->telefono=request('telefono');
        $proveedor->email=request('email');
        $proveedor->estado=request('estado');

        $proveedor->save();

        return redirect('/provider');
    }

    public function store2(Request $request)
    {
        $data = request()->validate([
            'razonSocial'=>'required|max:150',
            'idDocumento'=>'required|max:150',
            'numeroDocumento'=>'required|unique:provider|max:11',
            'direccion'=>'required|max:255',
            'telefono'=>'required|max:255',
            'email'=>'required|unique:provider|max:255',
            'estado'=>'required'
        ]);

        $proveedor = new proveedor();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $proveedor->razonSocial = request('razonSocial');
        $proveedor->idDocumento=request('idDocumento');
        $proveedor->numeroDocumento=request('numeroDocumento');
        $proveedor->direccion=request('direccion');
        $proveedor->telefono=request('telefono');
        $proveedor->email=request('email');
        $proveedor->estado=request('estado');

        $proveedor->save();

        return redirect('/shopping/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(proveedor $proveedor)
    {
        $proveedor = proveedor::find($proveedor->id);
        $documento = documento::get();
        
        return view('/Provider/showProvider', ['proveedor'=>$proveedor,'documento'=>$documento]);
    }
    
    public function show2(proveedor $proveedor)
    {
        $proveedor = proveedor::get();
        $documento = documento::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteProveedores', ['proveedor'=>$proveedor,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteVentas', ['proveedor'=>$proveedor,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return view('Pdf.reporteproveedores', ['proveedor'=>$proveedor,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedor $proveedor)
    {
        $proveedor = proveedor::find($proveedor->id);
        $documento = documento::get();
        
        return view('/Provider/editProvider', ['proveedor'=>$proveedor,'documento'=>$documento]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedor $proveedor)
    {
        $data = request()->validate([
            'razonSocial'=>'required|max:150',
            'idDocumento'=>'required|max:150',
            'numeroDocumento'=>'required|max:11|unique:provider,numeroDocumento,'.$proveedor->id,
            'direccion'=>'required|max:150',
            'telefono'=>'required|max:150',
            'email' => 'required|email|max:255|unique:provider,email,'.$proveedor->id,
            'estado'=>'required'
        ]);

        $proveedor = proveedor::findOrFail($proveedor->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $proveedor->razonSocial = request('razonSocial');
        $proveedor->idDocumento=request('idDocumento');
        $proveedor->numeroDocumento=request('numeroDocumento');
        $proveedor->direccion=request('direccion');
        $proveedor->telefono=request('telefono');
        $proveedor->email=request('email');
        $proveedor->estado=request('estado');

        $proveedor->save();

        return redirect('/provider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response 
     */
    public function destroy(proveedor $proveedor)
    {
        //find the category
        $proveedor=proveedor::find($proveedor->id);

        //delete the category
        $proveedor->delete();
        return redirect('/provider');
    }

    public function estado(Request $request, proveedor $proveedor){

        $proveedor = proveedor::findOrFail($proveedor->id);
        if($proveedor->estado==0){
            $proveedor->estado='1';
        }else{
            $proveedor->estado='0';
        }
        $proveedor->save();

        return redirect('/provider');
    }
}
