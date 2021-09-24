@extends('adminlte::page')

    @section('title', 'Nuevo Plan Licencia')
    
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
              <a href="/licenciaFJ">Planes de licencia Registrados</a>
            </li>
            <li class="breadcrumb-item active">Nuevo tipo de licenciaFJ</li>
          </ol>
  
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">REGISTRAR NUEVO TIPO DE LICENCIA&nbsp&nbsp<i class="fas fa-id-card-alt"></i>
                    <span style="float: left">
                        <a href="/licenciaFJ" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
            
                    <form method="POST" action="/licencia">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="nombreLicencia" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Licencia') }}</label>
                            <div class="col-md-6">
                                <input id="nombreLicencia" type="text" class="form-control @error('nombreLicencia') is-invalid @enderror" name="nombreLicencia"  @if ($errors->has('nombreLicencia')) autofocus @endif value="{{ old('nombreLicencia') }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="tipoLicencia" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Licencia') }}</label>
                            <div class="col-md-6">
                                <input id="tipoLicencia" type="text" class="form-control @error('tipoLicencia') is-invalid @enderror" name="tipoLicencia"  @if ($errors->has('tipoLicencia')) autofocus @endif value="{{ old('tipoLicencia') }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" rows="8" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"  @if ($errors->has('descripcion')) autofocus @endif>{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="cantidadTiempo" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad tiempo(dias)') }}</label>
                            <div class="col-md-6">
                                <input id="cantidadTiempo" type="number" min="-1" class="form-control @error('cantidadTiempo') is-invalid @enderror" name="cantidadTiempo"  @if ($errors->has('cantidadTiempo')) autofocus @endif value="{{ old('cantidadTiempo') }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tiempoExtra" class="col-md-4 col-form-label text-md-right">{{ __('Tiempo Extra(dias)') }}</label>
                            <div class="col-md-6">
                                <input id="tiempoExtra" type="number" min="-1" class="form-control @error('tiempoExtra') is-invalid @enderror" name="tiempoExtra"  @if ($errors->has('tiempoExtra')) autofocus @endif value="{{ old('tiempoExtra') }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor $') }}</label>
                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor"  @if ($errors->has('valor')) autofocus @endif value="{{ old('valor') }}">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Seleccione estado</label>
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
                                    {{ __('Registrar nuevo Tipo de licencia') }}
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
  