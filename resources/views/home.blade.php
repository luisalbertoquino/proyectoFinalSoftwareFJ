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
            <li class="breadcrumb-item active">Resultados Generales de ventas (RESUMEN)</li>
          </ol>

          
          
          <div class="row">
            <!--mas vendido-->
            <div class="info-box col-md-3 col-sm-6 col-xs-12" style="background-color: rgba(245, 245, 245, 0.7);">
              <span class="info-box-icon bg-success">
                  <button class="btn" href="#" data-toggle="modal" data-target="#masVendido" >
                    <i class="fas fa-trophy " style="color:#ffff"></i>
                </button>
              </span>
              <div class="info-box-content">
                <button class="btn" href="#" data-toggle="modal" data-target="#masVendido" >
                  Producto mas Vendido 
                </button>
              </div>
            </div>
            <!--Menos vendido-->
            <div class="info-box col-md-3 col-sm-6 col-xs-12" style="background-color: rgba(245, 245, 245, 0.7);">
              <span class="info-box-icon bg-danger">
                <button class="btn" href="#" data-toggle="modal" data-target="#menosVendido">
                  <i class="fas fa-tags" style="color:#ffff"></i>
                </button>
              </span>
              <div class="info-box-content">
                <button class="btn" href="#" data-toggle="modal" data-target="#menosVendido">
                  Producto menos Vendido
                </button>
              </div>
            </div>
            <!--Total ventas-->
            <div class="info-box col-md-3 col-sm-6 col-xs-12" style="background-color: rgba(245, 245, 245, 0.7);">
              <span class="info-box-icon bg-primary">
                <button class="btn" href="#" data-toggle="modal" data-target="#totalVentas">
                  <i class="fas fa-thumbs-up" style="color:#ffff"></i>
                </button>
              </span>
              <div class="info-box-content">
                <button class="btn " href="#" data-toggle="modal" data-target="#totalVentas">
                  Total ventas realizadas
                </button>
              </div>
            </div>
            <!--Proveedores-->
            <div class="info-box col-md-3 col-sm-6 col-xs-12" style="background-color: rgba(245, 245, 245, 0.7);">
              <span class="info-box-icon bg-info">
                <button class="btn" href="#" data-toggle="modal" data-target="#totalVentas">
                  <i class="fas fa-chart-pie " style="color:#ffff"></i>
                </button>
              </span>
              <div class="info-box-content">
                <button class="btn " href="#" data-toggle="modal" data-target="#totalProveedores">
                  Total Proveedores Asociados
                </button>
              </div>
            </div>
          </div>
        


      <!-- Modal mas vendido-->
      <div class="modal fade" id="masVendido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Productos mas vendidos</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                  <span aria-hidden="true">×</span>
              </button>
              </div>
              <div class="modal-body">
                <dl>
                  <dt style="text-align: center;">Producto mas vendido por Unidad:</dt>
                    <dd>1. Leche en bolsa Parmalat: 100 Unidades</dd>
                    <dd>2. Leche en bolsa Parmalat: 100 Unidades</dd>
                    <dd>3. Leche en bolsa Parmalat: 100 Unidades</dd><br>
                  <dt style="text-align: center;">Producto mas vendido por Peso:</dt>
                    <dd>1. Arroba: Arroz Roa</dd>
                    <dd>2. Kilo: Azucar Morena Ras</dd>
                    <dd>3. Libra: Harina Harcorf</dd> <br>
                  <dt style="text-align: center;">Producto mas vendido por Categoria:</dt>
                    <dd>1. Lacteos: Leche en bolsa parmalat</dd>
                    <dd>1. Verduras: Cebolla importada Verdo</dd>
                    <dd>1. Granos: Arroz roa por kilo</dd> <br>
                </dl>
              </div>
              
          </div>
        </div>
      </div>


      <!-- Modal menos vendido-->
      <div class="modal fade" id="menosVendido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Productos menos vendidos</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                    <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <dl>
                  <dt style="text-align: center;">Producto menos vendido por Unidad:</dt>
                    <dd>1. Leche en bolsa Parmalat: 100 Unidades</dd>
                    <dd>2. Leche en bolsa Parmalat: 100 Unidades</dd>
                    <dd>3. Leche en bolsa Parmalat: 100 Unidades</dd><br>
                  <dt style="text-align: center;">Producto menos vendido por Peso:</dt>
                    <dd>1. Arroba: Arroz Roa</dd>
                    <dd>2. Kilo: Azucar Morena Ras</dd>
                    <dd>3. Libra: Harina Harcorf</dd> <br>
                  <dt style="text-align: center;">Producto menos vendido por Categoria:</dt>
                    <dd>1. Lacteos: Leche en bolsa parmalat</dd>
                    <dd>1. Verduras: Cebolla importada Verdo</dd>
                    <dd>1. Granos: Arroz roa por kilo</dd> <br>
                </dl>
              </div>
              
          </div>
        </div>
      </div>


      <!-- Modal total ventas-->
      <div class="modal fade" id="totalVentas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Total ventas Realizadas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                    <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <dl>
                  <dt style="text-align: center;">Ventas Semanales:</dt>
                    <dd>1. Total ventas: 4</dd>
                    <dd>2. Total Devoluciones: 4</dd>
                    <dd>3. Total Ganancia: 4</dd><br>
                  <dt style="text-align: center;">Ventas Mensuales:</dt>
                    <dd>1. Total ventas: 4</dd>
                    <dd>2. Total Devoluciones: 4</dd>
                    <dd>3. Total Ganancia: 4</dd><br>
                  <dt style="text-align: center;">Ventas Semestales:</dt>
                    <dd>1. Total ventas: 4</dd>
                    <dd>2. Total Devoluciones: 4</dd>
                    <dd>3. Total Ganancia: 4</dd><br>
                </dl>
              </div>
            
          </div>
        </div>
      </div>

      <!-- Modal total proveedores-->
      <div class="modal fade" id="totalProveedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            @if($proveedorC != 0)
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Total Proveedores Afiliados</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                      <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <dl>
                    <dt style="text-align: center;">Total proveedores : {{$proveedorC}}</dt>
                    @php
                        $contador=1;
                    @endphp
                    @foreach ($proveedor as $proveedor1)
                      <dd>{{$contador}}. {{$proveedor1->razonSocial}}</dd>
                      @php
                          $contador=$contador+1;
                      @endphp
                    @endforeach

                      
                    
                  </dl>
                </div>  
            @else
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Total Proveedores Afiliados</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                      <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <dl>
                    <dt style="text-align: center;">Total proveedores : 0</dt>
                    @php
                        $contador=1;
                    @endphp
      
                      <dd>{{$contador}}. No hay proveedores registrados</dd>
                      <dd>(Registra un nuevo proveedor)</dd>
                  </dl>
                </div> 
            @endif
          </div>
        </div>
      </div>

        
    @stop

    
    @section('css')
        
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

    
    
    
    
    

    
