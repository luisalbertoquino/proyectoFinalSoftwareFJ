@extends('adminlte::page')

    @section('title', 'Ver Rol')
    
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
            <a href="/config">Ajustes</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="/roles">Roles Registrados</a>
          </li>
          <li class="breadcrumb-item active">Mostrar Rol</li>
        </ol>

        
        <div class="table-responsive">

          <div class="card mb-3" style="width: 40rem; margin: auto"> 
              <div class="card-header"  style="text-align: center;font-size:20px; color:#34495E ;font-weight: italic;">Informacion Rol&nbsp&nbsp<i class="fa fa-address-card" aria-hidden="true"></i>
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

                  <div class="container">

                      <div class="card">
                          <div class="card-header">
                              <h3>NOMBRE: {{ $rol['nombre'] }}</h3>
                              <h4>SLUG  : {{ $rol['slug'] }}</h4>
                          </div>
                          <div class="card-body">
                              <h5 class="card-title">Permissions</h5>
                              <p style="text-align: center">
                                  @if($rol->permissions->isNotEmpty())
                                      @foreach($rol->permissions as $permission)
                                        <span class="badge badge-success">
                                            {{$permission->nombre}}
                                        </span>
                                      @endforeach
                                    @endif
                              </p>
                          </div>
                          <div class="card-footer">
                              <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
                          </div>

                      </div>
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
 