<?php

namespace App\Http\Controllers;

use App\cliente;
use App\documento;
use App\negocio;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;  
 
class ClientController extends Controller
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
        $cliente = cliente::get();
        return view('Clients.client',['clientes'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documento = documento::get();
      
        return view('Clients.newClient',['documento'=>$documento]);
    }

    public function create2()
    {
        $documento = documento::get();
      
        return view('Clients.newClientSM',['documento'=>$documento]);
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
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'idDocumento'=>'required|max:255',
            'numeroDocumento'=>'required|unique:client|max:11',
            'direccion'=>'required|max:150',
            'telefono'=>'required|max:30',
            'email'=>'required|unique:client|max:255',
            'estado'=>'required'
        ]); 

        $client = new cliente();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $client->nombre = request('nombre');
        $client->apellido=request('apellido');
        $client->idDocumento=request('idDocumento');
        $client->numeroDocumento=request('numeroDocumento');
        $client->direccion=request('direccion');
        $client->telefono=request('telefono');
        $client->email=request('email');
        $client->estado=request('estado');

        $client->save();

        return redirect('/client');
    }


    public function store2(Request $request)
    {
        $data = request()->validate([
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'idDocumento'=>'required|max:255',
            'numeroDocumento'=>'required|unique:client|max:11',
            'direccion'=>'required|max:150',
            'telefono'=>'required|max:30',
            'email'=>'required|unique:client|max:255',
            'estado'=>'required'
        ]);

        $client = new cliente();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $client->nombre = request('nombre');
        $client->apellido=request('apellido');
        $client->idDocumento=request('idDocumento');
        $client->numeroDocumento=request('numeroDocumento');
        $client->direccion=request('direccion');
        $client->telefono=request('telefono');
        $client->email=request('email');
        $client->estado=request('estado');

        $client->save();

        return redirect('/sale/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        $cliente = cliente::find($cliente->id);
        $documento = documento::get();
        
        return view('/Clients/showClient', ['cliente'=>$cliente,'documento'=>$documento]);
    }

    public function show2(cliente $cliente)
    {
        $cliente = cliente::get();
        $documento = documento::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteClientes', ['cliente'=>$cliente,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteVentas', ['cliente'=>$cliente,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return view('Pdf.reporteClientes', ['cliente'=>$cliente,'documento'=>$documento,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return $pdf->stream();
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        $cliente = cliente::find($cliente->id);
        $documento = documento::get();
        
        return view('/Clients/editClient', ['cliente'=>$cliente,'documento'=>$documento]);
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        $data = request()->validate([
            'nombre'=>'required|max:150',
            'apellido'=>'required|max:150',
            'idDocumento'=>'required|max:150',
            'numeroDocumento'=>'required|max:11|unique:client,numeroDocumento,'.$cliente->id,
            'direccion'=>'required|max:150',
            'telefono'=>'required|max:150',
            'email' => 'required|email|max:255|unique:client,email,'.$cliente->id,
            'estado'=>'required'
        ]);

        $client = cliente::findOrFail($cliente->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $client->nombre = request('nombre');
        $client->apellido=request('apellido');
        $client->idDocumento=request('idDocumento');
        $client->numeroDocumento=request('numeroDocumento');
        $client->direccion=request('direccion');
        $client->telefono=request('telefono');
        $client->email=request('email');
        $client->estado=request('estado');

        $client->save();

        return redirect('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //find the category
        $cliente=cliente::find($cliente->id);

        //delete the category
        $cliente->delete();
        return redirect('/client');
    }

    public function estado(Request $request, cliente $cliente){

        $cliente = cliente::findOrFail($cliente->id);
        if($cliente->estado==0){
            $cliente->estado='1';
        }else{
            $cliente->estado='0';
        }
        $cliente->save();

        return redirect('/client');
    }
}
