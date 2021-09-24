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
            <li class="breadcrumb-item active">Saldo</li>
          </ol>

		  <!-- DataTables Example -->
		  <div class="card mb-3">
			<div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
			  <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
			  REGISTRO DE MONTOS
			  
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
				  <thead class="thead-dark">
					<tr>
						<th style="text-align: center;">ID</th>
						<th style="text-align: center;">Nombre de cuenta</th>
						<th style="text-align: center;">tipo de cuenta</th>
						<th style="text-align: center;">Numero</th>
						<th style="text-align: center;">Saldo</th>
						<th style="text-align: center;">Movimientos</th>
					</tr>
				  </thead>
				  
				  <tbody>
					@foreach ($summary as $summarys)
												<tr>
													<td style="text-align: center;">{{ $summarys->id }}</td>
													<td style="text-align: center;">{{ $summarys->name }}</td>
													<td style="text-align: center;">{{ $summarys->type}}</td>
													<td style="text-align: center;">{{ $summarys->number }}</td>
													<td style="text-align: right;"><n class="n">{{ number_format($summarys->total, 2, '.', ',') }}</n> {{$divisa->value}}
													</td>
													<td><center><a class="btn btn-sm btn-primary"  href="/account/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a></center></td>
												</tr>  
												@endforeach
				  
				  </tbody> 
				</table>
			  </div>
			  <div class="row">
				<div class="col-6">
					<div class="small-box box"> 
						<div class="inner">
						<h3>{{ number_format($totalfinal, 2, '.', ',') }}</h3>
						<p>{{$divisa->value}}</p>
						</div>
						<div class="icon"> 
							<i class="fas fa-dollar-sign"></i>
						</div>
						<label class="small-box-footer">
						<h3 class="fs-subtitle">Saldo Total</h3>  
						</label>
					</div>
				</div>

				<div class="col-6">
					@if($futuro!=null)
							<!-- Widget: user widget style 1 -->
							<div class="box box-widget widget-user-2">
						
								<div class="widget-user-header bg-info">
								<p><i class="fa fa-plus"></i> Abonos Futuros: {{ number_format($futuro->totale, 2, '.', ',') }} {{$divisa->value}}</p>
								
								</div>
								<div class="widget-user-header bg-red">
								<p> - Retiros Futuros: {{ number_format($futuro->totals, 2, '.', ',') }} {{$divisa->value}}</p>
								<h5 class="widget-user-desc"></h5>
								</div>
								<div class="box-footer no-padding">
								
									<a href="#">Total Movimientos Futuros 
									@if($futuro->totalf>0)
										<span class="pull-right badge bg-blue"> {{ number_format($futuro->totalf, 2, '.', ',') }} {{$divisa->value}}</span></a>
									@else
										<span class="pull-right badge bg-red">{{ number_format($futuro->totalf, 2, '.', ',') }} {{$divisa->value}} </span></a>
									@endif
									
								
								</div>
							</div>
							<!-- /.widget-user -->
					
					@endif								
					
				</div>
				@if($liquidez!=null)
							<div class="box-footer no-padding">
										
										@if($liquidez->totalm1>0)
											<a href="#">Liquides 1 Mes <span class="pull-right badge bg-success">{{ number_format($liquidez->totalm1, 2, '.', ',') }} {{$divisa->value}} </span><br></a>
										@else
											<a href="#">Liquides 1 Mes <span class="pull-right badge bg-danger">{{ number_format($liquidez->totalm1, 2, '.', ',') }} {{$divisa->value}}</span><br></a>
										@endif
										@if($liquidez->totalm3>0)
											<a href="#">Liquides 3 Meses <span class="pull-right badge bg-success">{{ number_format($liquidez->totalm3, 2, '.', ',') }} {{$divisa->value}}</span><br></a>
										@else
											<a href="#">Liquides 3 Meses <span class="pull-right badge bg-danger">{{ number_format($liquidez->totalm3, 2, '.', ',') }} {{$divisa->value}}</span><br></a>             
										@endif
										@if($liquidez->totalm6>0)
											<a href="#">Liquides 6 Meses <span class="pull-right badge bg-success">{{ number_format($liquidez->totalm6, 2, '.', ',') }} {{$divisa->value}}</span><br></a>
										@else
											<a href="#">Liquides 6 Meses <span class="pull-right badge bg-danger">{{ number_format($liquidez->totalm6, 2, '.', ',') }} {{$divisa->value}}</span><br></a>             
										@endif

							</div>
					@endif
			  </div>
			</div>
			<div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
		  </div>
  
		
		
			
        
    @stop

    
    @section('css')
        
		<link rel="stylesheet" href="/css/formulario.css">
    @stop
    
    @section('js')
    <script>

      $(document).ready(function() {
        $('.js-example-theme-single').select2({theme:"classic"});
		$('#dataTable').DataTable({
                
            }); 
          //modal
          

          });
  </script>
    @stop

    
    
    
	



