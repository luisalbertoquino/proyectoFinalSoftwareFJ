@extends('adminlte::page')

    @section('title', 'Detalle Usuario')
    
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
          <li class="breadcrumb-item active">Mostrar Usuario</li>
        </ol>


        <div class="table-responsive">
          <div class="card mb-3" style="width: 40rem; margin: auto"> 
              <div class="card-header" style="text-align: center;font-size:20px; color:#34495E ;font-weight: italic;">USER DATA&nbsp&nbsp<i class="fa fa-address-book" aria-hidden="true"></i>
              
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

                

                        
                        
                              <h5 class="card-title" style="text-align: center">Informacion Usuario Id#{{ $user['id'] }} </h5>
                              <br>
                              <h6 style="success">Nombre:</h6>
                              <p style="text-align: right;">{{ $user['nombre'] }}</p>
                              <h6>apellido:</h6>
                              <p style="text-align: right">{{ $user['apellido'] }}</p>
                              <h6>Nombre de Usuario:</h6>
                              <p style="text-align: right">{{ $user['username'] }}</p>
                              <h6># Documento:</h6>
                              <p style="text-align: right">{{ $user['numeroDocumento'] }}</p>
                              <h6>Correo Electronico:</h6>
                              <p style="text-align: right">{{ $user['email'] }}</p>
                              <h6>Telefono:</h6>
                              <p style="text-align: right">{{ $user['telefono'] }}</p>
                              <h6>Direccion Residencia:</h6>
                              <p style="text-align: right">{{ $user['direccion'] }}</p>
                              <h6>Estado en el sistema:</h6>
                              @if($user->estado==1)
                                  <p style="text-align: right">Activo</p>
                              @else
                                  <p style="text-align: right">Inactivo</p>
                              @endif

                              <h6>Rol:</h6>
                              <p style="text-align: center">@if($user->roles->isNotEmpty())
                                  @foreach($user->roles as $role)
                                    <span class="badge badge-primary">
                                        {{$role->nombre}}
                                    </span>
                                  @endforeach
                                @endif
                              </p>
                              <h6>Permisos:</h6>
                              <p style="text-align: center">
                                  @if($user->permissions->isNotEmpty())
                                      @foreach($user->permissions as $permission)
                                        <span class="badge badge-success">
                                            {{$permission->nombre}}
                                        </span>
                                      @endforeach
                                    @endif
                              </p>
                        
                          <div class="card-footer">
                              <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
                          </div>

                    
                
                
                </div>
              </div>

          </div>
        </div>

    @stop
    
    @section('css')
        
    @stop
    
    @section('js')
    
    @stop
    
    
    
    
    

    

       

