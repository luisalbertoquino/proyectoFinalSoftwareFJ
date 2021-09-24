@extends('adminlte::page')

@section('title', 'Error en categoria')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Error de Categoria</li>
          </ol>

          <div class="col-md-6">
            <div class="box box-danger">
              <div class="box-header with-border ">
              <center>
                <h3 class="box-title">Se ha producido un error</h3>
              </center>
              </div>
              <!-- /.box-header -->
                <div class="box-body">
                  <center>
                  <p>la categoria que intentas eliminar esta en uso</p>
                  </center>
                  </br>
                  <center>
                  <a  href="/categories/categories"><button><i class="fa fa-arrow-left"></i> Regresar </button>
                  </center>
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

