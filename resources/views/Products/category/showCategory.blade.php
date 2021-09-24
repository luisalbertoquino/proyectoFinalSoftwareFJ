@extends('adminlte::page')

    @section('title', 'Ver Categoria de Producto')
    
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
              <a href="/category">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Ver Categoria</li>
          </ol>
  
        
              
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
  
                      
                <div class="table-responsive">
                    <div div class="card mb-3" style="width: 40rem; margin: auto"> 
                        <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">INFORMACION CATEGORIA ID# {{$categoria->id}}&nbsp&nbsp<i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="msform2" action="/category/{{$categoria->id}}">
                                    @method('PATCH')
                                    {{csrf_field()}}
                                <fieldset>
                                    
                                    <h2 class="fs-title">NOMBRE: {{ $categoria->categoria }}</h2>

                                            <p style="text-align: left">
                                            <h4 class="fs-subtitle">DESCRIPCION:{{ $categoria->descripcion }}</h4>
                                            
                                            </p>
            
                                            <p style="text-align: left">
                                                <h4 class="fs-subtitle">PRODUCTOS ASOCIADOS:</h4>
                                                @foreach ($productos as $productos)
                                                    @if($productos->idCategoria==$categoria->id)
                                                        <h5 class="fs-subtitle">{{$productos->nombreProducto}}</h5>
                                                    @endif
                                                @endforeach
                                                </p>
                                            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
                                        <br>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
  
                        
                     
          
    @stop
    
    @section('css')
       
        <link rel="stylesheet" href="/css/formulario.css">
    @stop
    
    @section('js')
        <script rel="stylesheet" href="/js/formulario.js"></script>
    @stop
    
    
    
    
    

    


 



       

      
