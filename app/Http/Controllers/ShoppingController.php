<?php

namespace App\Http\Controllers;

use App\compra;
use App\User; 
use App\proveedor;
use App\producto;
use App\documento;
use App\negocio;
use App\account;
use App\summary;
use App\attached;
use App\bitacora;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaCompra;

class ShoppingController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        /*if(\Auth::user()->hasPermission('comprad')|| \Auth::user()->hasPermission('administrador-main')||\Auth::user()->hasPermission('administrador')){
            $compra = compra::get();
        }else{
            $compra = compra::where('idUsuario', \Auth::user()->id)->orderBy('id','desc')->get();
        }*/
        $compra = compra::get();
        
        $proveedor = proveedor::get();
        $summary= summary::get();
        $producto = producto::get();
        $archivo = attached::get();
        return view('Shopping.shopping',['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'archivo'=>$archivo,'summary'=>$summary]);
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
        $proveedor = proveedor::get();
        $producto = producto::get();
        $compra = compra::get();
        $config= negocio::find(1);
        $cuenta= account::get();
        if($config==null){
            $k=10;
            for ($i = 2; $i <= $k; $i++) {
                $config= negocio::find($i);
                if($config!=null){
                    $i=$k+10;
                }
            }
        }
      
        return view('Shopping.newShopping',['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'cuenta'=>$cuenta]);
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
            'serieComprobante'=>'required|max:10',
            'numeroComprobante'=>'required|max:10',
            'subtotal'=>'required', //
            'ivaAcum'=>'required', //
            'total'=>'required', //
            'fechaEmision'=>'required',
            'idProveedor'=>'required',
            'factura'=>'required',
            'estado'=>'required',
            'impuesto'=>'required', //
            'totalDescontado'=>'required', //
        ]);

        $cadena= request('idProducto');
        $cadena2= request('cantidadProducto');
        $cadena3= request('iva');
        $cadena4= request('descuentoPorcentaje');
        $array = explode(",", $cadena);
        $array2 = explode(",", $cadena2);
        $array3 = explode(",", $cadena3);
        $array4 =explode(",", $cadena4);
        $count = count($array);


        //seccion registrar movimiento

        $hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log =request('idUsuario');
        if($request->created_at > $hoy){
            $alerta=2;
          }else{
            $alerta=1;
          }
        $adjunto = $request->file('path');

        $total1=request('total');
        $descuento=request('totalDescontado');
        $ivat=request('ivaAcum');
        $gananciaT=$total1-$descuento;
        $hoyy=date('Y-m-d H:m:s',strtotime('today'));
        $transaccion = new summary();

        $id=summary::insertGetId([
            'created_at' => $hoyy,
            'id_attr' => 7,
            'concept'=>  "Compra Inventario",
            'type'=> 2,
            'amount'=> $gananciaT,
            'tax'=> $ivat, 
            'factura'=> $request->serieComprobante,
            'account_id'=> $request->cuenta,
            'categories_id'=>31,
            'id_autor'=>$log,
            'future'=>$alerta    
            ]);

        /*$transaccion->created_at = $hoyy;
        $transaccion->concept="Compra Inventario";
        $transaccion->type=2;
        $transaccion->amount=$gananciaT;
        $transaccion->factura=request('serialVenta');
        $transaccion->tax=$ivat;
        $transaccion->id_attr=7;
        $transaccion->id_autor=request('idUsuario');
        $transaccion->account_id=request('cuenta');
        $transaccion->categories_id=31;
        $transaccion->save();*/

        

        if($adjunto!=null){
            $file = $request->path->store('attached','public');
              $id2=attached::insertGetId([
                 'path' =>$file,
                 'created_at' => $hoy,
                 'updated_at'=>   $hoy,
                 'summary_id'=>  $id,
               ]);    
           }


            $bitacora =  new bitacora;
            $bitacora->type="out";
            $bitacora->created_at = $hoy;
            $bitacora->activity="Inventario";
            $bitacora->id_user=$log;
            $bitacora->id_activity=$id;
            $bitacora->save();
        
 
        //*-fin seccion registrar movimiento

        for($i = 0; $i < $count; $i++){
        $compra = new compra();
       
        $compra->serieComprobante = request('serieComprobante');
        $compra->numeroComprobante=request('numeroComprobante');
        $compra->idProducto=$array[$i]; //
        $compra->cantidad=$array2[$i]; //
        $compra->factura=request('factura');
        $compra->subtotal=request('subtotal');
        $compra->iva=$array3[$i];
        $compra->ivaAcum=request('ivaAcum');
        $compra->descuentoPorcentaje=$array4[$i];
        $compra->impuesto=request('impuesto');
        $compra->totalDescontado=request('totalDescontado');
        $compra->total=request('total');
        $compra->idProveedor=request('idProveedor');
        $compra->fechaEmision=request('fechaEmision');
        $compra->estado=request('estado');
        $compra->save();
        $producto = producto::findOrFail($array[$i]);
        $producto->stock=$producto->stock+$array2[$i];
        $producto->save();
        //manipular el inventario
        $id=$compra->id;

         //***************************EMAIL */
        //voy a enviar el email perron
        //a quien y que contendra el email
        $compraOp = compra::find($id);
        $usuario = User::get();
        $proveedor = proveedor::get();
        $compraFull = compra::get();
        $documento= documento::get();
        $config= negocio::find(1);
        $image = $config->logo;
        $image2 = $config->nombreLogo;
        $ventaOp =$request;

        Mail::to('lquinom@misena.edu.co')->send (new FacturaCompra($compraOp,$usuario,$proveedor,$compraFull,$documento,$config,$image,$image2));
        //para verificar lo que envia al final xd
        //return new FacturaCompra($compraOp,$usuario,$proveedor,$compraFull,$documento,$config,$image,$image2);

        //*****************************Fin eMAIL */
    }
    return redirect('/shopping');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(compra $compra)
    {
        $compraOp = compra::find($compra);
        $proveedor = proveedor::get();
        $producto = producto::get();
        $compra = compra::get();
        $config= negocio::find(1);
        if($config==null){
            $k=10;
            for ($i = 2; $i <= $k; $i++) {
                $config= negocio::find($i);
                if($config!=null){
                    $i=$k+10;
                }
            }
        } 
      
        return view('Shopping.viewShopping',['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config]);
    } 

    public function show2(compra $compra)
    {   
        $compraOp = compra::find($compra);
        $proveedor = proveedor::get();
        $producto = producto::get();
        $compra = compra::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteCompra', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return $pdf->stream();
        return view('Pdf.reporteCompra', ['compra'=>$compra,'compraOp'=>$compraOp,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
    }

    public function show3()
    {   
        $compra = compra::get();
        $proveedor = proveedor::get(); 
        $producto = producto::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteCompras', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return $pdf->stream();
        return view('Pdf.reporteCompras', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
    }

    public function show4(compra $compra)
    {   //dd($compra);
        $compraOp = compra::find($compra);
        $proveedor = proveedor::get();
        $producto = producto::get();
        $compra = compra::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteCompra', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return $pdf->download();
        return view('Print.imprimirCompra', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(compra $compra)
    {
        $compra = compra::find($compra->id);
        $proveedor = proveedor::get();
        $producto = producto::get(); 
        
        return view('/Shopping/viewShopping', ['compra'=>$compra,'proveedor'=>$proveedor,'producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(compra $compra)
    {
        //
    }

    public function estado(Request $request, compra $compra){

        $compraa = compra::findOrFail($compra->id);
        if($compraa->estado==0){
            $compraa->estado='1';
        }else{ 
            $compraa->estado='0';
        }
        $compraa->save();

        return redirect('/shopping');
    }
}
