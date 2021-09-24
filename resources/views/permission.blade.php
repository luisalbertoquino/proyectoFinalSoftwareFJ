
@extends('adminlte::page')

@section('title', 'Home')

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
      <!--nuevo contenido-->
      <div class="table-responsive">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Error</h3>
          </div>
          <div class="box-body">
            <div class="row"> 
              <div class="col-xs-3">
                <center><i style="margin-top: 30px;" class="fa fa-warning fa-5x"></i></center>
              </div>
              <div class="col-xs-4">
              <h1>No tienes Permisos Para acceder a este modulo</h1>
              </div>
              <div class="col-xs-12">
                <h5 class="pull-right">contacta con el adminstrador del sistema para que te asigne los permisos necesarios</h5>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

    
@stop


@section('css')
    
@stop

@section('js')

@stop




