<?php

namespace App\Http\Controllers;

use App\producto; 
use App\categoria;
use App\metrica;
use Illuminate\Http\Request;
use DB;
use App\negocio;
use Illuminate\Support\Facades\Gate; 
use Barryvdh\DomPDF\Facade as PDF;


class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::get();
        $categorias = categoria::get();
        $metrica = metrica::get();
        return view('Products.product.product',['productos'=>$productos,'categorias'=>$categorias,'metrica'=>$metrica]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categorias = categoria::get();
        $metrica = metrica::get();
      
        return view('Products.product.newProduct',['categorias'=>$categorias,'metrica'=>$metrica]);
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
            'nombreProducto'=>'required|max:150',
            'detalleProducto'=>'required|max:150',
            'stock'=>'required|max:10',
            'costo'=>'required|max:10',
            'porcentajeGanancia'=>'required|max:150',
            'valorVenta'=>'required',
            'idCategoria'=>'required|max:10',
            'idMetrica'=>'required|max:10',
            'estado'=>'required'
        ]);

        $product = new producto();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $product->nombreProducto = request('nombreProducto');
        $product->detalleProducto=request('detalleProducto');
        $product->stock=request('stock');
        $product->costo=request('costo');
        $product->porcentajeGanancia=request('porcentajeGanancia');
        $product->valorVenta=request('valorVenta');
        $product->idCategoria=request('idCategoria');
        $product->idMetrica=request('idMetrica');
        $product->estado=request('estado');

        $product->save();

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $productos)
    {
        $categorias = producto::get();
        $metrica = metrica::get();
        return view('Products.product.showProduct', ['producto'=>$productos,'categorias'=>$categorias,'metrica'=>$metrica]);
    }
    
    public function show2()
    {   
        $productos = producto::get();
        $categorias = categoria::get();
        $metrica = metrica::get();
        $config= negocio::find(1); 
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteProductos', ['producto'=>$productos,'categorias'=>$categorias,'config'=>$config,'metrica'=>$metrica]);
        //$pdf = PDF::loadView('Pdf.reporteVenta', ['venta'=>$venta,'ventaFull'=>$ventaFull,'usuario'=>$usuario,'cliente'=>$cliente,'documento'=>$documento,'config'=>$config,'metrica'=>$metrica]);
        return $pdf->download();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $productos) 
    {   
        $productos = producto::find($productos->id);
        $categorias = categoria::get();
        $metrica = metrica::get(); 
        
        return view('/Products/product/editProduct', ['producto'=>$productos,'categorias'=>$categorias,'metrica'=>$metrica]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {   
        
        
        /*if (Gate::allows('isAdmin')) {
            dd('el usauario es admin');
        }else{
            dd('el usuairo no es admin');
        }*/
        $data = request()->validate([
            'nombreProducto'=>'required|max:150',
            'detalleProducto'=>'required|max:150',
            'stock'=>'required|max:10',
            'costo'=>'required|max:10',
            'porcentajeGanancia'=>'required|max:150',
            'valorVenta'=>'required|max:10',
            'idCategoria'=>'required|max:10',
            'idMetrica'=>'required|max:10',
            'estado'=>'required'
        ]);
 
        $product = producto::findOrFail($producto->id);
        $product->nombreProducto = request('nombreProducto');
        $product->detalleProducto=request('detalleProducto');
        $product->stock=request('stock');
        $product->costo=request('costo');
        $product->porcentajeGanancia=request('porcentajeGanancia');
        $product->valorVenta=request('valorVenta');
        $product->idCategoria=request('idCategoria');
        $product->idMetrica=request('idMetrica');
        $product->estado=request('estado');

        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //find the category
        $producto=producto::find($producto->id);

        //delete the category 
        $producto->delete();

        return redirect('/product');
    }

    public function estado(Request $request, producto $productos){

        $product = producto::findOrFail($productos->id);
        if($product->estado==0){
            $product->estado='1';
        }else{
            $product->estado='0';
        }
        $product->save();

        return redirect('/product');
    }
} 
