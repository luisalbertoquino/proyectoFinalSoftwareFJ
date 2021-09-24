<?php

namespace App\Http\Controllers;

use App\negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class BussinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //variables comerciales
    public function index()
    {
        $config= negocio::find(1); 
        
        return view('config.config',['config'=>$config]); 
    }

    //variables de la empresa
    public function index2()
    { 
        $config= negocio::find(1);
        return view('config.business',['config'=>$config]); 
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
        $data = request()->validate([
            'nombreEmpresa'=>'required',
            'razonSocial'=>'required',
            'nit'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'paginaWeb'=>'required',
            'ivaActual'=>'required',
            'impuestos'=>'required',
            'otros'=>'required',
            'logo'=>'image|max:15360',
            'nombreLogo'=>'image|max:15360',

            ]);
            
            $config= negocio::find(1);

            $config->nombreEmpresa= request('nombreEmpresa');
            $config->razonSocial= request('razonSocial');
            $config->nit= request('nit');
            $config->telefono= request('telefono');
            $config->email= request('email');
            $config->paginaWeb= request('paginaWeb');
            $config->ivaActual= request('ivaActual');
            $config->impuestos= request('impuestos');
            $config->otros= request('otros');
            //logo
            if(request('logo')!=null){
                $imgn=$request->file('logo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                Storage::disk("google")->putFileAs("",$request->file("logo"), "Logo.$request->nombreEmpresa.jpg");
                $url = Storage::disk("google")->url($imgn);
                $configs->logo=$url;
            }
            //nombre logo
            if(request('nombreLogo')!=null){
                $imgn2=$request->file('nombreLogo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                Storage::disk("google")->putFileAs("",$request->file("nombreLogo"), "nombreLogo.$request->nombreEmpresa.jpg");
                $url = Storage::disk("google")->url($imgn2);
                $configs->nombreLogo=$url;
            };
            
            $config->save();
 
            return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function show(negocio $negocio)
    {
        
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function edit(negocio $negocio)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, negocio $negocio)
    {
        $data = request()->validate([
            'paginaWeb'=>'required',
            'ivaActual'=>'required',
            'impuestos'=>'required',
            'otros'=>'required',
            ]);
            $configs = negocio::find(1);
            
            $configs->paginaWeb= request('paginaWeb');
            $configs->ivaActual= request('ivaActual');
            $configs->impuestos= request('impuestos');
            $configs->otros= request('otros');
            $configs->save();

            return redirect('/home');
    }

 

    public function update2(Request $request, negocio $negocio)
    {
        $data = request()->validate([
            'nombreEmpresa'=>'required',
            'razonSocial'=>'required',
            'nit'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'paginaWeb'=>'required',
            'logo' => 'image|max:15360' ,
            'nombreLogo' => 'image|max:15360',
            ]);

            
            $configs = negocio::find(1); 
            if($configs==null){
                $configs = new negocio();
                $configs->nombreEmpresa= request('nombreEmpresa');
                    $configs->razonSocial= request('razonSocial');
                    $configs->nit= request('nit');
                    $configs->telefono= request('telefono');
                    $configs->email= request('email');
                    $configs->paginaWeb= request('paginaWeb');
                    $configs->ivaActual= "default";
                    $configs->impuestos= "0%";
                    $configs->otros= "Dscripcion de la parte comercial";
                    //logo
                    if(request('logo')!=null){
                        $imgn=$request->file('logo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                        Storage::disk("google")->putFileAs("",$request->file("logo"), "Logo.$request->nombreEmpresa.jpg");
                        $url = Storage::disk("google")->url($imgn);
                        $configs->logo=$url;
                    }
                    //nombre logo
                    if(request('nombreLogo')!=null){
                        $imgn2=$request->file('nombreLogo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                        Storage::disk("google")->putFileAs("",$request->file("nombreLogo"), "nombreLogo.$request->nombreEmpresa.jpg");
                        $url = Storage::disk("google")->url($imgn2);
                        $configs->nombreLogo=$url;
                    }
                    
                    $configs->save();
            }else{
                $configs->nombreEmpresa= request('nombreEmpresa');
                $configs->razonSocial= request('razonSocial');
                $configs->nit= request('nit');
                $configs->telefono= request('telefono');
                $configs->email= request('email');
                $configs->paginaWeb= request('paginaWeb');
                if(request('logo')!=null){
                    $imgn=$request->file('logo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                    Storage::disk("google")->putFileAs("",$request->file("logo"), "Logo.$request->nombreEmpresa.jpg");
                    $url = Storage::disk("google")->url($imgn);
                    $configs->logo=$url;
                }
    
                if(request('nombreLogo')!=null){
                    $imgn2=$request->file('nombreLogo')->store('1Hu7jWQskJn9kDRsCsdQ3bsKlzWrqT9jl',"google");
                    Storage::disk("google")->putFileAs("",$request->file("nombreLogo"), "nombreLogo.$request->nombreEmpresa.jpg");
                    $url = Storage::disk("google")->url($imgn2);
                    $configs->nombreLogo=$url;
                }
                $configs->save();

            }
            
            
            return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\negocio  $negocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(negocio $negocio)
    {
        //
    }
}
