@extends('adminlte::page')

    @section('title', 'Ver Cliente')
    
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
              <a href="/client">Clientes</a>
            </li>
            <li class="breadcrumb-item active">Editar Cliente</li>
          </ol>
  
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">VER DATOS DEL CLIENTE&nbsp&nbsp<i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <!--boton regresar-->
                    <span style="float: left">
                        <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
            
    
            
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Cliente') }}</label>
                            <div class="col-md-8">
                                <input disabled id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  autofocus="true" value="{{$cliente->nombre}}" @if ($errors->has('nombre')) autofocus @endif >
                            </div>
                        </div>
    
    
                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Cliente') }}</label>
                            <div class="col-md-8">
                                <input disabled name="apellido" class="form-control @error('apellido') is-invalid @enderror" id="apellido" value="{{$cliente->apellido}}" @if ($errors->has('apellido')) autofocus @endif>
                            </div>
                            <br>
                        </div>
                
                        <div class="form-group row">
                            <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Documento') }}</label>
                            <div class="col-md-8">
                                <select name="idDocumento" disabled id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" value="{{$cliente->idDocumento}}" @if ($errors->has('idDocumento')) autofocus @endif>
                                    @foreach ($documento as $documento)
                                    @if ($documento->estado==1)
                                        @if ($documento->id==$cliente->documento['id'])
                                            <option selected="selected" value={{$documento->id}}>{{$documento->tipoDocumento}}</option>
                                        @else
                                            <option value={{$documento->id}}>{{$documento->tipoDocumento}}</option>    
                                        @endif
                                @endif
                                    @endforeach
                                </select> 
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N°Document') }}</label>
                            <div class="col-md-8">
                                <input id="numeroDocumento" disabled type="text" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento" value="{{$cliente->numeroDocumento}}" @if ($errors->has('numeroDocumento')) autofocus @endif>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-8">
                                <input id="direccion" disabled type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$cliente->direccion}}" @if ($errors->has('direccion')) autofocus @endif>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-8">
                                <input id="telefono" disabled type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$cliente->telefono}}" @if ($errors->has('telefono')) autofocus @endif>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-8">
                                <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$cliente->email}}" @if ($errors->has('email')) autofocus @endif>
                            </div>
                        </div>
            
                        
            
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select name="estado" disabled id="estado" class="form-control @error('estado') is-invalid @enderror" value="{{$cliente->estado}}" @if ($errors->has('estado')) autofocus @endif>
                                        @if($cliente->estado==0)
                                        <option  value="1">Activo</option> 
                                        <option selected value="0">Inactivo</option>
                                        @else
                                        <option selected value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                        @endif
                                    </select>
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
    
    
    
    
    

    


        
 