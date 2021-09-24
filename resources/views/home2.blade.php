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
            <li class="breadcrumb-item active">Resumen Contable</li>
          </ol>
        
          <!--nuevo contenido-->
          <!--las cards-->
          <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="background-color: rgba(245, 245, 245, 0.7);">
                  <span class="info-box-icon bg-success"><i class="fas fa-dollar-sign"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Abonos</span>
                    <br>
                    <a href="/summary/create?type=add" style="text-align: right">Añadir Depositos</a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="background-color: rgba(245, 245, 245, 0.7);">
                  <span class="info-box-icon bg-warning" ><i class="fas fa-tags" style="color:#ffff"></i></span>
      
                  <div class="info-box-content">
                    <span class="info-box-text">Retiros</span>
                    <br>
                  <a href="/summary/create?type=out" style="text-align: right">Añadir Retiros</a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="background-color: rgba(245, 245, 245, 0.7);">
                  <span class="info-box-icon bg-primary"><i class="fas fa-thumbs-up"></i></span>
      
                  <div class="info-box-content">
                    <span class="info-box-text">Abonos</span>
                    <br>
                    <span class="info-box-number" style="text-align: right">{{ number_format($add, 2, ',', '.') }} {{$divisa->value}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="background-color: rgba(245, 245, 245, 0.7);">
                  <span class="info-box-icon bg-red"><i class="fas fa-money-check-alt"></i></span>
      
                  <div class="info-box-content">
                    <span class="info-box-text">Retiros</span>
                    <br>
                    <span class="info-box-number" style="text-align: right">{{ number_format($out, 2, ',', '.') }}  {{$divisa->value}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          </div>
          <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
            RESUMEN CONTABLE
            
          </div>
          <div class="card-body">
              <div class="table-responsive">
                <div class="row">
                  <!--los filtros-->
                    <div class="col-6">
                      <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicial') }}</label>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="date" name="start" id="start" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="date" name="finish" id="finish" class="form-control">
                            <br>
                            <a href="javascript:void(0)" id="filter_btn" class="btn btn-primary" style="align-content: center;text-lign:center"><i class="fa fa-filter"></i> {{ __('Filtrar por Fecha') }}</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--la grafica-->
                    <div class="col-6" id="form_filter">
                      
                      <div><canvas id="myChart" class="col-sm-12"></canvas></div>
                        <center><label>Abonos&nbsp; </label><label class="entrada" >&nbsp;&nbsp;&nbsp;&nbsp; </label> &nbsp;&nbsp;  <label>Retiros &nbsp;</label><label class="salida" > &nbsp;&nbsp;&nbsp;&nbsp;</label></center>
                      
                    </div>
                  </div>
                    <!--el par de tablas-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card" style="background-color: rgba(245, 245, 245, 0.7);">
                          <div class="card-header" style="text-align: center">
                            <h3 class="box-title bg-success"><i class="fas fa-coins"></i>&nbsp;&nbsp;Saldo Disponible</h3>
                          </div>
                          <div class="card-body">
                            <table  class="table table-striped">
                                            <thead>
                                              <tr>
                                                
                                                <th>Nombre</th>
                                                <th>tipo </th>
                                                <th>Numero</th>
                                                
                                                <th>Saldo</th>
                                              
                                              </tr>
                                            </thead>
                                            <tbody>
                                                  @foreach ($summary as $summarys)
                                                  <tr>
                                                    
                                                    <td>{{ $summarys->name }}</td>
                                                    <td>{{ $summarys->type}}</td>
                                                    <td>{{ $summarys->number }}</td>
                                                    <td><n class="n">{{ number_format($summarys->total , 2, ',', '.') }} </n> {{$divisa->value}}</td>
                                                  </tr>  
                                                  @endforeach
                                            </tbody>
                                          </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                    
                        <div class="card" style="background-color: rgba(245, 245, 245, 0.7);">
                          <div class="card-header" style="text-align: center">
                          <h3 class="box-title bg-primary"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Movimientos</h3>
                          </div>
                          <div class="card-body">
                            <table  class="table table-striped">
                                            <thead>
                                              <tr>
                                                
                                                <th>Tipo</th>
                                                <th>Monto</th>
                                                <th>Impuesto</th>
                                                <th>Cuenta</th>
                                                <th>Categorias</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                                  @foreach ($account as $accounts)
                                                  <tr>
                                                    
                                                    @if($accounts->type=="add")
                                                    <td>Ingreso</td>
                                                    @else
                                                    <td>Salida</td>
                                                    @endif 
                                                    
                                                      <td>{{ number_format($accounts->amount, 2, ',', '.') }} {{$divisa->value}}</td>
                                                      <td>{{ $accounts->tax }}</td>
                                                      <td>{{ $accounts->name_account }}</td>
                                                      <td>{{ $accounts->name_categories }}</td>
                                                      <td>
                                                    
                                                      </td>
                                                  </tr>  
                                                  @endforeach
                                            </tbody>
                                          </table>
                          </div>
                        
                        </div>
                    
                
                      </div>
                    </div>
                
            </div>
            <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
          </div>

        </div>

         <!--fin nuevo contenido-->
    @stop

    
    @section('css')
       
    @stop
    
    @section('js')
    <script src="/js/custom.js"></script>
    <script src="/js/Chart.js"></script>
    <script src="/js/Chart.min.js"></script>
    
      <script>

        $(document).ready(function() {
          $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
                
            });
            });

        
      </script>
      
    @stop

    
    
    
    
    

    
