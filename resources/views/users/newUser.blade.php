@extends('adminlte::page')

    @section('title', 'Nuevo Usuario')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
            <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> 
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="/user">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Nuevo Usuario</li>
          </ol>
  
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto">       
        
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">REGISTRAR NUEVO USUARIO&nbsp&nbsp&nbsp<i class="fa fa-address-book" aria-hidden="true"></i>
                        <!--boton regresar-->
                        <span style="float: left">
                            <a href="/user" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
            
                        <form method="POST" action="/user" enctype="multipart/form-data">
                            @csrf
                
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-8">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror " name="nombre" @if ($errors->has('nombre')) autofocus @endif value="{{ old('nombre') }}">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                                <div class="col-md-8">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" @if ($errors->has('apellido')) autofocus @endif value="{{ old('apellido') }}">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>
                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" @if ($errors->has('username')) autofocus @endif value="{{ old('username') }}">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
                                <div class="col-md-8">
                                    <select name="idDocumento" id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" @if ($errors->has('idDocumento')) autofocus @endif value="{{ old('idDocumento') }}">
                                        @foreach ($documento as $documento)
                                        @if ($documento->estado==1){
                                        <option value={{$documento->id}}>{{$documento->tipoDocumento}}</option>
                                        }
                                    @endif
                                        @endforeach
                                    </select> 
                                </div>
                            </div>  
        
                            <div class="form-group row">
                                <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Id') }}</label>
                                <div class="col-md-8">
                                    <input id="numeroDocumento" type="number" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento" @if ($errors->has('numeroDocumento')) autofocus @endif value="{{ old('numeroDocumento') }}" >
                                </div>
                            </div>
        
                
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" @if ($errors->has('email')) autofocus @endif value="{{ old('email') }}">
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
                                    <input id="foto" type="file" class="form-control" name="foto" accept="image/*" value="{{ old('email') }}" >
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" @if ($errors->has('telefono')) autofocus @endif value="{{ old('telefono') }}">
                                        <!-- using semantic ui to display flags -->
                                    </div>
                                </div>
                            </div> 
                
                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                                <div class="col-md-8">
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" @if ($errors->has('direccion')) autofocus @endif value="{{ old('direccion') }}">
                                </div>
                            </div>
            
                            <input id="hftest" type="text" class="form-control" name="hftest"  readonly hidden>
        
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" @if ($errors->has('password')) autofocus @endif >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
        
                            
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Asigne un Rol (Opcional)') }}</label>
                                <div class="col-md-8">
                                    <select class=" form-control @error('role') is-invalid @enderror" data-live-search="true" name="role" id="role" required value="{{ old('role') }}">
                                        @foreach($roles as $role)
                                        @if(($role->slug!='administrador-main' && $role->slug!='administrador') || Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                                            @if($role->slug=='usuario')
                                                <option selected data-role-id="{{  $role->id  }}" data-role-slug="{{  $role->slug  }}" value="{{ $role->id }}">{{ $role->nombre }}</option>
                                            @else
                                                <option data-role-id="{{  $role->id  }}" data-role-slug="{{  $role->slug  }}" value="{{ $role->id }}">{{ $role->nombre }}</option>
                                            @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div id="permissions_box">
                                <div class="form-group row">
                                    <label for="permissions_checkbox_list" class="col-md-4 col-form-label text-md-right">{{ __('Select Permissions') }}</label>
                                    <div class="col-md-6" id="permissions_checkbox_list">
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="estado"  class="col-md-4 col-form-label text-md-right" >{{ __('Seleccione Estado') }}</label>
                                <div class="col-md-6">
                                        <select name="estado"  id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif value="{{ old('estado') }}">
                                            <option value="" selected disabled hidden>--Seleccione--</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                            </div>
                            </div>
        
        
                            <div class="form-group pt-2">
                                <input type="submit" class="btn btn-primary" value="Registrar Usuario">
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
        function fock(event){
            var values = $('#role_permisions2').val();
            document.getElementById("hftest").setAttribute("value",values);
    
        }
    
    
        $(document).ready(function() {
            var premissions_box = $('#permissions_box');
            var permissions_checkbox_list = $('#permissions_checkbox_list');

            //inicio
            //premissions_box.hide(); //hide all boxes
            $( window ).load(function() {
            $('#role option[value="0"]').prop('selected', true);
            var evt = document.createEvent("HTMLEvents");
            evt.initEvent("change", false, true);
            document.getElementById('role').dispatchEvent(evt);
            });

            
            $('#role').on('change', function(){
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');

                permissions_checkbox_list.empty();

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
                                '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" checked name="permissions[]" id="'+element.slug+'"value="'+element.id+'">'+
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