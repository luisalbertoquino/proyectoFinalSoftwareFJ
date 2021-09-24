@extends('adminlte::page')

    @section('title', 'Descripcion Cuenta')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Descripcion de cuenta</li>
          </ol>

		  
		<!-- DataTables Example -->
        <div class="card mb-3">
			<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
			<i class="fa fa-bar-chart"></i>&nbsp&nbsp
			Movimientos de:  {{$nombre->name}}
			  <span style="float: right">
				<a title="Imprimir registros de tabla" href="/client2" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
			</span> 
			</div>
			<div class="card-body">
				<form action="/account/detalle/{{$id}}"   method = "get">
					<div class="row">
						<div class="col-4">
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicial') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<input type="date" name="start" class="form-control">
								  </div>
								</div>
							  </div>
						</div>
						<div class="col-4">
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<input type="date" name="finish" id="finish" class="form-control">
								  </div>
								</div>
							  </div>
						</div>
						<div class="col-4">
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<button type="submit" class="btn btn-sm  btn-default form-control"><i class="fa fa-filter"></i></button>
								  </div>
								</div>
							  </div>
						</div>
					</div>
				</form>

			  <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Fecha de creación</th>
						<th>Tipo</th>
						<th>Monto</th>
						<th>Impuesto</th>
						<th>Motivo</th>
						
						<th>Categorias</th>
						<th>Acción</th>
				  
					</tr>
				  </thead>
  
				  <tbody>
					@foreach ($summary as $summarys)
					<tr>
						<td>{{ $summarys->id }}</td>
						@if( $summarys->created_at )
						<?php  $datef= date_create($summarys->created_at); 
							$fecha=date_format($datef, 'd-m-Y ');
						?>
						@endif
						<td>{{ $fecha }}</td> 
						<!-- <td>{{ $summarys->created_at }}</td> -->
						@if($summarys->type=="add")
						<td>Abono <small class="label pull-right bg-primary"><i class="fa fa-sort-up"></i></small></td>
						@else
						<td>Retiro <small class="label pull-right bg-red"><i class="fa fa-sort-desc"></i></small></td>
						@endif
						<td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
						<td>{{ number_format($summarys->tax, 2, '.', ',') }} </td>
						<td>{{ $summarys->concept }}</td>
						
						<td>{{ $summarys->name_categories }}</td>
						<td>
								<form role="form" action = "/summary/eliminar/{{ $summarys->id }}" method="post"  enctype="multipart/form-data">
										{{method_field('DELETE')}}
										{{ csrf_field() }}
									<a class="btn btn-sm btn-info"  href="/detalle/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a> 
								@if($summarys->attached)
									<a class="btn btn-sm btn-warning" target="_blank" href="/download/{{$summarys->attached->id}}"><i class="fa fa-paperclip"></i></a>
								@endif

									
									<a class="btn btn-sm btn-success" href="/summary/edit/{{ $summarys->id }}"><i class="fa fa-edit"></i></a>
									<button  onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
								</form>
						</td>
						
					</tr>  
					@endforeach
				  
				  </tbody>
				</table>
			  </div>
			</div>
			<div class="card-footer small text-muted" style="text-align: center">
				<div class="col-md-3 col-sm-6 col-xs-12 "> 
	
					<div class="small-box box">
						<div class="inner">
						  <h3>{{ number_format($totalf, 2, '.', ',') }}</h3>

						  <p>{{$divisa->value}}</p>
						</div>
						<div class="icon">
							<i class="fas fa-dollar-sign"></i>
						</div>
						<label class="small-box-footer">
							<h3 class="fs-subtitle bg-primary">Saldo Total</h3>  
						  
						</label>
					  </div>
				</div>
				Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>">
			</div>
		  </div>
        
    @stop

    
@section('css')
    
	
@stop
    
@section('js')
    <script src="/js/Chart.js"></script>
    <script src="/js/Chart.min.js"></script>
    
    <script>

      $(document).ready(function() {
        $('.js-example-theme-single').select2({theme:"classic"});
          $('#dataTable').DataTable({
              
          });
          //modal
          

          });
  </script>
  @stop

    

