@extends('adminlte::page')

@section('title', 'Error 404')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Error 404</li>
          </ol>

          <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h3>
                <p>
                    {{ trans('adminlte_lang::message.notfindpage') }}
                    {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a> {{ trans('adminlte_lang::message.usingsearch') }}
                </p>
                <form class='search-form'>
                    <div class='input-group'>
                        <input type="text" name="search" class='form-control' placeholder="{{ trans('adminlte_lang::message.search') }}"/>
                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                        </div>
                    </div><!-- /.input-group -->
                </form>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->

        
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
    
