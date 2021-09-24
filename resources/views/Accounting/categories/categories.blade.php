@extends('adminlte::page')

@section('title', 'Categorias')
    
@section('content_header')
      <br>
@stop
     
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            
            <li class="breadcrumb-item active">Categorias Contables</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
              <i class="fas fa-shopping-bag"></i>&nbsp&nbsp
              CATEGORIAS CONTABLES
              <a class="btn btn-success " style="float: right;" href="/categories/create">Nueva categoria</a>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                      <tr>
                        <th style="text-align: center">Id</th>
                        <th style="text-align: center">Nombre</th>
                        <th style="text-align: center">Descripción</th>
                        <th style="text-align: center">Tipo</th>
                        <th style="text-align: center">Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $categoriess)
                    <tr>
                      <td style="width:20px;text-align: center">{{ $categoriess->id }}</td>
                      <td style="width:60px;text-align: center">{{ $categoriess->name }}</td>
                      <td style="width:150px;">{{ $categoriess->description }}</td>
                      @if($categoriess->type=='add' )
                          <td style="width:60px;text-align: center">Categoria de Ingreso</td>
                      @else
                          <td style="width:60px;text-align: center">Categoria de Retiro</td>
                      @endif
                    
                    
                        <td style="width:60px;text-align: center">
                      @if($categoriess->id !==1 )
                        <form role="form" action = "/categories/eliminar/{{ $categoriess->id }}" method="post"  enctype="multipart/form-data">
                              {{method_field('DELETE')}}
                              {{ csrf_field() }}
                          <a class="btn btn-sm btn-primary" href="/categories/edit/{{ $categoriess->id }}"><i class="fa fa-edit"></i></a>
                          <button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                        </form>
                      @endif

                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>">
            </div>
        </div>

        
@stop

    
@section('css')
        
	<link rel="stylesheet" href="/css/formulario.css">
@stop
    
@section('js')
    <script src="/js/Chart.js"></script>
    <script src="/js/Chart.min.js"></script>
    <script src="/js/custom.js"></script>
    <script>

      $(document).ready(function() {
        $('.js-example-theme-single').select2({theme:"classic"});
          $('#dataTable').DataTable({
           
          });
          //modal
          

          });
  </script>
@stop
  
  

