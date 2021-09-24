<?php

namespace App\Http\Controllers;

use App\negocio;
use App\contacto;
use App\summary;
use App\account;
use App\categories;
use App\categoria;
use App\settings;
use App\proveedor;
use App\permissionsi;
use Datetime;
use Auth; 

//calculos de venta
use App\venta;
use App\producto;
use App\metrica;
  
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $id=1;
          $config= negocio::find(1);
          $ventas=venta::get();
          //identifico cuantos registros hay
          // me trae todos los id no sirve$cuantosR=venta::count();
          //me trae el id mas alto de los productos, me sirve xd
          $cuantosHay=venta::max('idProducto');
          $nuevo;
          $maximo=0;
          $compara=0;
          $comparaId=0;
          $idProductMore=0;
          $minimo=100000000;
          $idProductMinus=0;
          $ganador=0;
          $cuentaTipoproducto;
          $cuentaTipoCategoria;
          $ventas = venta::all();
          $cantVentas = $ventas->unique('serialVenta')->count();
          $cuentaTipoproducto = $ventas->unique('idProducto')->count();
          $cuentaTipoproducto1 = venta::select('idProducto')->distinct()->get();
          $medida=metrica::all();
          $productos=producto::all();
          //dd($cuentaTipoproducto1);
          $contador=0;
          $coincidencia=0;
          $mmetrica;
          //dd($cuentaTipoproducto1[1]->idProducto);
          for ($i=0; $i < $cuentaTipoproducto ; $i++) { 
            # code...
            //capturo id metrica
            foreach ($productos as $productoss) {
              if($cuentaTipoproducto1[$i]->idProducto==$productoss->id){
                $mmetrica=$productoss->idMetrica;
              }
            }
            //busco que exista y no se repita
            foreach($medida as $medidas){
              //valido que coincida el id capturaod anteriormente en metricas totales
              if($medidas->id==$mmetrica){
                //valido que dicho id no se repita y capturo en un contador
                if($coincidencia<$medidas->id){
                  $contador=$contador+1;
                  $coincidencia=$medidas->id;
                }
                
              }
            }
          }

                        
          //esta contador de dios puede decirme cuantos tipos de medidas estan establecidas en las ventas
          //dd($contador);
          //cuenta cuantos tipos de metrica hay en total $contador
          //cuenta cuantos tipos de producto hay en total $cuentaTipoproducto (tiene que haber 6 tipos de producto diferentes)
          //cuenta cuentas ventas hay en total $ganador $perdedor

          if($cuantosHay!=null){
                //ahora a ver cual es el agrupar registros con unico id 
                for ($i = 1; $i <= $cuantosHay; $i++) {
                  $movements = venta::selectRaw('idProducto, SUM(cantidadProducto) as Total')
                        ->where('idProducto', $i)
                        ->groupBy('idProducto') 
                        ->get();
                        //dd($movements);
                        foreach ($movements as $perroSucio) {
                          $compara=$perroSucio->Total;
                          $comparaId=$perroSucio->idProducto;
                        }
                  if($compara>$maximo){
                    $maximo=$compara; 
                    $idProductMore=$comparaId;
                  }
                  
                  if($compara<$minimo){
                    $minimo=$compara;
                    $idProductMinus=$comparaId;
                  }
              }

              //cuantas son las ventas

              
              //dd($cantVentas);
              $ganador= producto::find($idProductMore);
              $perdedor= producto::find($idProductMinus);
              $proveedor=proveedor::get();
              $proveedorC=$proveedor->count();
              if($proveedorC==null){
                $proveedorC=0;
              }
              //dd($proveedorC);

                return view('home',['config'=>$config,'ganador'=>$ganador,'maximo'=>$maximo,'perdedor'=>$perdedor,'minimo'=>$minimo,'cantVentas'=>$cantVentas,'proveedor'=>$proveedor,'proveedorC'=>$proveedorC]);
      }else{
        $proveedorC=0;
         return view('home',['config'=>$config,'proveedorC'=>$proveedorC]);
      }
    
   
    }

    public function index2()
    {
       
      
        $log = Auth::id();
        $user=array(); 
        $user = permissionsi::where('id_user',$log)->first();
          if($user==null){
            
            $per = new permissionsi;
            $per->id_user=$log;
            $per->save();
     
          } 
              
          $r=(new summaryController)->pass($act='movimientos');
       

                $hoy=date('Y-m-d',strtotime('tomorrow'));
                $hoyy=date('Y-m-d 00:00:00',strtotime('tomorrow'));
                //cambiar tomorrow por today para que tome la grafic a apartir de mañana

                $summa = summary::where('created_at','=',$hoyy)->limit(2)->get();
                $alerta = array();
                foreach ($summa as $s) {
                  
                          if($s->created_at==$hoyy){
                                $alerta=$s->created_at;
                                $alerta=$summa;
                          }else{
                            $alerta =null;
                          }

                }
                
                $summary = summary::where('created_at','<=',$hoy)->orderBy('id','desc')->limit(5)->get();
                //dd($summary);



                $categories = categories::all();
                $divisa = settings::where('name','divisa')->first();
                $account = account::orderBy('id','desc')->limit(5)->get();
              
                $response =array();
                foreach ($account as $a) {
                    $tmp = summary::where('created_at','<=',$hoy)->where('account_id',$a->id)->get();
                    $total[$a->id] = 0;
                    foreach ($tmp as $t) {

                        if($t->type=='out'){
                            $total[$a->id] -= $t->amount;
                        }else{
                        $total[$a->id] += $t->amount;
                        }
                    }
                    $a->setAttribute('total',$total[$a->id]);
                }
              
                //total de entradas y salidas
                $mes=date('Y-m-d',strtotime('today - 30 days'));
                
                
                  $ultimo = summary::whereBetween('created_at', [$mes, $hoy])->get();
              
              
                $add = 0;
                $out = 0;
                foreach ($ultimo as $s) {
                
                    if($s->type=='add'){
                      $add +=$s->amount;
                    }elseif($s->type=='out'){
                      $out +=$s->amount; 
                    }else{
                      $add =0;
                      $out =0; 
                    }
                }

                
                foreach ($summary as $s) {
                 
                  $name_account = account::find($s->account_id);
                 //dd($s->account_id);
                  $s->setAttribute('name_account',$name_account->name);
                }
                foreach ($summary as $a) {
                  $name_categories = categories::find($a->categories_id);
                  $a->setAttribute('name_categories',$name_categories->name);
                }
                
                
                return view('home2',['summary'=>$account,'account'=>$summary,'add'=>$add,'out'=>$out,'divisa'=>$divisa,'alerta'=>$alerta]);

        
    }

    public function grafica(Request $request){
        $start = $request->input('start');
        $finish = $request->input('finish');

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);
          $summary = summary::whereBetween('created_at', [$start, $finish])->get();
        }else{
          $summary = summary::all();
        }

        
        $mes = array();
        $amounts = array();
        foreach ($summary as $s) {
          $mes[]=date('M',strtotime($s->created_at));
        }
        $mes = array_unique($mes);
        foreach ($mes as $m) {
          $amounts[$m] = array(
              'add' => 0,
              'out' => 0
            );
          foreach ($summary as $s) {
            $m_tmp = date('M',strtotime($s->created_at));
            if($m_tmp == $m){
              if($s->type == 'add'){
                  $amounts[$m]['add'] += $s->amount;
              }else{
                $amounts[$m]['out'] += $s->amount;
              }
              
            }
          }
        }
        $response = array(
            'labels' => $mes,
            'amounts' => $amounts
          );

        return response()->json($response);
    }

}
