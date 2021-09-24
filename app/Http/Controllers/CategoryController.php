<?php

namespace App\Http\Controllers;

use App\categoria;
use App\producto;
use Illuminate\Http\Request;
use App\negocio; 
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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

        $categorias = categoria::get();
        
        return view('Products.category.category',['categorias'=>$categorias]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //denies
        /*if (Gate::allows('isAdmin')) {
            dd('exito perrito');
            return view('Products.category.newCategory');
            
        }else{
            dd('prueba denies correcta');
        }*/
        return view('Products.category.newCategory');
        
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
            'categoria'=>'required|max:20',
            'descripcion'=>'required|max:150',
            'estado'=>'required'
        ]);

        $category = new categoria();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $category->categoria = request('categoria');
        $category->descripcion=request('descripcion');
        $category->estado=request('estado');

        $category->save(); 

        return redirect('/category')->with('status','Categoria de producto creada correctamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        $productos = producto::get();
        return view('Products.category.showCategory' , ['categoria'=>$categoria,'productos'=>$productos]);
    }

    public function show2()
    {   
        $categorias = categoria::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteCategorias', ['categorias'=>$categorias,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteCategorias', ['categorias'=>$categorias,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return view('Pdf.reporteCategorias', ['categorias'=>$categorias,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return $pdf->stream();
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {   
        
        $categoria = categoria::find($categoria->id); 
        
        return view('/Products/category/editCategory', ['categoria'=>$categoria]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {

        $data = request()->validate([
            'categoria'=>'required|max:30',
            'descripcion'=>'required|max:150', 
            'estado'=>'required'
        ]);
        $category = categoria::findOrFail($categoria->id);
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $category->categoria = request('categoria');
        $category->descripcion=request('descripcion');
        $category->estado=request('estado');

        $category->save();

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        //find the category
        $categoria=categoria::find($categoria->id);

        //delete the category
        $categoria->delete();

        return redirect('/category');
    } 

    public function estado(Request $request, categoria $categoria){
        //dd($categoria->estado);
        
        $category = categoria::findOrFail($categoria->id);
        if($category->estado==0){
            $category->estado='1';
        }else{
            $category->estado='0';
        }
        $category->save();

        return redirect('/category');
    }
}
