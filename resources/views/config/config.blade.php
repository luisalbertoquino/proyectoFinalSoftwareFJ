@extends('adminlte::page')

    @section('title', 'Variables Comerciales')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a> 
          </li>
          <li class="breadcrumb-item">Ajustar variables comerciales</li>
        </ol>
     
        <div class="table-responsive">
          <div class="card mb-3" style="width: 40rem; margin: auto"> 
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">ACTUALIZAR VARIABLES COMERCIALES&nbsp
                <i class="fa fa-pencil" style="color: #0860b8  ;" aria-hidden="true"></i>
                <span style="float: left">
                  <a href="/home" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              </span>
          
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

              
                <form method="POST" action="/Bussiness/{{1}}">
                    @method('PATCH')
                    {{csrf_field()}}
                    @if(Auth::user()->permissions->contains('slug', 'sistema')==true || Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                    <div class="form-group row">
                        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Pagina Web actual') }}</label>
                        <div class="col-md-8">
                            <input id="paginaWeb" type="text" class="form-control" name="paginaWeb" value="{{ $config['paginaWeb'] }}" >
                        </div>
                    </div>
                    @endif


                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Iva Establecido') }}</label>
                        <div class="col-md-4">
                          <input id="ivaActual" type="number"class="form-control" name="ivaActual" min="1" max="100" value="{{ $config['ivaActual'] }}">
                          </div>

                          <div class="col-md-1">
                            <i class="fa fa-percent" aria-hidden="true"></i>
                          </div>
                    </div>
                    @endif

                    
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <div class="form-group row">
                      <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Impuestos Adicionales') }}</label>
                      <div class="col-md-4">
                        <input id="impuestos" type="number" class="form-control" name="impuestos" min="0" max="100" value="{{ $config['impuestos'] }}" >
                      </div>
                      <div class="col-md-1">
                        <i class="fa fa-percent" aria-hidden="true"></i>
                      </div>
                  </div>
                    @endif


                    @if(Auth::user()->permissions->contains('slug', 'sistema')==true || Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true) 
                    <div class="form-group row">
                      <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Otros Aspectos comerciales') }}</label>
                      <div class="col-md-8">
                        <textarea name="otros" class="form-control" id="otros" cols="30" rows="5" >{{ $config['otros'] }}</textarea>
                      </div>
                    </div>
                    @endif
                    <br>
                    
                    <div class="form-group row mb-1">
                        <div class="col-md-12 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar Parametros') }}&nbsp&nbsp<i class="fa fa-pencil" aria-hidden="true"></i>
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
    
    

    
