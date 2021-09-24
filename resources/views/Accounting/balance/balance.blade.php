@extends('adminlte::page')

    @section('title', 'Balance')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
    @inject('provider', 'App\Http\Controllers\balanceController')
    <!-- Breadcrumbs-->
 
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Balance</li>
          </ol>

        


        <!-- DataTables Example -->
        <div class="card mb-3">
                <?php
                    if(count($timeline)>=12){
                        $valorletra = '10px';
                    } else {
                        $valorletra = '12px';
                    }
                ?>
                
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
                <i class="fas fa-globe"></i>&nbsp&nbsp
              BALANCE GLOBAL
              <span style="float: right">
                <a title="Imprimir registros de tabla" href="/provider2" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
            </span>
            </div>
            <div class="card-body">
                <form action="/balance/balance" method = "get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-8 col-form-label text-md-right">{{ __('Categorias') }}</label>
                                <div class="col-md-9">
                                <div class="form-group">
                                    <select class="form-control"  type="text" name="categoria" >
                                        <option value="">Categorias</option>
                                        @foreach ($categories as $datas)
                                            <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-8 col-form-label text-md-right">{{ __('Fecha Inicial') }}</label>
                                <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" name="start"   placeholder="Fecha Inicio" class="form-control">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-8 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
                                <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" name="finish" placeholder="Fecha Final"  class="form-control">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-8 col-form-label text-md-right">{{ __('Tipo Trans.') }}</label>
                                <div class="col-md-9">
                                <div class="form-group">
                                    <select class="form-control"  type="text" name="tipo" >
                                        <option selected value="out">Retiros</option>
                                        <option value="add">Ingresos</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-6 col-form-label text-md-right">{{ __('Anual') }}</label>
                                <div class="col-md-9">
                                <div class="form-group">
                                    <select class="form-control"  type="text" name="year" >
                                        <option selected value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option  value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group row">
                                <label for="estado" class="col-md-5 col-form-label text-md-right">{{ __('Filtrar') }}</label>
                                <div class="col-md-8">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm  btn-default form-control "><i class="fa fa-filter"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
              <div class="table-responsive">
                <table class="table table-striped" style="font-size: <?php echo  $valorletra ?>" id="datatable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center">
                            @if($tipom=="add")
                                <i class="fas fa-arrow-up bg-success"></i>
                            @elseif($tipom=="out")
                                <i class="fas fa-arrow-down bg-danger"></i>
                            @endif
                                @if($cateselet)
                                   &nbsp; {{$cateselet->name}}
                                    @else
                                    &nbsp; Categorias
                                @endif
                            </th>
                            @foreach ($timeline as $t=> $valor)
                                <th>{{$t}}</th>
                            @endforeach
                            @if($tipom=="add")
                                <th style="text-align:center;background-color: green;">Total</th>
                            @elseif($tipom=="out")
                                <th style="text-align:center;background-color: red;">Total</th>
                            @endif
                            
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($subcategorias as $ss)
                                <tr>
                                    <td style="text-align: center">
                                        {{$ss->name}}
                                    </td>

                                    {{--solo si tiene categoria--}}
                                    @if( $filter )
                                        @foreach ($timeline as $t=> $valor)
                                            @if( $valor )
                                                <td>
                                                    <?php $sum = 0; ?>
                                                    @foreach ($valor as  $datos)
                                                        @if($datos->amount)
                                                            @if($datos->id_attr ==  $ss->id)
                                                             <?php $sum += $datos->amount;
                                                             ?>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <?php echo number_format($sum, 2, '.', ',');?>
                                                </td>
                                            @else
                                                <td>
                                                   0
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if(!$filter )
                                        @foreach ($timeline as $t=> $valor)
                                            @if( $valor )
                                                <td>
                                                    <?php $sum = 0; ?>
                                                    @foreach ($valor as  $datos)

                                                        @if($datos->amount)
                                                                {{--{{$datos->amount}}--}}
                                                                {{--{{$datos->categories_id}}--}}
                                                            @if($datos->categories_id ==  $ss->id)
                                                                <?php $sum += $datos->amount;
                                                                ?>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <?php echo number_format($sum, 2, '.', ',');?>
                                                </td>
                                            @else
                                                <td>
                                                    0
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif




                                        <td style="background-color: #c6e0ec; color: #111;">
                                            @if($filter )
                                                <?php $sum = 0; ?>
                                                @foreach ($timeline as $t=> $valor)
                                                    @if( $valor )
                                                        @foreach ($valor as  $datos)
                                                            @if($datos->amount)
                                                                @if($datos->id_attr ==  $ss->id)
                                                                    <?php $sum += $datos->amount;
                                                                    ?>
                                                                @endif
                                                            @endif

                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?php echo number_format($sum, 2, '.', ',');?>
                                            @endif



                                            @if(!$filter )
                                            <?php $sum = 0; ?>
                                            @foreach ($timeline as $t=> $valor)
                                                @if( $valor )

                                                    @foreach ($valor as  $datos)

                                                            @if($datos->categories_id ==  $ss->id)
                                                                <?php $sum += $datos->amount;
                                                                ?>
                                                            @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                             <?php echo number_format($sum, 2, '.', ',');?>
                                            @endif
                                            {{--@foreach ($timeline as  $valor)--}}
                                                {{--{{$valor->id}}--}}
                                            {{--@endforeach--}}
                                        </td>
                                </tr>

                            @endforeach
                            @if($timeline)
                                <tr style="background-color: #c6e0ec; color: #111">
                                    <td style="background-color: #a2c5d5;"></td>
                                    <?php $totall = 0; ?>
                                    @foreach ($timeline as $t=> $valor)
                                        @if( $valor )
                                            <td>
                                                <?php $sum = 0; ?>
                                                @foreach ($valor as  $datos)
                                                    @if($datos->amount)
                                                        @if($datos->numberOf ==  $t)
                                                            <?php
                                                                $sum += $datos->amount;
                                                                $totall += $datos->amount;
                                                            ?>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <?php echo number_format($sum, 2, '.', ',') ;?>
                                            </td>
                                        @else
                                            <td>
                                            0
                                            </td>
                                        @endif
                                    @endforeach
                                    <td>  <?php echo  number_format($totall, 2, '.', ',')  ?></td>
                                </tr>
                            @endif
                        </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
          </div>

        
    @stop

    
@section('css')
    
   
@stop
    
@section('js')
   
    <script src="/js/custom.js"></script>
    <script>

      $(document).ready(function() {
        $('.js-example-theme-single').select2({theme:"classic"});
          $('#datatable').DataTable({
            "aaSorting": []
          });
          //modal
          

          });
  </script>
@stop
    





