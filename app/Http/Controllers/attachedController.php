<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\attached;
use App\summary;
use Datetime;
use App\bitacora;
use Auth;


class attachedController extends Controller
{
    public function index()
   {
   	   $r=(new summaryController)->pass($act='adjuntos');

        $attached = attached::all();
        	return view('Accounting.attached.attached',['attached'=>$attached]);
    	
   }	

   public function save(Request $request)
	{	
		$r=(new summaryController)->pass($act='adjuntos');
        
    	$hoy = new Datetime ('now');
     	$log = Auth::id();
	// dd($request->input());
		$hoy = new Datetime ('now');
		$data = $request->file('path');
		
		if(isset($data)){
			$file = $request->path->store('attached','public');
		}
	
		$id=attached::insertGetId([
	        'path' =>$file,
	        'created_at' => $hoy,
	        'updated_at'=>   $hoy,
	        'summary_id'=>  $request->summary_id,
        ]);    


	  $bitacora =  new bitacora;
      $bitacora->type="add";
      $bitacora->created_at = $hoy;
      $bitacora->activity="Documento";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$id;

      $bitacora->save();
	  return redirect('summary/summary');
		
 
	}

	public function nuevo(Request $request, $id){

		$r=(new summaryController)->pass($act='adjuntos');
       

			$data = summary::where('id',$id)->first();
			return view('Accounting.attached.create',['data'=>$data]);
		

	}
	public function edit(Request $request, $id){

		$r=(new summaryController)->pass($act='adjuntos');
      

		$data = attached::where('id',$id)->first();
		return view('Accounting.attached.edit',['data'=>$data]);

		

	}

	public function update(Request $request, $id)
	{	
		$hoy = new Datetime ('now');
		$log = Auth::id();
		$data = $request->file('path');
		
		if(isset($data)){
			$file = $request->path->store('attached','public');			
		}


        $attached = attached::find($id);
        $attached->path = $file;
		$attached->updated_at = $hoy;
		$attached->save();

		$bitacora = new bitacora;
        $bitacora->created_at = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="Documento";
        $bitacora->id_user=$log;
        $bitacora->save();
		return redirect('attached/attached');
	            
	}

	public function destroy( $id)
	{
		
		$r=(new summaryController)->pass($act='adjuntos');
    

		$attached = attached::find($id);
        $attached->delete();
       	return redirect('attached/attached');

       

       	
    }
}



	    // $response = array(
     //            'status' => 'guardo',
     //            'fecha' => $hoy,
     //            'archivo' => $request->path,
     //            );
	    //  return response()->json($response);
