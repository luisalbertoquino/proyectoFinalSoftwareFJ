<?php

namespace App\Http\Controllers;

use App\opcionDePago;
use Illuminate\Http\Request;
use App\negocio;
use Barryvdh\DomPDF\Facade as PDF;

class OptionPaymentController extends Controller
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
        $opcionDePago = opcionDePago::get();
        return view('config.paymentOption.paymentOption',['opcionDePago'=>$opcionDePago]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.paymentOption.newPaymentOption');
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
            'clave'=>'required|max:20',
            'descripcion'=>'required|max:150',
            'estado'=>'required'
        ]);

        $opcionDePago = new opcionDePago();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $opcionDePago->clave = request('clave');
        $opcionDePago->descripcion=request('descripcion');
        $opcionDePago->estado=request('estado');

        $opcionDePago->save();

        return redirect('/op');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\opcionDePago  $opcionDePago
     * @return \Illuminate\Http\Response
     */
    public function show(opcionDePago $opcionDePago)
    {
        //
    }

    public function show2()
    {   $opcionDePago = opcionDePago::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteOpcionesdePago', ['opcionDePago'=>$opcionDePago,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteOpcionesdePago', ['opcionDePago'=>$opcionDePago,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return view('Pdf.reporteOpcionesdePago', ['opcionDePago'=>$opcionDePago,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\opcionDePago  $opcionDePago
     * @return \Illuminate\Http\Response
     */
    public function edit(opcionDePago $opcionDePago)
    {
        $opcionDePago = opcionDePago::find($opcionDePago->id); 
        
        return view('config.paymentOption.editPaymentOption', ['opcionDePago'=>$opcionDePago]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\opcionDePago  $opcionDePago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, opcionDePago $opcionDePago)
    {
        $data = request()->validate([
            'clave'=>'required|max:20',
            'descripcion'=>'required|max:150',
            'estado'=>'required'
        ]);

        $opcionDePago = opcionDePago::findOrFail($opcionDePago->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $opcionDePago->clave = request('clave');
        $opcionDePago->descripcion=request('descripcion');
        $opcionDePago->estado=request('estado');

        $opcionDePago->save();

        return redirect('/op');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\opcionDePago  $opcionDePago
     * @return \Illuminate\Http\Response
     */
    public function destroy(opcionDePago $opcionDePago)
    {
        //find the category
        $opcionDePago=opcionDePago::find($opcionDePago->id);

        //delete the category 
        $opcionDePago->delete();

        return redirect('/op');
    }

    public function estado(Request $request, opcionDePago $opcionDePago){
        //dd($categoria->estado);
        
        $opcionDePago = opcionDePago::findOrFail($opcionDePago->id);
        if($opcionDePago->estado==0){
            $opcionDePago->estado='1';
        }else{
            $opcionDePago->estado='0';
        }
        $opcionDePago->save();

        return redirect('/op');
    }
}
