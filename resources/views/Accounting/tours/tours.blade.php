@extends('adminlte::page')

@section('title', 'Productos')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>

          <div class="container-fluid spark-screen">
            <div class="row">
              <div class="col-md-12 ">
                <div class="box-body">
                  <div class="container-fluid spark-screen">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box box-admin-border">
                          <div class="box-header with-border">
                             <i class="fa fa-code-fork"></i><h3 class="box-title"><b>Productos</b></h3>
                            
                            <a class="btn btn-primary " style="float: right;" href="/tours/create"> <i class="fa fa-plus"></i>Nuevo</a>
                          </div>
                          
                          <div class="box-body responsive-table">
        
                            <div id="lista_item_wrapper" class="">
                              <div class="row">
                                <div class="col-sm-12">
                                  <table id="categories" class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Nombre</th>
                                              <th>Descripción</th>
                                             
                                              <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($tours as $tur)
                                          <tr>
                                            <td>{{ $tur->id }}</td>
                                            <td>{{ $tur->name }}</td>
                                            <td>{{ $tur->description }}</td>
                                            
                                                            
                                              <td>
                                            
                                         
                                              <form role="form" action = "/tours/eliminar/{{ $tur->id }}" method="post"  enctype="multipart/form-data">
                                                    {{method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                
                                                <a class="btn btn-sm btn-default" href="/tours/ver/{{ $tur->id }}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-default" href="/tours/edit/{{ $tur->id }}"><i class="fa fa-edit"></i></a>
        
                                                <button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button></a>
                                              </form>
                                         
        
                                              </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
  
  

