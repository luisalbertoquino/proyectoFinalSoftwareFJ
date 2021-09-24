@extends('adminlte::page')

@section('title', 'Bitacora')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Bitacora</li>
          </ol>

		  <div class="card mb-3" id="lista_item_wrapper">
			<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
				<i class="fas fa-clipboard-list"></i>&nbsp&nbsp
			  	BÍTACORA
			  
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form action="/bitacora/bitacora" method = "get">
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
											<option value="30">Ultimo mes</option>
											<option value="15">Ultimos 15 dias</option>
											<option value="7">Ultimos 7 dias</option>
											<option value="1">Hoy</option>
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
											<option value="add">Ingresos</option>
											<option value="out">Retiros</option>
											<option value="update">Editados</option>
											<option value="delete">Eliminados</option>									
										</select>
									  </div>
									</div>
								</div>

								<div class="form-group row">
									<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>
									<div class="col-md-6">
									  <div class="form-group">
										<select class="form-control"  type="text" name="usuarios" >
											<option value="">--Seleccione--</option>
											@foreach ($user as $users)
											<option value="{{ $users->id }}">{{ $users->nombre }}</option>
											@endforeach
										</select>
									  </div>
									</div>
								</div>

								<div class="form-group row">
									<label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Actividad') }}</label>
									<div class="col-md-6">
									  <div class="form-group">
										<select class="form-control"  type="text" name="actividad" >
											<option value="" >Activida</option>
											<option value="cuentas">Cuentas</option>
											<option value="movimiento">Movimientos</option>
											<option value="categorias">Categorias</option>
											<option value="Documento">Documentos</option>
											<option value="transferencia">Transferencia</option>
											<option value="usuario">Usuario</option>
										</select>
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
					<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th style="text-align: center">ID</th>
								<th style="text-align: center">Fecha </th>
								<th style="text-align: center">tipo</th>
								<th style="text-align: center">Actividad</th>
								<th style="text-align: center">Usuario</th>
							 </tr>
						 </thead>
						 <tbody>
							 @foreach ($bitacora as $bitacoras)
							 <tr>
								 <td style="text-align: center">{{ $bitacoras->id }}</td>
								 @if( $bitacoras->created_at )
								 @php  
								 
									 $datef= date_create($bitacoras->created_at); 
									  $fecha=date_format($datef, 'd-m-Y ');

								 @endphp
								 @endif
								 <td style="text-align: center" >{{ $bitacoras->created_at }}</td> 
								 @if($bitacoras->type=="add")
								 <td style="text-align: center" class="bg-success"><i class="fas fa-file amber-text"></i> Agregado</td>
								 @elseif($bitacoras->type=="out")
								 <td style="text-align: center" class="bg-warning"><i class="fas fa-sign-out-alt"></i> Retiro </td>
								 @elseif($bitacoras->type=="update")
								 <td style="text-align: center" class="bg-primary"><i class="fas fa-edit"></i> Editado </td>
								 @else
								<td style="text-align: center" class="bg-danger"><i class="fas fa-trash"></i> Eliminado</td>
									@endif
									<td style="text-align: center">{{ $bitacoras->activity }}</td>
								 <td style="text-align: center">
									  {{ $bitacoras->name_user }}
								 </td>
							 </tr>  
							 @endforeach
						 </tbody>
					</table>
				  
			  </div>
			  <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
			</div>
  
		  </div>

	
        
@stop

    
@section('css')
    
	
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
	

