@extends('adminlte::page')

    @section('title', 'Reporte Ventas General')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">Informes</li>
          <li class="breadcrumb-item active">Informe compras</li>
        </ol>

        <!-- DataTables Example --> 
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-calendar"></i>
            REPORTE DE COMPRAS:<br> Seleccione la fecha inicial, fecha final y si desea filtrar por proveedor
            <span style="float: left">
              <a id="btnObtenerValores" class="btn btn-danger" onclick="generarReporte()"><i class="fas fa-file-pdf"></i></a>
          </span>
          </div>
          <div class="card-body">
            <div class="row">
              <!--filtrar por fecha inicial-->
              <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-md-8">
                        <input id="min" name="min" class="form-control" type="text" placeholder="Fecha Inicial..." readonly="true" />
                    </div>
                    <div class="col-md-4">
                      <button type="reset" class="reset btn btn-info form-control" onclick="limpiar()"><i class="fas fa-calendar-plus"></i></button>
                    </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-md-8">
                        <input id="max" name="max" class="form-control" type="text" placeholder="Fecha Final..." readonly="true" />
                    </div>
                    <div class="col-md-4">
                      <button type="reset" class="reset btn btn-warning form-control" onclick="limpiar()"><i class="fas fa-calendar-plus" style="color:#ffff"></i></button>
                    </div>
                </div>
              </div>

              <div class="col-md-4">
                <!--filtrar por cliente-->
                <div class="form-group row">
                  <div class="col-md-8">
                      <select class="js-example-basic-single form-control "  data-live-search="true" name="id_client_fk" id="id_client_fk" required="true">
                        <option value="" disabled selected>Buscar por Proveedor</option>
                        <option id="option" value="No exist">No exist</option>
                        @foreach ($proveedor as $proveedor)
                            @if ($proveedor->estado==1){
                            <option id="option" value="{{$proveedor->numeroDocumento}}-{{$proveedor->razonSocial}}" >{{$proveedor->numeroDocumento}}-{{$proveedor->razonSocial}}</option>
                            }
                          @endif
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-4">
                    <button type="reset" class="reset form-control btn btn-primary" id="clienteSearch"
                        onclick="buscarCliente()"><i class="fas fa-search"></i>
                      </button>
                  </div>
                </div>
              </div>
            </div>
            <br>

            
            <div class="table-responsive">
              <table class="table table-bordered" id="datatable" name="datatable" width="100%" cellspacing="0">
                
                 
                <thead class="thead-dark">
                  <br>
                  <tr>
                    <th style="text-align: center;">Serie Comprobante</th>
                    <th style="text-align: center;">Numero Comprobante</th>
                    <th style="text-align: center;">Total descontado</th>
                    <th style="text-align: center;">Subtotal</th>
                    <th style="text-align: center;">Iva</th>
                    <th style="text-align: center;">Total</th>
                    <th style="text-align: center;">Cliente</th>
                    <th style="text-align: center;">Fecha Emisión</th>
                
                  </tr>
                </thead>

                <tbody>
                  @php
                      $acum= null;
                  @endphp
                  @foreach ($compra as $compra)
                  @if($acum != $compra->serieComprobante)
                  <tr>
                    <td style="width:40px;text-align: center;">{{$compra->serieComprobante}}</td>
                    <td style="width:40px;text-align: center;">{{$compra->numeroComprobante}}</td>
                    <td style="width:80px;text-align: center;">{{$compra->totalDescontado}}</td>
                    <td style="width:60px;text-align: center;">{{$compra->subtotal}}.00$</td>
                    <td style="width:60px;text-align: center;">{{$compra->ivaAcum}}.00$</td>
                    <td style="width:60px;text-align: center;">{{$compra->total}}.00$</td>
                    <td style="width:80px;text-align: center;">
                        @if ($compra->proveedor['estado']==1)
                      {{$compra->proveedor['numeroDocumento']}}-{{$compra->proveedor['razonSocial']}}
                      @else
                      No exist
                      @endif
                    </td> 
                    <td style="width:60px;text-align: center;">{{$compra->fechaEmision}}</td>
                  </tr>
                  @php
                      $acum=$compra->serieComprobante;
                  @endphp
                  @endif
                  @endforeach
                </tbody>
              </table>
              {{ csrf_field()}}
            </div>
          </div>
          <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
        </div>
    @stop
    
    @section('css')
        
    @stop
    
    @section('js')
    
    <script>
      //primera parte
      var minDate, maxDate;

              // Custom filtering function which will search data in column four between two values
              $.fn.dataTable.ext.search.push(
                  function( settings, data, dataIndex ) {
                      var min = minDate.val();
                      var max = maxDate.val();
                      var date = new Date( data[7] )
                      
              
                      if (
                          ( min === null && max === null ) ||
                          ( min === null && date <= max ) ||
                          ( min <= date   && max === null ) ||
                          ( min <= date   && date <= max )
                      ) {
                          return true;
                      }
                      return false;
                  }
              );
      //fin primera parte
     

        $(document).ready(function(){
          $('.js-example-theme-single').select2({theme:"classic"});

          // Create date inputs
          minDate = new DateTime($('#min'), {
                      format: 'MMMM Do YYYY'
                  });
                  maxDate = new DateTime($('#max'), {
                      format: 'MMMM Do YYYY'
                  });
              
                  // DataTables initialisation
                  var table = $('#datatable').DataTable();
  
              
                  // Refilter the table
                  $('#min, #max').on('change', function () {
                      table.draw();
                     
                  });
          });


          
      //segunda parte        

         
      //fin segunda parte          
                

      function limpiar() {
        location.reload();
      }
      function buscarCliente() {

          $(function () {
            $("#option").change(function(){
                  alert($('select[id=option]').val());
                  $('#option').val($(this).val());
          });

            /* Para obtener el valor */
            var cliente =document.getElementById("id_client_fk");
            var clienteO= cliente.value;
            theTable = $("#datatable");
            $.uiTableFilter($('#datatable'), clienteO, ['Cliente']);
            
          });

          }
          
      
    </script>
    <script>
      function generarReporte() {
                    var doc = new jsPDF('p', 'mm', 'a3');

                    //indico las columnas qu ellevara la tabla
                    var columns = ["Serie Comprobante", "Numero Comprobante", "Usuario a cargo", "Subtotal", "Iva", "Total", "Cliente", "Fecha Emisión"];

                    //Preparo las variables que contendra la tabla
                    var rowIndex = 0;
                    var table = document.getElementById('datatable');
                    var row = table.getElementsByTagName('tr')[rowIndex];
                    var cells = row.getElementsByTagName('td');
                    let data = [];

                    //agrego los datos pertinentes al array que llevara la tabla
                    var cont = document.getElementById("datatable").rows.length;


                    //capturo la fecha actual y la pongo en español
                    var f = new Date();
                    //mes
                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                    //imagen de prueba
                    var img = new Image();

                    var fechaActual = new Date;
                    img.onload = function () {

                      //proceso de escritura en el documento
                      doc.setFontSize(10);
                      doc.text(50, 20, f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + "                                                                               Informe de ventas No. " + fechaActual.getTime());
                      //doc.addImage(img, 'JPEG', 20, 30, 1920, 1357);
                      doc.text(50, 60, "El presente informe es para dar a conocer las compras realizadas en en los parametros dados");
                      doc.text(50, 70, " A continuacion se listaran los detalles y su tiempo");
                      doc.text(50, 80, "restante:");

                      espacioLinea = 90


                      //codigo para la tabla en el pdf
                      for (var i = 1; i < cont; i++) {

                        var id, cliente, fechaInicio, fechaFinal, descripcion, precio, estado, dias_restantes, nueva_venta;
                        id = table.rows[i].cells[0].innerHTML;
                        cliente = table.rows[i].cells[1].innerHTML;
                        fechaInicio = table.rows[i].cells[2].innerHTML;
                        fechaFinal = table.rows[i].cells[3].innerHTML;
                        descripcion = table.rows[i].cells[4].innerHTML;
                        precio = table.rows[i].cells[5].innerHTML;
                        resta = table.rows[i].cells[6].innerHTML;
                        nueva_venta=table.rows[i].cells[7].innerHTML;
                        

                        var dataComp =
                          [id, cliente, fechaInicio, fechaFinal, descripcion, precio, resta,nueva_venta];
                        data.push(dataComp);

                      }
                      //añadir tabla al pdf
                      doc.autoTable(columns, data,
                        { margin: { top: 90 } }
                      );

                      doc.save('Products Never Purchased.pdf');
                    };
                    img.src = "/img/basic.png";
                    img.crossOrigin = "";
                  };
    </script>
    
    
    @stop
    
