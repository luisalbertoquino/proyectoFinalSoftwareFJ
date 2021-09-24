<?php

namespace App\Http\Controllers;

use App\metrica;
use Illuminate\Http\Request;
use App\negocio;
use Barryvdh\DomPDF\Facade as PDF;

class MetricController extends Controller
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
        $metrica = metrica::get();
        return view('Products.metrica.allMetrics',['metrica'=>$metrica]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.metrica.newMetric');
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
            'codigo'=>'required|max:20',
            'descripcion'=>'required|max:150',
            'estado'=>'required'
        ]);

        $metrica = new metrica();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $metrica->codigo = request('codigo');
        $metrica->descripcion=request('descripcion');
        $metrica->estado=request('estado');

        $metrica->save();

        return redirect('/metric');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\metrica  $metrica
     * @return \Illuminate\Http\Response
     */
    public function show(metrica $metrica)
    {
        //
    }

    public function show2()
    {   
        $metrica = metrica::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteMetricas', ['metrica'=>$metrica,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteMetricas', ['metrica'=>$metrica,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return view('Pdf.reporteMetricas', ['metrica'=>$metrica,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\metrica  $metrica
     * @return \Illuminate\Http\Response
     */
    public function edit(metrica $metrica)
    {
        $metrica = metrica::find($metrica->id); 
        
        return view('Products.metrica.editMetric', ['metrica'=>$metrica]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\metrica  $metrica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, metrica $metrica)
    {
        $data = request()->validate([
            'codigo'=>'required|max:20',
            'descripcion'=>'required|max:150',
            'estado'=>'required'
        ]);
        $metric = metrica::findOrFail($metrica->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $metric->codigo = request('codigo');
        $metric->descripcion=request('descripcion');
        $metric->estado=request('estado');

        $metric->save();

        return redirect('/metric');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\metrica  $metrica
     * @return \Illuminate\Http\Response
     */
    public function destroy(metrica $metrica)
    {
        //find the category
        $metrica=metrica::find($metrica->id);

        //delete the category 
        $metrica->delete();

        return redirect('/metric');
    }

    public function estado(Request $request, metrica $metrica){
        //dd($categoria->estado);
        
        $metric = metrica::findOrFail($metrica->id);
        if($metric->estado==0){
            $metric->estado='1';
        }else{
            $metric->estado='0';
        }
        $metric->save();

        return redirect('/metric');
    }
}
