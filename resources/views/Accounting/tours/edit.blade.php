@extends('adminlte::page')

@section('title', 'Editar Producto')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Editar Producto</li>
          </ol>

        
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
    <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i><h3 class="box-title">Editar Tours</h3>
              <div>
                <button class="btn btn-primary pull-right" type="button" id="btn_add_attr2">
                  <i class="fa fa-plus"></i>
                </button>
                <button class="btn btn-primary pull-right" type="button" id="buttonremove">
                  <i class="fa fa-minus"></i>
                </button>

              </div>
            </div>
          
            <!-- /.box-header -->
            <!-- form start -->
      <form role="form" action = "/tours/editar/{{$data->id}}" method="post">
                  {{method_field('PUT')}}
                  {{ csrf_field() }}
            
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del tour</label>
                    <input required maxlength="200" type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre de la categoria ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripci??n</label>
                    <input required maxlength="200" name="description" type="text" value="{{$data->description}}"  class="form-control"  placeholder="descripti??n">
                  </div>

              @foreach ($data1 as $data1s)

                      <div class="col-md-6" >  
                        <div class="form-group">
                      
                          <label for="exampleInputPassword1">Fecha de salida </label>
                    
                          <?php  $datef= date_create($data1s->date); 

                                $fecha=date_format($datef, 'Y-m-d ');
                          ?>
                          <input class="form-control" name="date[]" type="date" value="<?php echo date('Y-m-d',strtotime($fecha)) ?>"/>
                          <input type="hidden" value="{{$data1s->id}}" name="id[]">
                        </div>
                      </div>
                    <div class="col-md-5">  
                        <label for="exampleInputPassword1">Precio </label>
                        <div class="form-group">
                        <?php  $num1=$data1s->price.'.00'  ?>
                          <input type="text"  step="any" required maxlength="200"  data-mask="000,000,000,000,000.00" data-mask-reverse="true" step="0.01"  name="price[]"  value="<?php echo $num1 ?>" class="form-control" placeholder="Precio">
                        </div>
                      </div>
                      <div class="col-md-1">  
                        <label for="exampleInputPassword1">&nbsp; </label>
                        <div class="form-group">
                          <a onclick='if(confirmDel() == false){return false;}' href="/tours/eliminarattr/{{$data1s->id}}"><i class="fa fa-trash"></i></a> 
                        </div>
                      </div>
                @endforeach
                      <div class="box-body" id="list_attr2">
                      </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </div>
      </form>
    </div>

