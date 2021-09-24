@extends('adminlte::page')

    @section('title', 'Nuevo Proveedor')
    
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
            <li class="breadcrumb-item active">Registro de Proveedor</li>
          </ol>

        <div class="table-responsive">

            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">REGISTRAR NUEVO PROVEEDOR&nbsp&nbsp<i class="fa fa-handshake-o" aria-hidden="true"></i>
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
            
                    <form method="POST" action="/provider2">
                        @csrf
            
                        
                        <div class="form-group row">
                            <label for="razonSocial" class="col-md-4 col-form-label text-md-right">{{ __('Razon Social') }}</label>
                            <div class="col-md-6">
                                <input id="razonSocial" type="text" class="form-control @error('razonSocial') is-invalid @enderror" name="razonSocial" @if ($errors->has('razonSocial')) autofocus @endif  value="{{ old('razonSocial') }}">
                            </div>
                        </div> 
    
                        <div class="form-group row">
                            <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Documento') }}</label>
                            <div class="col-md-6">
                                <select name="idDocumento" id="idDocumento" class="form-control @error('idDocumento') is-invalid @enderror" @if ($errors->has('idDocumento')) autofocus @endif  value="{{ old('idDocumento') }}">
                                    <option value="" selected disabled hidden>Choose here</option>
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
                            <label for="numeroDocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Documento') }}</label>
                            <div class="col-md-6">
                                <input id="numeroDocumento" type="text" class="form-control @error('numeroDocumento') is-invalid @enderror" name="numeroDocumento" @if ($errors->has('numeroDocumento')) autofocus @endif  value="{{ old('numeroDocumento') }}">
                            </div>
                        </div>
    
            
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" @if ($errors->has('direccion')) autofocus @endif  value="{{ old('direccion') }}">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" @if ($errors->has('telefono')) autofocus @endif  value="{{ old('telefono') }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @if ($errors->has('email')) autofocus @endif  value="{{ old('email') }}">
                            </div>
                        </div>
            
                        
            
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif  value="{{ old('estado') }}">
                                        <option value="" selected disabled hidden>--Seleccione--</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                        </div>
                
                        
            
            
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary" style="align-content: center;text-lign:center">
                                    {{ __('Registrar nuevo Proveedor') }}&nbsp&nbsp<i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
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
    
    @stop
    