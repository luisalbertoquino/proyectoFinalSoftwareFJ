@extends('adminlte::page')

    @section('title', 'Ver Proveedor')
    
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
              <a href="/provider">Proveedores</a>
            </li>
            <li class="breadcrumb-item active">Modificar Proveedor</li>
          </ol>

        <div class="table-responsive">

  
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">VER DATOS DE PROVEEDOR&nbsp&nbsp<i class="fa fa-handshake-o" aria-hidden="true"></i>
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
                            <label for="razonSocial" class="col-md-4 col-form-label text-md-right">{{ __('Razon Social') }}</label>
                            <div class="col-md-6">
                                <input disabled id="razonSocial" type="text" class="form-control @error('razonSocial') is-invalid @enderror" name="razonSocial"  autofocus="true" value="{{$proveedor->razonSocial}}" @if ($errors->has('razonSocial')) autofocus @endif>
                            </div>
                        </div> 
    
                        <div class="form-group row">
                            <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Documento') }}</label>
                            <div class="col-md-6">
                                <select disabled name="idDocumento" id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" value="{{$proveedor->idDocumento}}" @if ($errors->has('idDocumento')) autofocus @endif>
                                    @foreach ($documento as $documento)
                                    @if ($documento->estado==1)
                                        @if ($documento->id==$proveedor->document['id'])
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
                            <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Documento') }}</label>
                            <div class="col-md-6">
                                <input disabled id="numeroDocumento" type="text" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento"  value="{{$proveedor->numeroDocumento}}" @if ($errors->has('numeroDocumento')) autofocus @endif>
                            </div>
                        </div>
    
            
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-6">
                                <input disabled id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$proveedor->direccion}}" @if ($errors->has('direccion')) autofocus @endif >
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input disabled id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$proveedor->telefono}}" @if ($errors->has('telefono')) autofocus @endif>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{$proveedor->email}}" @if ($errors->has('email')) autofocus @endif>
                            </div>
                        </div>
            
                        
            
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select disabled name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" value="{{$proveedor->estado}}" @if ($errors->has('estado')) autofocus @endif>
                                        @if($proveedor->estado==0)
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
