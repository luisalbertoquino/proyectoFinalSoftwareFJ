@extends('adminlte::page')

    @section('title', 'Editar Adjunto')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Resultados Generales de ventas</li>
          </ol>

          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i><h3 class="box-title">Editar Archivo</h3>
            </div>
              <div class="form-group" style="float: right;">
                  @if($data->crated_at!='null')
                      <label  >fecha de creación: <p>{{$data->created_at}}</p></label>
                      </br>
                  @endif
                </div>
                <div class="form-group">
                  @if($data->updated_at >0)
                      <label  >Ultima  edición: <p>{{$data->updated_at}}</p></label>
                      </br>
                  @endif
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/attached/editar/{{$data->id}}" method="post"  enctype="multipart/form-data">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Archivo adjunto</label>
                  <input required type="file" name="path" value="{{$data->path}}" class="form-control" placeholder="nombre del archivo ">
                </div>
              
               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
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
												

	


