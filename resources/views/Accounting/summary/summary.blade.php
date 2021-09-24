@extends('adminlte::page')

@section('title', 'Resumen Contable')
    
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

          <?php
                if (isset($_GET['dias'])) {

                    $dias = $_GET["dias"];
                    $startf = "";
                    if ($dias == 30) {
                        $startf = date('Y-m-d', strtotime('today - 30 days'));
                    }
                    if ($startf == 15) {
                        $startf = date('Y-m-d', strtotime('today - 15 days'));
                    }
                    if ($dias == 7) {
                        $startf = date('Y-m-d', strtotime('today - 7 days'));
                    }
                    if ($dias == 1) {
                        $startf = date('Y-m-d', strtotime('today'));
                    }

                    $finishf = $startf = date('Y-m-d', strtotime('today'));
                } else {
                    $finishf = '';
                    $startf = '';
                }

                if (isset($_GET['start'])) {
                    $startf = $_GET["start"];
                } else {
                    $startf = "";
                }

                if (isset($_GET['finish'])) {
                    $finishf = $_GET["finish"];
                } else {
                    $finishf = '';
                }

                if (isset($_GET['dias'])) {
                    $diasf = $_GET["dias"];
                } else {
                    $diasf = '';
                }

                if (isset($_GET["tipo"])) {
                    $tipof = $_GET["tipo"];
                } else {
                    $tipof = "";
                }
                if (isset($_GET["cuentas"])) {
                    $cuentasf = $_GET["cuentas"];
                } else {
                    $cuentasf = "";
                }
                if (isset($_GET["tipo"])) {
                    $tipof = $_GET["tipo"];
                } else {
                    $tipof = "";
                }

                if (isset($_GET["categoria"])) {
                    $categoriaf = $_GET["categoria"];
                } else {
                    $categoriaf = "";
                }

                if (isset($_GET['id_attr'])) {
                    $id_attrf = $_GET["id_attr"];
                } else {
                    $id_attrf = '';
                }



                if (isset($_GET['tf'])) {
                    $id_tf = $_GET["tf"];
                } else {
                    $id_tf = '';
                }
                if (isset($_GET['id_attr_tours'])) {
                    $id_attr_tours = $_GET["id_attr_tours"];
                } else {
                    $id_attr_tours = '';
                }

                $url = "?start=" . $startf . "&finish=" . $finishf . "&dias=" . $diasf . "&tipo=" . $tipof . "&cuentas=" . $cuentasf . "&categoria=" . $categoriaf . "&id_attr=" . $id_attrf . "&id_attr_tours=" . $id_attr_tours . "&tf=" . $id_tf . "";

    ?>

            <div class="card mb-3">
                <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
                    <i class="fas fa-funnel-dollar"></i>&nbsp&nbsp
                REGISTRO DE MOVIMIENTOS
                
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    
                        <!--el par de tablas-->
                            <div class="card" style="background-color: rgba(245, 245, 245, 0.7);">
                            <div class="card-header" style="text-align: center">
                                    <!--los filtros-->
                                    <form action="/summary/summary" method="get">
                                            <div class="row">
                                                <!--primero por fechas-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicial') }}</label>
                                                        <div class="col-md-6">
                                                            <input type="date" name="start"   placeholder="Fecha Inicio" class="form-control">
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
                                                        <div class="col-md-6">
                                                            <input type="date" name="finish"  placeholder="Fecha Final"  class="form-control">
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por dias') }}</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control js-example-basic-single" type="text" name="dias">
                                                                <option value="">--Seleccione--</option>
                                                                <option value="30">Ultimo mes</option>
                                                                <option value="15">Ultimos 15 dias</option>
                                                                <option value="7">Ultimos 7 dias</option>
                                                                <option value="1">Hoy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por Categorias') }}</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control js-example-basic-single" name="categoria" id="categorie_select">
                                                                <option value="">Categorias</option>
                                                                @foreach ($data2 as $datas2)
                                                                    @if($datas2->name!="transferencia")
                                                                        <option class="attr-{{$datas2->type}}"
                                                                                value="{{ $datas2->id }}">
                                                                            {{ $datas2->name }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('R. Nuevo Movimiento') }}</label>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-success form-control" style="float: center;" href="/summary/create"><i class="fas fa-hand-holding-usd"></i></a>
                                                        </div>
                                                    </div>
                        
                                                    
                                                
                                                </div>
                                                <!--segundo  por aspectos-->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por movimiento') }}</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control js-example-basic-single" type="text" name="tipo">
                                                                <option value="">Tipo de movimiento</option>
                                                                <option value="1">Transferencia</option>
                                                                <option value="add">Abonos</option>
                                                                <option value="out">Retiros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por cuentas') }}</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control js-example-basic-single" type="text" name="cuentas">
                                                                <option value="">Cuentas</option>
                                                                @foreach ($data as $datas)
                                                                    <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="idDocumento" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar por productos') }}</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control js-example-basic-single" name="tf" id="tours_select">
                                                                <option value="">Productos</option>
                                                                @foreach ($tours as $tour)
                                                                    <option class="attr-{{$tour->valorVenta}}" value="{{$tour->id }}">
                                                                        {{ $tour->nombreProducto }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                        
                                                    <div class="form-group row">
                                                        <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Filtrar') }}</label>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-sm  btn-success form-control "><i class="fas fa-funnel-dollar"></i></button>
                                                        </div>
                                                    </div>
                        
                                                    
                                                    
                                            
                                                    
                                                </div>
                                                
                                                <div id="modal1" class="modal">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" id="closemodal1" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                                <h4 class="modal-title">Fecha De Tours</h4>
                                                            </div>
                                                            <div class="modal-body" id="res_ajax1">
                        
                                                            </div>
                                                            </br>
                                                            <div class="modal-footer">
                                                                <button style=" margin: 15px;" type="button"
                                                                        id="closemodal2" class="btn btn-default"
                                                                        data-dismiss="modal">Ok
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                        
                                                <div id="modal" class="modal">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" id="closemodal" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                                <h4 class="modal-title">Subcategorias</h4>
                                                            </div>
                                                            <div class="modal-body" id="res_ajax">
                                                            </div>
                                                            </br>
                                                            <div class="modal-footer">
                                                                <button style=" margin: 15px;" type="button"
                                                                        id="closemodal3" class="btn btn-default"
                                                                        data-dismiss="modal">Ok
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                    </form>
                            
                            </div>
                            <div class="card-body">
                                <table  class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
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
                                                    <?php  $datef = date_create($summarys->created_at);
                                                    $fecha = date_format($datef, 'd-m-Y ');
                                                    ?>
                                                @endif
                                                <td>{{ $fecha }}</td>
                                                @if($summarys->type=="add")
                                                    <td>Abono
                                                        <small class="label pull-right bg-success">
                                                            @if($summarys->id_transfer!="")
                                                                <i class="fas fa-exchange-alt"></i>
                                                            @else
                                                                <i class="fas fa-arrow-up"></i>
                                                            @endif
                                                        </small>
                                                    </td>
                                                @elseif($summarys->type=="out")
                                                    <td>Retiro
                                                        <small class="label pull-right bg-red">
                                                            @if($summarys->id_transfer!="")
                                                                <i class="fas fa-exchange-alt"></i>
                                                            @else
                                                                <i class="fas fa-arrow-down"></i>
                                                            @endif
                                                        </small>
                                                    </td>
                                                @endif
                                                <td>{{ number_format($summarys->amount, 2, '.', ',') }} {{$divisa->value}}</td>
                                                <td>{{ number_format( $summarys->tax, 2, '.', ',') }}</td>
                                                <td>{{ $summarys->concept }}</td>
                                                <td>{{ $summarys->name_account }}</td>
                                                <td>{{ $summarys->name_categories }}</td>
                                                <td>
                                                    @if($summarys->id_transfer!="")
                                                        <?php $elimina = "eliminart";
                                                        $id = $summarys->id_transfer;
                                                        ?>
                                                    @else
                                                        <?php $elimina = "eliminar";
                                                        $id = $summarys->id;
                                                        ?>
                                                    @endif 
                                                    <form role="form"
                                                        action="/summary/<?php echo $elimina ?>/<?php echo $id ?>"
                                                        method="post" enctype="multipart/form-data">
                                                        {{method_field('DELETE')}}
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-sm btn-warning"
                                                        href="/detalle/detalle/{{ $summarys->id }}"><i
                                                                    class="fa fa fa-eye"></i></a>
                                                        @if($summarys->attached)
                                                            <a class="btn btn-sm btn-info"
                                                            target="_blank"
                                                            href="/download/{{$summarys->attached->id}}"><i
                                                                        class="fa fa-paperclip"></i></a>
                                                        @endif

                                                        @if($summarys->id_transfer!="")
                                                            <a class="btn btn-sm btn-primary"
                                                            href="/transfer/edit/{{ $summarys->id_transfer }}"><i
                                                                        class="fa fa-edit"></i></a>
                                                        @else
                                                            <a class="btn btn-sm btn-primary"
                                                            href="/summary/edit/{{ $summarys->id }}"><i
                                                                        class="fa fa-edit"></i></a>
                                                        @endif

                                                        <button onclick='if(confirmDel() == false){return false;}'
                                                                class="btn btn-sm btn-danger"
                                                                type="submit"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>

                                            
                            </div>
                            
                            </div>
                        
                    
                        
                        <!--card de informacion-->
                        <div class="row">
                            
                                    <div class="col-md-6 ">
                                        <div class="small-box box">
                                            <div class="inner">
                                                <h1> {{ number_format($totalfinal, 2, '.', ',') }}</h1>
                            
                                                <p>{{$divisa->value}}</p>
                                            </div>
                                            <div class="icon ">
                                                <i class="fas fa-dollar-sign bg-success"></i>
                                            </div>
                                            <label class="small-box-footer bg-success text-white">
                                                Balance Actual
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="info-box ">
                                            <span class="info-box-icon"><i class="fas fa-credit-card"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Balance de Impuestos</span>
                                                <span class="info-box-number"
                                                    style="color: darkgreen;">+ {{ number_format($totalfinaliva, 2, '.', ',') }}</span>
                            
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0%">
                            
                                                    </div>
                                                </div>
                                                <span class="progress-description">No deducibles:
                                                        <span style="color: red;"> {{ number_format($totalfinalivae, 2, '.', ',') }}</span>
                                                    </span>
                                            </div>
                                        </div>
                                        <a target="_blank" href="/pdf<?php echo $url . "&tax"  ?>" class="btn btn-block btn-social btn-google">
                                            <i class="fas fa-file-pdf"></i> Reporte Detallado
                                        </a>
                                        <a target="_blank" href="/pdf<?php echo $url  ?>" class="btn btn-block btn-social btn-google">
                                            <i class="fas fa-file-pdf"></i> Reporte Sin tax
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
          $('.js-example-basic-single').select2();
        $('.js-example-theme-single').select2({theme:"classic"});
          $('#dataTable').DataTable({
              
          });
          //modal
          

          });
  </script>
@stop
    


