<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Permiso;
use App\negocio;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class RolesController extends Controller
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
        $rol= Rol::orderBy('id','desc')->get();
        
        return view('Roles.allRoles', ['rol'=>$rol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Roles.newRol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            'role_name' => 'required|max:255',
            'role_slug' => 'required|max:255',
            'estado'=>'required',
        ]);



        //validate the rol fields
     

        $role = new Rol();
        $role->nombre = $request->role_name;
        $role->slug = $request->role_slug;
        $role->estado = $request->estado;
        $role->save(); 

        $listOfPermissions = explode(",",$request->hftest);
        //dd($listOfPermissions);
        foreach($listOfPermissions as $permission){
            $permiso = new Permiso();
            $permiso->nombre = $permission;
            $permiso->slug = strtolower(str_replace(" ","-",$permission));
            $permiso->save();
            $role->permissions()->attach($permiso->id);
            $role->save();
        }

        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return view('Roles.showRol' , ['rol'=>$rol]);
    }


    public function show2(Rol $rol)
    {
        $rol= Rol::orderBy('id','desc')->get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteRoles', ['rol'=>$rol,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteRoles', ['rol'=>$rol,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return view('Pdf.reporteRoles', ['rol'=>$rol,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        return view('Roles.editRoles', ['rol'=>$rol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'role_name' => 'required|max:255',
            'role_slug' => 'required|max:255',
            'estado'=>'required',
        ]);
        //dd($request);
        $rol->nombre = request('role_name');
        $rol->slug = request('role_slug');
        $rol->estado = request('estado');
        $rol->save();
        
        //$rol->permissions()->delete();
        $rol->permissions()->detach();
        
        

        $listOfPermissions = explode(",",$request->hftest);
        //dd($listOfPermissions);
        foreach($listOfPermissions as $permission){
            $permiso = new Permiso();
            $permiso->nombre = $permission;
            $permiso->slug = strtolower(str_replace(" ","-",$permission));
            $permiso->save();
            $rol->permissions()->attach($permiso->id);
            $rol->save();
        }
        $usuario = new User();
        




        return redirect('/roles');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->permissions()->delete();
        $rol->delete();
        $rol->permissions()->detach();
        //dd($rol);
        return redirect('/roles');
    }

    public function estado(Request $request, Rol $rol){

        $rol = Rol::findOrFail($rol->id);
        if($rol->estado==0){
            $rol->estado='1';
        }else{ 
            $rol->estado='0';
        }
        $rol->save();

        return redirect('/roles');
    }
}
