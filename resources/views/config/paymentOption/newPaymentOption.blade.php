@extends('adminlte::page')

    @section('title', 'Nueva Opcion de Pago')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item" >
              <a href="/op">Opciones de pago Registradas</a>
            </li>
            <li class="breadcrumb-item active">Nueva Opcion de Pago</li>
          </ol>
  
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">NUEVA OPCION DE PAGO&nbsp&nbsp
                    <i class="fas fa-credit-card"></i>
                
                <div class="card-body">
                    <br>
    
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
                    <form method="POST" action="/op"> 
                        {{csrf_field()}}
                        
                        <div class="form-group row">
                            <label for="clave" class="col-md-4 col-form-label text-md-right">{{ __('Clave Legal') }}</label>
                            <div class="col-md-6">
                                <input id="clave" type="clave" class="form-control @error('clave') is-invalid @enderror" name="clave" value="{{ old('clave') }}" @if ($errors->has('clave')) autofocus @endif >
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                                <textarea  id="descripcion"  type="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" cols="18" rows="3" @if ($errors->has('descripcion')) autofocus @endif>{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif>
                                        <option value="" selected disabled hidden>--Seleccione--</option>
                                        <option value="1" >Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                        </div>
                        
            
                        <div class="form-group row mb-0">
                            <br>
                        <br>
                            <div class="col-md-12 offset-md-1">
                                <a href="/op" class="btn btn-danger">Regresar</a>&nbsp&nbsp&nbsp
                                <button type="submit" class="btn btn-success">
                                    {{ __('Añadir nueva opcion de pago') }}  
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
    