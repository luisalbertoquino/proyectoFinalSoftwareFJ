@extends('adminlte::page')

    @section('title', 'Nueva Categoria de Producto')
    
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
              <a href="/category">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Nueva Categoria</li>
          </ol>
        
          <div class="table-responsive">
            <div div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">NUEVA CATEGORIA DE PRODUCTO&nbsp&nbsp<i class="fas fa-people-carry"></i>
                </div> 
                <div class="card-body">    
                    <form method="POST"  action="/category"> 
                        {{csrf_field()}}
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
                                <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoria') }}</label>
                                <div class="col-md-7">
                                    <input id="categoria" type="categoria" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}" @if ($errors->has('categoria')) autofocus @endif >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion Categoria') }}</label>
                                <div class="col-md-7">
                                    <textarea  id="descripcion"  type="descripcion" class="form-control @error('descripcion') is-invalid @enderror " name="descripcion" cols="18" rows="3" @if ($errors->has('descripcion')) autofocus @endif>{{ old('descripcion') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                                <div class="col-md-7">
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
                                <div class="col-md-12 offset-md-2">
                                    <a href="/category" class="btn btn-danger btn-sm">Regresar</a>&nbsp&nbsp&nbsp
                                    <button type="submit" class="btn btn-success btn-sm">
                                        {{ __('Añadir nueva categoria') }}  
                                    </button>
                                </div>
                                
                            </div>
                        
                    </form>
                </div>
            </div> 
          </div>
              
            
       
          <!-- multistep form -->

   
    
    @stop
    
    @section('css')
        
        <link rel="stylesheet" href="/css/formulario.css">
    @stop
    
    @section('js')
    <script rel="stylesheet" href="/js/formulario.js"></script>
    @stop
    
    
    
    
        
