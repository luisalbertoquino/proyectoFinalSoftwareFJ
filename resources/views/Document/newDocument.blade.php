@extends('adminlte::page')

    @section('title', 'Nuevo Documento')
    
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
              <a href="/document">Documentos Registrados</a>
            </li>
            <li class="breadcrumb-item active">Nuevo registro de documento</li>
          </ol>
  
        <div class="table-responsive">

            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">REGISTRAR NUEVA CATEGORIA DE ID&nbsp&nbsp<i class="fas fa-id-card-alt"></i>
                    <span style="float: left">
                        <a href="/document" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
            
                    <form method="POST" action="/document">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="tipoDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Documento') }}</label>
                            <div class="col-md-6">
                                <input id="tipoDocumento" type="text" class="form-control @error('tipoDocumento') is-invalid @enderror" name="tipoDocumento"  @if ($errors->has('tipoDocumento')) autofocus @endif value="{{ old('tipoDocumento') }}">
                            </div>
                        </div>
                
            
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif value="{{ old('estado') }}">
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
                                    {{ __('Registrar nuevo Documento') }}
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
  
            