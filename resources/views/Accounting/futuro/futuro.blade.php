@extends('adminlte::page')

@section('title', 'Movimientos Futuros')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs--> 

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Movimientos Futuros</li>
          </ol>

<?php 
		if(isset($_GET['dias'])) {

			$dias = $_GET["dias"];
				$startf="";
					if($dias==30){
					$startf=date('Y-m-d',strtotime('today + 30 days'));
					}
					if($startf==15){
					$startf=date('Y-m-d',strtotime('today + 15 days'));
					}
					if($dias==7){
					$startf=date('Y-m-d',strtotime('today + 7 days'));
					}
					if($dias==1){
					$startf=date('Y-m-d',strtotime('today + 1 days'));
					}

					$finishf= $startf=date('Y-m-d',strtotime('today'));
			}else {
				$finishf= '';
				$startf= '';
			}

		if(isset($_GET['start'])) {
			$startf= $_GET["start"];
		} else {
			$startf= "";
		}

		if(isset($_GET['finish'])) {
			$finishf= $_GET["finish"];
		} else {
			$finishf= '';
		}

		if(isset($_GET['dias'])) {
			$diasf= $_GET["dias"];
		} else {
			$diasf = '';
		}

		if(isset($_GET["tipo"])) {
			$tipof= $_GET["tipo"];
		} else {
			$tipof= "";
		}
		if(isset($_GET["cuentas"])) {
			$cuentasf= $_GET["cuentas"];
		} else {
		$cuentasf= "";
		}
		if(isset($_GET["tipo"])) {
			$tipof= $_GET["tipo"];
		} else {
			$tipof= "";
		}

		if(isset($_GET["categoria"])) {
			$categoriaf= $_GET["categoria"];
		} else {
			$categoriaf= "";
		}

		if(isset($_GET['id_attr'])) {
			$id_attrf= $_GET["id_attr"];
		} else {
			$id_attrf = '';
		}



		if(isset($_GET['tf'])) {
			$id_tf= $_GET["tf"];
		} else {
			$id_tf = '';
		}
		if(isset($_GET['id_attr_tours'])) {
			$id_attr_tours= $_GET["id_attr_tours"];
		} else {
			$id_attr_tours = '';
		}

		$url="?start=".$startf."&finish=".$finishf."&dias=".$diasf."&tipo=". $tipof."&cuentas=".$cuentasf."&categoria=".$categoriaf."&id_attr=".$id_attrf."&id_attr_tours=".$id_attr_tours."&tf=".$id_tf ."";

?>

	


	@if(sizeof($alerta) > 0)
		<div class="card mb-3" id="lista_item_wrapper">
			<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
				<i class="fas fa-bell"></i>&nbsp&nbsp
				ALERTA DE MOVIMIENTOS POR APLICAR
			
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
							<th>ID</th>
							<th>Fecha </th>
							<th>Tipo</th>
							<th>Monto</th>
							<th>Impuesto</th>
							<th>Motivo</th>
							<th>Cuenta</th>
							<th>Categorias</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($alerta as $alertas)
							<tr>
								<td>{{ $alertas->id }}</td>
								@if( $alertas->created_at )
								<?php  $datef= date_create($alertas->created_at); 
								$fecha=date_format($datef, 'd-m-Y ');
								?>
								@endif
								<td>{{ $fecha }}</td> 
								@if($alertas->type=="add")
								<td>Abono <small class="label pull-right bg-primary">
									@if($alertas->id_transfer!="")
									<i class="fa fa-exchange"></i>
									@else
									<i class="fa fa-sort-up"></i>
									@endif
								</small></td>
								@elseif($alertas->type=="out")
									<td>Retiro <small class="label pull-right bg-red"> 
									@if($alertas->id_transfer!="")
									<i class="fa fa-exchange"></i>
									@else
									<i class="fa fa-sort-desc"></i>
									@endif
								</small></td>
								@endif
								<td>{{ number_format($alertas->amount, 2, '.', ',') }} {{$divisa->value}}</td>
								<td>{{ number_format( $alertas->tax, 2, '.', ',') }}</td>
								<td>{{ $alertas->concept }}</td>
								<td>{{ $alertas->name_account }}</td>
								<td>{{ $alertas->name_categories }}</td>
								<td>
									@if($alertas->id_transfer!="")
										<?php $elimina="eliminart";
											$id=$alertas->id_transfer;
										?>
									@else
										<?php $elimina="eliminar";
											$id=$alertas->id;
										?>
									@endif
									<form role="form" action = "/summary/<?php echo $elimina ?>/<?php echo $id ?>" method="post"  enctype="multipart/form-data">
											{{method_field('DELETE')}}
											{{ csrf_field() }}
										<a class="btn btn-sm btn-default"  href="/detalle/detalle/{{ $alertas->id }}"><i class="fa fa fa-eye"></i></a> 
										@if($alertas->attached)
										<a class="btn btn-sm btn-default" target="_blank" href="/download/{{$alertas->attached->id}}"><i class="fa fa-paperclip"></i></a>
										@endif

											@if($alertas->id_transfer!="")
										<a class="btn btn-sm btn-default" href="/transfer/edit/{{ $alertas->id_transfer }}"><i class="fa fa-edit"></i></a>
										@else
										<a class="btn btn-sm btn-default" href="/future/edit/{{ $alertas->id }}"><i class="fa fa-edit"></i></a>

										<a style="color: green;" title="Aceptar Movimiento" class="btn btn-sm btn-default" href="/future/acept/{{ $alertas->id }}"><i class="fa fa-check-square-o"></i></a>
										@endif

										
										
										<button  onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>  
							@endforeach
					</tbody>
					</table>
				
			</div>
			<div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
			</div>
		</div>
	@endif



	<div class="card mb-3" id="lista_item_wrapper">
		<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
			<i class="fas fa-share"></i>&nbsp&nbsp
			  MOVIMIENTOS FUTUROS
		  
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<form action="/futuro/futuro" method = "get">
					<div class="row">
						<div class="col-6">
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicial') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<input type="date" name="start"  class="form-control">
								  </div>
								</div>
							</div>

							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<input type="date" name="finish"  class="form-control">
								  </div>
							</div>
							

							</div>
							  <div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccionar por dias') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<select class="form-control"  type="text" name="dias" >
										<option value="">--Seleccione--</option>
										<option value="30">Proiximo mes</option>
										<option value="15">Proximos 15 dias</option>
										<option value="7">Proximos 7 dias</option>
										<option value="1">Mañana</option>
									</select>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Movimiento') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<select class="form-control"  type="text" name="tipo" >
										<option value="">--Seleccione--</option>
										<option value="1">Transferencia</option>
										<option value="add">Abonos</option>
										<option value="out">Retiros</option>						
									</select>
								  </div>
								</div>
							</div>

							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Cuentas') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<select class="form-control"  type="text" name="cuentas" >
										<option value="">--Seleccione--</option>
										@foreach ($data as $datas)
										<option value="{{ $datas->id }}">{{ $datas->name }}</option>
										@endforeach
									</select>
								  </div>
								</div>
							</div>

							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Productos') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<select class="form-control" name="tf" id="tours_select">
										<option value="">--Seleccione--</option>
										@foreach ($tours as $tour)	
											<option class="attr-{{$tour->costo}}" value="{{$tour->id }}">
												{{ $tour->nombreProducto }}
											</option>
										@endforeach
										</select>
										<div  id="modal1" class="modal" >
										  <div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" id="closemodal1" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Fecha De Tours</h4>
											  </div>
											  <div class="modal-body" id="res_ajax1">
											  
											  </div></br>
											  <div class="modal-footer">
											   <button style=" margin: 15px;" type="button" id="closemodal2" class="btn btn-default" data-dismiss="modal">Ok</button>
											  </div>
											</div>

										  </div>
										</div>
								  </div>
								</div>
							</div>

							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Categorias Financieras') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
										<select class="form-control" name="categoria" id="categorie_select">
											<option value="">--Seleccione--</option>
											@foreach ($data2 as $datas2)	
											@if($datas2->name!="transferencia")	
												<option class="attr-{{$datas2->type}}" value="{{ $datas2->id }}">
													{{ $datas2->name }}
												</option>
											@endif
											@endforeach
										</select>
												<div  id="modal" class="modal" >
													<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
														<button type="button" id="closemodal" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Subcategorias</h4>
														</div>
														<div class="modal-body" id="res_ajax">
														
														</div></br>
														<div class="modal-footer">
														<button style=" margin: 15px;" type="button" id="closemodal3" class="btn btn-default" data-dismiss="modal">Ok</button>
														</div>
													</div>

													</div>
												</div>
								  </div>
								</div>
							</div>

							<div class="form-group row">
								<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar') }}</label>
								<div class="col-md-6">
								  <div class="form-group">
									<button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>
								  </div>
								</div>
							</div>
						</div>
						
						
					</div>
				</form>
				<table class="table table-bordered" id="datatable1" width="100%" cellspacing="0">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Fecha </th>
							<th>Tipo</th>
							<th>Monto</th>
							<th>Impuesto</th>
							<th>Motivo</th>
							<th>Cuenta</th>
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
								@if($summarys->type=="add")
								<td>Abono <small class="label pull-right bg-primary">
									@if($summarys->id_transfer!="")
									<i class="fa fa-exchange"></i>
									@else
									<i class="fa fa-sort-up"></i>
									@endif
								</small></td>
								@elseif($summarys->type=="out")
									<td>Retiro <small class="label pull-right bg-red"> 
									@if($summarys->id_transfer!="")
									<i class="fa fa-exchange"></i>
									@else
									<i class="fa fa-sort-desc"></i>
									@endif
								</small></td>
								@endif
								<td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
								<td>{{ number_format( $summarys->tax, 2, '.', ',') }}</td>
								<td>{{ $summarys->concept }}</td>
								<td>{{ $summarys->name_account }}</td>
								<td>{{ $summarys->name_categories }}</td>
								<td>
									@if($summarys->id_transfer!="")
										<?php $elimina="eliminart";
											$id=$summarys->id_transfer;
										 ?>
									@else
										<?php $elimina="eliminar";
											$id=$summarys->id;
										 ?>
									@endif
									 <form role="form" action = "/summary/<?php echo $elimina ?>/<?php echo $id ?>" method="post"  enctype="multipart/form-data">
											  {{method_field('DELETE')}}
											  {{ csrf_field() }}
										  <a class="btn btn-sm btn-default"  href="/detalle/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a> 
										@if($summarys->attached)
										   <a class="btn btn-sm btn-default" target="_blank" href="/download/{{$summarys->attached->id}}"><i class="fa fa-paperclip"></i></a>
										@endif

										   @if($summarys->id_transfer!="")
											<a class="btn btn-sm btn-default" href="/transfer/edit/{{ $summarys->id_transfer }}"><i class="fa fa-edit"></i></a>
										@else
											<a class="btn btn-sm btn-default" href="/summary/edit/{{ $summarys->id }}"><i class="fa fa-edit"></i></a>
										@endif
										  
										  <button  onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
									  </form>
								</td>
							</tr>  
							@endforeach
					</tbody>
				</table>
				<br>
					<div class="row">
						<div class="col-6">
								<div class="small-box box">
									<div class="inner">
									  <h1> {{ number_format($totalfinal, 2, '.', ',') }}</h1>
										
										  <p>{{$divisa->value}}</p>
									</div>
									<div class="icon">
									  <i class="fa fa-money"></i>
									</div>
									<label class="small-box-footer bg-info">
									  Balance Futuro	
									</label>
								</div>
						</div>
						<div class="col-6">
								<div class="info-box ">
								  <span class="info-box-icon bg-success"><i class="fas fa-credit-card"></i></span>
								  <div class="info-box-content">
									<span class="info-box-text">Balance de Impuestos</span>
									<span class="info-box-number" style="color: darkgreen;" >+ {{ number_format($totalfinaliva, 2, '.', ',') }}</span>
				  
											<div class="progress">
											  <div class="progress-bar" style="width: 0%">
												  
											  </div>
											</div>
											<span class="progress-description" >No deducibles:
												<span style="color: red;"> {{ number_format($totalfinalivae, 2, '.', ',') }}</span>
											  
											</span>
								  </div>
							  </div>
							  
							  <a  target="_blank" href="/pdffuturo<?php echo $url."&tax"  ?>" class="btn btn-block btn-social btn-google">
								<i class="far fa-file-pdf"></i> Reporte Detallado 
								</a>
				  
								<a  target="_blank" href="/pdffuturo<?php echo $url  ?>" class="btn btn-block btn-social btn-google">
									<i class="far fa-file-pdf"></i> Reporte Sin tax
								</a>
						</div>
					</div>
		  </div>
		  <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
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
		  $('#dataTable1').DataTable({
              
			});
          //modal
          

          });
  </script>
@stop



