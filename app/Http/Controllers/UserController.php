<?php

namespace App\Http\Controllers;

use App\User;
use App\usuario;
use App\Rol;
use App\Permiso;
use App\documento;
use App\negocio; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 


class UserController extends Controller
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
        $users = User::get();
        return view('users.allUser',['users'=>$users]);
        
    }
    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        

        if($request->ajax()){
            $roles = Rol::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;
            return $permissions;
        } 

        $documento = documento::get();

        $roles = Rol::all();

        
        //dd($roles);
      
        return view('users.newUser',['documento'=>$documento,'roles'=>$roles]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $user = request()->validate([
            'nombre'=>'required|max:22',
            'apellido'=>'required|max:22',
            'username'=>'required|unique:users|max:22',
            'idDocumento'=>'required|max:22',
            'numeroDocumento'=>'required|unique:users|max:10',
            'email'=>'required|unique:users|max:255',
            'telefono'=>'required|unique:users|max:22', 
            'direccion'=>'required|max:255',
            'password'=>'required',
            'estado'=>'required|max:1',
            'foto'=>'image|max:15360',
        ]);

        $usuario = new User();
        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $usuario->nombre = request('nombre');
        $usuario->apellido=request('apellido');
        $usuario->username=request('username');
        $usuario->idDocumento=request('idDocumento');
        $usuario->numeroDocumento=request('numeroDocumento');
        $usuario->email=request('email');
        $usuario->level=1;
        $usuario->telefono=request('telefono');
        $usuario->direccion=request('direccion');
        $usuario->password=bcrypt($request->password);
        $usuario->estado=request('estado');
        if(request('foto')!=null){
            //guardado
            $pathh = $request->file("foto")->store("1JAz3p-X19GKJZQDUW8g2tB3NvVYUI_d4","google");
            Storage::disk("google")->putFileAs("",$request->file("foto"), "Foto.$usuario->username.jpg");
            $url=Storage::disk("google")->url($pathh);
            $usuario->foto=$url;
        }else{
            $imgn=null;
            $url = Storage::url($imgn);
            $usuario->foto=$url;
        } 
        $usuario->save(); 

        

        if($request->role != null){
            $usuario->roles()->attach($request->role);
            $usuario->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $usuario->permissions()->attach($permission);
                $usuario->save();
            }
        }

        return redirect('/user');
      
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.showUser' , ['user'=>$user]);
    }


    public function show2(User $user)
    {
        $user = User::get();
        $config= negocio::find(1);
        $image = base64_encode(file_get_contents(public_path($config->logo)));
        $image2 = base64_encode(file_get_contents(public_path($config->nombreLogo)));
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Pdf.reporteUsuarios', ['user'=>$user,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //$pdf = PDF::loadView('Pdf.reporteUsuarios', ['user'=>$user,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        //return view('Pdf.reporteUsuarios', ['user'=>$user,'config'=>$config,'image'=>$image,'image2'=>$image2]);
        return $pdf->stream();
    }

    //editar cuenta peronal actual lo devolvera al login una vez haya realizado los cambios
    public function index3()
    {   
        $user = Auth::user();
        $piola = $user->id;
        $documento = documento::get();
        $roles= Rol::get();
        $userRol = $user->roles->first();
        if($userRol !=null){
            $rolePermission = $userRol->permissions;
        }else{
            $rolePermission = null;
        }
        
        $userPermissions = $user->permissions;
        

        return view('config.editAcount', [
            'piola'=>$piola,
            'user'=>$user,
            'documento'=>$documento,
            'roles'=>$roles,
            'userRol'=>$userRol,
            'rolePermissions'=>$rolePermission,
            'userPermissions'=>$userPermissions
            
            ]);
    }

    //cambiar password
    public function index4()
    {   
        $user = Auth::user();
        $piola = $user->id;
        $documento = documento::get();
        $roles= Rol::get();
        $userRol = $user->roles->first();
        if($userRol !=null){
            $rolePermission = $userRol->permissions;
        }else{
            $rolePermission = null;
        }
        
        $userPermissions = $user->permissions;
        

        return view('config.editPassword', [
            'piola'=>$piola,
            'user'=>$user,
            'documento'=>$documento,
            'roles'=>$roles,
            'userRol'=>$userRol,
            'rolePermissions'=>$rolePermission,
            'userPermissions'=>$userPermissions
            
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $user = User::find($user->id);
        $piola = $user->id;
        $documento = documento::get();
        $roles= Rol::get();
        $userRol = $user->roles->first();
        if($userRol !=null){
            $rolePermission = $userRol->permissions;
        }else{
            $rolePermission = null;
        }
        
        $userPermissions = $user->permissions;
        //dd($userPermissions);

        return view('users.editUser', [
            'piola'=>$piola,
            'user'=>$user,
            'documento'=>$documento,
            'roles'=>$roles,
            'userRol'=>$userRol,
            'rolePermissions'=>$rolePermission,
            'userPermissions'=>$userPermissions
            
            ]);
    }


    public function edit2(User $user)
    {
        $user = User::find($user->id);
        $piola = $user->id;
        $documento = documento::get();
        $roles= Rol::get();
        $userRol = $user->roles->first();
        if($userRol !=null){
            $rolePermission = $userRol->permissions;
        }else{
            $rolePermission = null;
        }
        
        $userPermissions = $user->permissions;
        

        return view('config.editAcount', [
            'piola'=>$piola,
            'user'=>$user,
            'documento'=>$documento,
            'roles'=>$roles,
            'userRol'=>$userRol,
            'rolePermissions'=>$rolePermission,
            'userPermissions'=>$userPermissions
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $piola)
    {   
        $user = request()->validate([
            'nombre'=>'required|max:22',
            'apellido'=>'required|max:22',
            'username'=>'required|max:22|unique:users,username,'.$piola->id,
            'idDocumento'=>'required|max:22',
            'numeroDocumento'=>'required|max:10|unique:users,numeroDocumento,'.$piola->id,
            'email' => 'required|email|max:255|unique:users,email,'.$piola->id,
            'telefono'=>'required|max:22,telefono,'.$piola->id,
            'direccion'=>'required|max:255',
            //'password'=>'required',
            'estado'=>'required|max:1',
            'foto'=>'image|max:15360',
            

        ]);
        $usuario = User::findOrFail($piola->id);

        //para la imagen del formulario $filename
        //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
        $usuario->nombre = request('nombre');
        $usuario->apellido=request('apellido');
        $usuario->username=request('username');
        $usuario->idDocumento=request('idDocumento');
        $usuario->numeroDocumento=request('numeroDocumento');
        $usuario->email=request('email');
        $usuario->telefono=request('telefono');
        $usuario->direccion=request('direccion');
        
        $usuario->estado=request('estado');
        if(request('foto')!=null){
           //guardado
           $pathh = $request->file("foto")->store("1JAz3p-X19GKJZQDUW8g2tB3NvVYUI_d4","google");
           Storage::disk("google")->putFileAs("",$request->file("foto"), "Foto.$usuario->username.jpg");
           $url=Storage::disk("google")->url($pathh);
           $usuario->foto=$url;
        };

        
        if(request('password')!=null){
            $usuario->password=bcrypt($request->password);
        };
        $usuario->save();
        

        $usuario->roles()->detach();
        $usuario->permissions()->detach();

        if($request->role !=null){
            $usuario->roles()->attach($request->role);
            $usuario->save();
        }
        
        if($request->permissions !=null){
            foreach($request->permissions as $permission){
            $usuario->permissions()->attach($permission);
            $usuario->save();
            }
        }

        return redirect('/user');
       
    }


    public function update2(Request $request, User $piola)
    {   
        $user = request()->validate([
            'nombre'=>'required|max:22',
            'apellido'=>'required|max:22',
            'username'=>'required|max:22|unique:users,username,'.$piola->id,
            'idDocumento'=>'required|max:22',
            'numeroDocumento'=>'required|max:10|unique:users,numeroDocumento,'.$piola->id,
            'email' => 'required|email|max:255|unique:users,email,'.$piola->id,
            'telefono'=>'required|max:22,telefono,'.$piola->id,
            'direccion'=>'required|max:255',
            'oldPassword'=>'required',
            'password'=>'required|different:oldPassword',
            'estado'=>'required|max:1',
            'foto'=>'image|max:15360',
           
        ]);
        $usuario = User::findOrFail($piola->id);
        
        if (Hash::check($request->oldPassword, $usuario->password)) { 
                //para la imagen del formulario $filename
                //para guardar el id del usuario actual como registro $user=auth()->user() y luego colocar $user->id despues de igual
                $usuario->nombre = request('nombre');
                $usuario->apellido=request('apellido');
                $usuario->username=request('username');
                $usuario->idDocumento=request('idDocumento');
                $usuario->numeroDocumento=request('numeroDocumento');
                $usuario->email=request('email');
                $usuario->telefono=request('telefono');
                $usuario->direccion=request('direccion');
                $usuario->password=bcrypt($request->password);
                $usuario->estado=request('estado');
                if(request('foto')!=null){
                    //guardado
                    $pathh = $request->file("foto")->store("1JAz3p-X19GKJZQDUW8g2tB3NvVYUI_d4","google");
                    Storage::disk("google")->putFileAs("",$request->file("foto"), "Foto.$usuario->username.jpg");
                    $url=Storage::disk("google")->url($pathh);
                    $usuario->foto=$url;
                    
                    
                }
                $usuario->save();

                $usuario->roles()->detach();
                $usuario->permissions()->detach();

                if($request->role !=null){
                    $usuario->roles()->attach($request->role);
                    $usuario->save();
                }
                
                if($request->permissions !=null){
                    foreach($request->permissions as $permission){
                    $usuario->permissions()->attach($permission);
                    $usuario->save();
                    }
                } 

                return redirect('/home');

         }else{
            return redirect()->back()->withInput($request->only('oldPassword', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
            //return back()->with('status','Password incorrecta datos no actualizados');
            // return redirect("/user/" . $usuario->id . '/edit2');
            //return redirect()->back()->with('<script type="text/javascript">alert("Password incorrecta datos no actualizados");</script>');
               //return '<script type="text/javascript">alert("Password incorrecta datos no actualizados");</script>';
         } 

        
       
    }


    public function update3(Request $request, User $piola)
    {   
        $user = request()->validate([
            
            'oldPassword'=>'required',
            'password'=>'required|different:oldPassword',
           
        ]);
        $usuario = User::findOrFail($piola->id);
        
        if (Hash::check($request->oldPassword, $usuario->password)) { 

                $usuario->password=bcrypt($request->password);
                $usuario->save();
                return redirect('/home');

        }else{
                    return redirect()->back()->withInput($request->only('oldPassword', 'remember'))->withErrors([
                        'approve' => 'Wrong password or this account not approved yet.',
                    ]);
                    //return back()->with('status','Password incorrecta datos no actualizados');
                    // return redirect("/user/" . $usuario->id . '/edit2');
                    //return redirect()->back()->with('<script type="text/javascript">alert("Password incorrecta datos no actualizados");</script>');
                       //return '<script type="text/javascript">alert("Password incorrecta datos no actualizados");</script>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        //find the category
        $user=User::find($user->id);
        //delete the category
        $user->delete();

        return redirect('/user');
    }


    public function estado(Request $request, User $user){

        $user = User::findOrFail($user->id);
        if($user->estado==0){
            $user->estado='1';
        }else{
            $user->estado='0';
        }
        $user->save();

        return redirect('/user');
    }

    
} 
