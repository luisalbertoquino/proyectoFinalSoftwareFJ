@extends('adminlte::page')

    @section('title', 'Registro Cuentas')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Cuentas</li>
			<form method="get" action="/client/create" style="margin-left: auto;">
				<a class="btn btn-success " style="float: right;" href="/account/create">Añadir nueva cuenta </a>
			</form>
			
          </ol>
			
		  

				<!-- DataTables Example -->
				<div class="card mb-3">
					<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
						<i class="fas fa-university"></i>&nbsp&nbsp
            			GESTIONAR CUENTAS
					  <span style="float: right">
						<a title="Imprimir registros de tabla" href="/client2" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
					</span> 
					</div>
					<div class="card-body">
					  <div class="table-responsive">
						<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
						  <thead class="thead-dark">
							<tr>
								<th style="text-align: center">Id</th>
								<th style="text-align: center">Nombre</th>
								<th style="text-align: center">Numero de cuenta</th>
								<th style="text-align: center">Tipo</th>
								<th style="text-align: center">Acción</th>
						  </thead>
		  
						  <tbody>
							@foreach ($account as $accounts)
													<tr>
														<td style="text-align: center">{{ $accounts->id }}</td>
														<td style="text-align: center">{{ $accounts->name }}</td>
														<td style="text-align: center">{{ $accounts->number }}</td>
														<td style="text-align: center">{{ $accounts->type }}</td>
														<td style="text-align: center">
														
														<form role="form" action = "/account/eliminar/{{ $accounts->id }}" method="post"  enctype="multipart/form-data">
															{{method_field('DELETE')}}
															{{ csrf_field() }}

														<a class="btn btn-sm btn-info"  href="/account/detalle/{{ $accounts->id }}"><i class="fa fa fa-eye"></i></a>     
														<a class="btn btn-sm btn-warning" href="/account/edit/{{ $accounts->id }}"><i class="fa fa-edit"></i></a>
														<button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
													</form>

														</td>
													</tr>
													@endforeach
						  
						  </tbody>
						</table>
					  </div>
					</div>
					<div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
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
          $('#datatable').DataTable({
              
          });
          //modal
          

          });
  </script>
    @stop






	

	



