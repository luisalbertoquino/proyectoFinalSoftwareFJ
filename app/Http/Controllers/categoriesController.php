<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\summary;
use App\attributes;
use App\bitacora;
use Auth;

class categoriesController extends Controller
{
   public function index()
   {	
   		$r=(new summaryController)->pass($act='categoria');
        

	        $categories = categories::all();
	        return view('Accounting.categories.categories',['categories'=>$categories]);

    	
   }	

   public function save(Request $request)
	{   
		$r=(new summaryController)->pass($act='categoria');
       
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
      	$log = Auth::id();

	    $valores = array(
	    	'name' => $request->name,
	    	'description' => $request->description,
	    	'type' => $request->type,
	    	);
	   	$id=categories::insertGetId($valores);

		  $bitacora =  new bitacora;
		  $bitacora->type="add";
		  $bitacora->created_at = $hoy;
		  $bitacora->activity="categorias";
		  $bitacora->id_user=$log;
		  $bitacora->id_activity=$id;
		  $bitacora->save();

	    	return redirect('categories/categories/attr/'.$id);
		
	}

	public function edit(Request $request, $id){

		$r=(new summaryController)->pass($act='categoria');
        

		$data = categories::where('id',$id)->first();
		$data1 = attributes::where('id_categorie',$id)->get();

		return view('Accounting.categories.edit',['data'=>$data,'data1'=>$data1]);
		
		
		
	}

	public function update(Request $request, $id=null)
	{	
		 $hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

		$name = $request->input('name');
		$names = $request->input('name_');
		$ids= $request->input('id');
    	$values = $request->input('value_');


    	foreach ($names as $n => $v ) {
				    	$valores = array(
				      			'name' => $v,
					    		'value' => $values[$n],
					    		'id_categorie' => $id,
					    		);
				    	if($ids[$n]==0){
				    		attributes::insert($valores);
				    	}else{
				    		attributes::where('id',$ids[$n])->update($valores);
				    	}
				    
		}

        $categories = categories::find($id);
        $categories->name = $request->name;
		$categories->description = $request->description;
		$categories->type = $request->type;
		$categories->save();

		$bitacora = new bitacora;
        $bitacora->created_at = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="categorias";
        $bitacora->id_user=$log;
        $bitacora->save();

		return redirect('categories/categories/');
	}

	public function destroy( $id)
	{	
		$r=(new summaryController)->pass($act='categoria');
      

		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

		if($data1 = summary::where('categories_id',$id)->exists()){
			$messaje = array(
                'status' => 'error',
                'messaje' => 'no se pudo Eliminar',
                'tipo'=>'1');
	     return view('Accounting.categories.error',['messaje'=>$messaje]);
		}else{


		$categories = categories::find($id);
		
		$data = categories::where('id',$id)->first();
    	$attributes = attributes::where('id_categorie',$id)->delete();
        $categories->delete();

        $bitacora = new bitacora;
        $bitacora->created_at = $hoy;
        $bitacora->type="delete";
        $bitacora->id_activity=$id;
        $bitacora->activity="categorias";
        $bitacora->id_user=$log;
        $bitacora->save();
       	return redirect('categories/categories');
       	}
       
    }
     public function destroyattr( $id)
	{	
		$r=(new summaryController)->pass($act='categoria');
        
			$hoy=date('Y-m-d H:m:s',strtotime('today'));
	        $log = Auth::id();

			if($data1 = summary::where('id_attr',$id)->exists()){
				$messaje = array(
	                'status' => 'error',
	                'messaje' => 'no se pudo Eliminar',
	                'tipo'=>'1');
		     return view('Accounting.categories.error',['messaje'=>$messaje]);
			}else{

			$categories = attributes::find($id);
	        $categories->delete();

	        $bitacora = new bitacora;
	        $bitacora->created_at = $hoy;
	        $bitacora->type="delete";
	        $bitacora->id_activity=$id;
	        $bitacora->activity="categorias";
	        $bitacora->id_user=$log;
	        $bitacora->save();
	       	return redirect('categories/categories');
	       	}
      
    }

    public function view_attr($id=null){
    	
    			$categorie = categories::find($id);
    			return view('Accounting.categories.attr',['categorie'=>$categorie]);
    		
    }

    public function save_attr(Request $request,$id=null){

		
	    	$name = $request->input('name_');
	    	$values = $request->input('value_');

	    	foreach ($name as $n => $v) {
		    	$valores = array(
		    		'name' => $v,
		    		'value' => $values[$n],
		    		'id_categorie' => $id
		    		);
		    	attributes::insert($valores);
	    	}
	    	return redirect('categories/categories');
    	
    }

    public function get_all($id){
    	$data = attributes::where('id_categorie',$id)->get();;
    	return response()->json($data);
    }
}
