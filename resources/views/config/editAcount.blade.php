@extends('adminlte::page')

    @section('title', 'Editar Cuenta')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
            <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a> 
            </li>
            <li class="breadcrumb-item active">Modificar Cuenta</li>
        </ol>

        <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">MODIFICAR CUENTA&nbsp&nbsp<i class="fa fa-address-book" aria-hidden="true"></i>
                    <!--boton regresar-->
                    <span style="float: left">
                        <a href="/home" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </span>
                
                        <div class="card-body">
            
                            <!--mensajes de error-->
                                @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul >
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>  
                                </div>
                                @endif
                    
                            <form method="POST" action="/user2/{{$piola}}" enctype="multipart/form-data">
                                @method('PATCH')
                                {{csrf_field()}}
                                
                                @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-8">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"   value="{{$user->nombre}}" @if ($errors->has('nombre')) autofocus @endif>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-8">
                                        <input id="nombre" disabled type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"   value="{{$user->nombre}}" @if ($errors->has('nombre')) autofocus @endif>
                                    </div>
                                </div>
                                @endif
            
                                
                                @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                                <div class="form-group row">
                                    <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                                    <div class="col-md-8">
                                        <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"    value="{{$user->apellido}}" @if ($errors->has('apellido')) autofocus @endif>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                                    <div class="col-md-8">
                                        <input id="apellido" disabled type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"    value="{{$user->apellido}}" @if ($errors->has('apellido')) autofocus @endif>
                                    </div>
                                </div>
                                @endif
            
            
                                @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>
                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"    value="{{$user->username}}" @if ($errors->has('username')) autofocus @endif>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>
                                    <div class="col-md-8">
                                        <input id="username" disabled type="text" class="form-control @error('username') is-invalid @enderror" name="username"    value="{{$user->username}}" @if ($errors->has('username')) autofocus @endif>
                                    </div>
                                </div>
                                @endif
            
            
            
            
                                @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                                <div class="form-group row">
                                    <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
                                    <div class="col-md-8">
                                        <select name="idDocumento" id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" value="{{$user->idDocumento}}" @if ($errors->has('idDocumento')) autofocus @endif>
                                            @foreach ($documento as $documento)
                                            @if ($documento->estado==1){
                                            <option value={{$documento->id}}>{{$documento->tipoDocumento}}</option>
                                            }
                                        @endif
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
                                    <div class="col-md-8">
                                        <select disabled name="idDocumento" id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" value="{{$user->idDocumento}}" @if ($errors->has('idDocumento')) autofocus @endif>
                                            @foreach ($documento as $documento)
                                            @if ($documento->estado==1){
                                            <option value={{$documento->id}}>{{$documento->tipoDocumento}}</option>
                                            }
                                        @endif
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                @endif  
            
            
                                @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                                <div class="form-group row">
                                    <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Id') }}</label>
                                    <div class="col-md-8">
                                        <input id="numeroDocumento" type="number" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento"   value="{{$user->numeroDocumento}}" @if ($errors->has('numeroDocumento')) autofocus @endif>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Id') }}</label>
                                    <div class="col-md-8">
                                        <input disabled id="numeroDocumento" type="number" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento"   value="{{$user->numeroDocumento}}" @if ($errors->has('numeroDocumento')) autofocus @endif>
                                    </div>
                                </div>
                                @endif
            
                                
                                <div class="form-group row" >
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" @if ($errors->has('email')) autofocus @endif>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
            
                                <div class="form-group row">
                                    <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Imagen Perfil (Opcional)') }}</label>
                                    <div class="col-md-8">
                                        <input id="foto" type="file" class="form-control" name="foto" accept="image/*" value="{{$user->foto}}" >
                                    </div>
                                </div>
                                
            
            
            
                                <div class="form-group row">
                                    <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                                    <div class="col-md-8">
                                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$user->telefono}}" @if ($errors->has('telefono')) autofocus @endif>
                                    </div>
                                </div>
                
                    
            
            
                                <div class="form-group row">
                                    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                                    <div class="col-md-8">
                                        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$user->direccion}}" @if ($errors->has('direccion')) autofocus @endif>
                                    </div>
                                </div>
            
            
                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-5 col-form-label text-md-right">{{ __(' Old_Password') }}</label>
                                    <div class="col-md-7">
                                        <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" @if ($errors->has('oldPassword')) autofocus @endif>
                                        @error('oldPassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
            
                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('New_Password') }}</label>
                                    <div class="col-md-7">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if ($errors->has('password')) autofocus @endif>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
            
                                
                            
                                <div class="form-group row" hidden>
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Asigne un Rol') }}</label>
                                        <div class="col-md-8">
                                            <select class=" js-example-theme-single form-control @error('role') is-invalid @enderror" data-live-search="true" name="role" id="role" @if ($errors->has('role')) autofocus @endif>
                                                <option value="">Select Role...</option>
                                                @foreach($roles as $role)
                                                    @if(($role->slug!='administrador-main' && $role->slug!='administrador') || Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                                                        @if($userRol->nombre==$role->nombre)
                                                            <option selected data-role-id="{{  $role->id  }}" data-role-slug="{{  $role->slug  }}" value="{{ $role->id }}">{{ $role->nombre }}</option>
                                                        @else
                                                            <option data-role-id="{{  $role->id  }}" data-role-slug="{{  $role->slug  }}" value="{{ $role->id }}">{{ $role->nombre }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
            
            
                                <div class="form-group row" hidden>
                                    <label for="permissions_checkbox_list" class="col-md-4 col-form-label text-md-right">{{ __('Selecciona los nuevos permisos') }}</label>
                                    <div class="col-md-8">
                                        <div id="permissions_checkbox_list" class="col-md-8">
                                            @if($user->permissions->isNotEmpty())
                                                @if($rolePermissions != null)
                                                    <div id="user_permissions_checkbox_list" class="col-md-8">
                                                        @foreach ($rolePermissions as $permission)
                                                        <div class="custom-control custom-checkbox" class="col-md-8">
                                                            <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id,$userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : ''}}>
                                                            <label for="{{$permission->slug}}" class="custom-control-label" for="{{$permission->slug}}">{{$permission->nombre}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif        
                                        </div>
                                    </div>
                                </div>
                
                                <div class="form-group row" hidden>
                                    <label for="estado"  class="col-md-4 col-form-label text-md-right" >{{ __('Seleccione Estado') }}</label>
                                    <div class="col-md-6">
                                            <select name="estado" required id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado'))  @endif @if ($errors->has('estado')) autofocus @endif>
                                                @if($user->estado==0)
                                                <option  value="1">Activo</option> 
                                                <option selected value="0">Inactivo</option>
                                                @else
                                                <option selected value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                                @endif
                                            </select>
                                </div>
                                </div>
                                
                            
                                <div class="form-group pt-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Modificar Usuario') }}
                                        </button>
                                    </div>
                    
                            </form>
                        
                        </div>
                </div>
            </div>
        </div>

    @stop
    
    @section('css')
        
    @stop
    
    @section('js')

        <script>
            $(document).ready(function() {
                var premissions_box = $('#permissions_box');
                var permissions_checkbox_list = $('#permissions_checkbox_list');
                var user_permissions_box = $('#user_permissions_box');

                premissions_box.hide(); //hide all boxes
                
                $('#role').on('change', function(){
                    var role = $(this).find(':selected');
                    var role_id = role.data('role-id');
                    var role_slug = role.data('role-slug');

                    permissions_checkbox_list.empty();
                    user_permissions_box.empty();

                        $.ajax({
                            url:"/user/create",
                            method:'get',
                            dataType: 'json',
                            data:{
                                role_id: role_id,
                                role_slug: role_slug,
                            }
                        }).done(function(data){
                            console.log(data);
                            //permissions_box.show();
                            // permissions_checkbox_list.empty();


                            $.each(data, function(index, element){
                                $(permissions_checkbox_list).append(
                                    '<div class="custom-control custom-checkbox col-md-8">'+
                                    '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+element.slug+'"value="'+element.id+'">'+
                                    '<label class="custom-control-label" for="'+element.slug+'">'+element.nombre+'</label>'+
                                    '</div>'
                                );
                            });
                        });

                });
                $('.js-example-responsive').select2({theme:"classic"});
                $('.js-example-theme-single').select2({theme:"classic"});

            });
        
            
        </script>
    
    @stop
    
    
    
    
    

           