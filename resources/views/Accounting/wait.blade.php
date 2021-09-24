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
            <li class="breadcrumb-item active">Bad Access</li>
          </ol>

          <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href="#"><b>oops! no tienes permisos</a>
            </div>
            <!-- User name -->
            
        
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
            <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <i class="fa fa-clock-o fa-5x"></i>
                </div>
            <!-- /.lockscreen-image -->
        
            <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials">
                <div class="input-group">
                    <center><label  class="form-control" >Ir al pantalla de login</label></center>
        
                <div class="input-group-btn">
                    <a href="/login"><button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button></a>
                </div>
            </div>
                </div>
                <!-- /.lockscreen credentials -->
            </div>
                <!-- /.lockscreen-item -->
                <label>
                   El sitio donde quieres ingresar  esta restringido Espera a ser Aprovado.
        </div>
        <div class="text-center">
            <a href="login.html"></a>
        </div>
        <div class="lockscreen-footer text-center">
            
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



