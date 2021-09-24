@extends('adminlte::page')

    @section('title', 'Nueva Metrica de Producto')
    
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
              <a href="/metric">Metricas Registradas</a>
            </li>
            <li class="breadcrumb-item active">Nueva Metrica</li>
          </ol>
  
          <div class="table-responsive">        
            <div div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">NUEVA UNIDAD DE MEDIDA PARA PRODUCTO&nbsp&nbsp
                    <i class="fas fa-sort-numeric-down"></i>
                
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
                    <form method="POST" action="/metric"> 
                        {{csrf_field()}}
                        
                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Codigo de metrica') }}</label>
                            <div class="col-md-6">
                                <input  id="codigo" type="codigo" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" @if ($errors->has('codigo')) autofocus @endif >
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
                            <div class="col-md-12 offset-md-2">
                                <a href="/metric" class="btn btn-danger">Regresar</a>&nbsp&nbsp&nbsp
                                <button type="submit" class="btn btn-success">
                                    {{ __('Añadir nueva Metrica') }}  
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
    