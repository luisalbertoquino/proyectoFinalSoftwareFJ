@extends('adminlte::page')

    @section('title', 'Nueva Venta')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <form method="POST" action="/sale">
        @csrf

        <!-- Hipervinculos-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="/sale">Ventas</a>
            </li>
            <li class="breadcrumb-item active">Nueva Venta</li>
        </ol>
        <!--Para la fecha-->
        <?php
        $fecha = date('Y-m-d');
        $acum = 0;
        $pinaculo=0;
        foreach ($venta as $venta) {
           $pinaculo=$venta->numeroVenta;
        }
        if ($pinaculo ==0) {
        $acum = $acum+1;
        } else {
        $acum = $venta->numeroVenta + 1;
        }
        ?>
        <!--Primer div para laseleccion de productos-->
        <div class="card card-login2 mx-auto mt-2" style="border:1px solid #666">
            <!--Cabecera de la card-->
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
                <span style="float:center">
                    <label for="">REGISTRAR NUEVA VENTA&nbsp&nbsp <i class="fa fa-shopping-bag" aria-hidden="true" style="color: #34495E"></i><br></label>
                </span>
                
                <!--Fecha-->
            <span style="float: right">
                <input id="fechaEmision" type="text" style="text-align: center;  border: 0;outline: none;width: 120px;background-color:#ffff" class="form-control @error('fechaEmision') is-invalid @enderror" name="fechaEmision" value="{{ $fecha }}" readonly>
            </span>
            <span style="float: left">
                <a href="/sale" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </span>
            </div>


            
            <br>
            <!--cuerpo de la card-->
            

            <!--Nuevo card body donde va la tabla del stock-->
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <!--Vendedor-->
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Vendedor') }}</label>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control @error('idUsuario') is-invalid @enderror" name="idUsuario2" autofocus="true" disabled value="{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}">
                                <input type="text" id="idUsuario" name="idUsuario" value="{{ auth()->id() }}" hidden>
                              </div>
                            </div>
                          </div>
                          
                        <!--Seleccion de cliente-->
                          <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                            <div class="col-md-6">
                              <div class="form-group">
                                <select class="js-example-theme-single form-control @error('idCliente') is-invalid @enderror" data-live-search="true" id="idCliente" name="idCliente" style="width: 150px" onchange="fock.call(this, event)">
                                    <option value="" class="form-control" disabled selected>Buscar Cliente</option>
                                    <option value="0">Sin Registro</option>
                                    @foreach ($cliente as $cliente)
                                        <option onselect="asignarCliente('{{ $cliente->nombre }}','{{ $cliente->numeroDocumento }}')"
                                            value={{ $cliente->id }} {{ old('idCliente') ==  $cliente->id  ? 'selected' : '' }}>{{ $cliente->numeroDocumento }}-{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                <!--Boton para crear un nuevo cliente-->
                                <span style="float:right">
                                    <a class="btn btn-primary" href="/client/create2"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                </span>
                              </div>
                            </div>
                          </div>
                    </div>
                    
                        
                    <div class="col-6">
                        <!--serial venta-->
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Serial Venta') }}</label>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input id="serialVenta" type="number" class="form-control @error('serialVenta') is-invalid @enderror"  style="text-align: center" name="serialVenta" readonly value="{{ $tiempo = time() }}">
                              </div>
                            </div>
                          </div>
                        <!--numero venta-->
                          <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Venta N°') }}</label>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input id="numeroVenta" type="text" class="form-control @error('numeroVenta') is-invalid @enderror"  style="text-align: center" name="numeroVenta" readonly="true" value="{{ $acum }}">
                              </div>
                            </div>
                          </div>
                        
                        <!--en que cuenta va a sumar o restar venta o compra-->
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Cuenta Seleccionada') }}</label>
                            <div class="col-md-6">
                              <div class="form-group">
                                <select class="js-example-theme-single form-control @error('cuenta') is-invalid @enderror" data-live-search="true" id="cuenta" name="cuenta" style="width: 150px" onchange="fock.call(this, event)">
                                    @foreach ($cuenta as $cuentas)
                                    <option value={{$cuentas->id}} {{ old('idCategoria') == $cuentas->id ? 'selected' : '' }}>{{$cuentas->name}}</option>
                                    @endforeach
                                </select>
                                <!--Boton para crear una nueva cuenta-->
                                <span style="float:right">
                                    <a class="btn btn-success" href="/account/create2"><i class="fas fa-piggy-bank"></i></a>
                                </span>
                              </div>
                            </div>
                          </div>
                        

                    </div> 
                </div>
            
                                <!--mensajes de error de la comprobacion de datos en el controller-->
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <!--producto-->
                <div class="card mb-3">
                    <label for="descripcion" class="col-md-2 col-form-label text-md-right"></label>
                    <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
                        <i class="fas fa-boxes"></i>&nbsp&nbsp
                        TABLA DE PRODUCTOS:<br> Seleccione el producto, la cantidad a vender y las operaciones correspondientes</div><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th title="NOMBRE DE PRODUCTO" style="text-align: center"><i class="fas fa-box"></i></th>
                                        <th title="CANTIDAD DISPONIBLE" style="text-align: center"><i class="fas fa-boxes"></i></th>
                                        <th title="VALOR VENTA" style="text-align: center"><i class="fas fa-dollar-sign"></i></th>
                                        <th title="AÑADIR IVA" style="text-align: center">IVA</th>
                                        <th title="CATEGORIA DE PRODUCTO" style="text-align: center"><i class="fas fa-truck-loading"></i></th>
                                        <th title="UNIDAD" style="text-align: center"><i class="fas fa-weight"></i></th>
                                        <th title="CANTIDAD" style="text-align: center"><i class="fa fa-shopping-basket" aria-hidden="true"></i></th>
                                        <th title="DESCUENTO" style="text-align: center"><i class="fa fa-tag" aria-hidden="true"></i><i class="fa fa-percent" aria-hidden="true"></i></th>
                                        <th title="AÑADIR A LA LISTA" style="text-align: center"><i class="fas fa-cart-plus"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($producto as $producto)
                                @if($producto->estado==1)
                                    <tr>
                                        <!--nombre producto-->
                                        <td style="width:30px;" id="producto{{ $producto->id }}">{{ $producto->nombreProducto }}</td>
                                        <!--stock-->
                                        @if ($producto->stock > 0)
                                        <td style="text-align: center;align-items: center">
                                            <input for="" id="stock1{{ $producto->id }}" readonly  value="{{ $producto->stock }}" style="text-align: center;border:0;width:50px;outline: none;background-color: #dfe;">
                                        </td>
                                        @else
                                        <td style="text-align: center;align-items: center"> 
                                            <input for="" id="stock1{{ $producto->id }}" readonly  value="{{ $producto->stock }}" style="text-align: center;border:0;width:50px;outline: none;background-color: red;color:#ffff">     
                                        </td>
                                        @endif
                                        <!--costo-->
                                        <td style="text-align: center;align-items: center"><input for="" id="costa{{ $producto->id }}" name="costa{{ $producto->id }}" style="text-align: center;border:0;width:70px;outline: none;" readonly value="{{$producto->valorVenta }}"></td>
                                        <!--iva-->
                                        <td style="text-align: center"><input type="checkbox"  id="ivan{{ $producto->id }}" name="ivan" onchange="funcionIva({{ $producto['valorVenta'] }},{{ $producto->id }},{{$config->ivaActual}})"  style=" box-shadow: none;"> </td>
                                        <td style="width:30px;text-align: center;align-items: center">
                                            @if ($producto->category['estado'] == 1) 
                                                {{ $producto->category['categoria'] }}
                                            @else
                                                No Disponible
                                            @endif
                                        </td>
                                        <!--Unidad por tabla separada-->
                                        <!--<td style="width:80px;">
                                            <select name="unidad" id="unidad" class="form-control">
                                                <option value="" selected disabled hidden></option>
                                                <option value="">tambor de cincuenta y cinco galones (US)</option>
                                                <option value="">Lb</option>
                                                <option value="">Arr</option>
                                                <option value="">Box</option>
                                                
                                            </select>
                                        </td>
                                        -->
                                        <td style="width:30px;text-align: center" id="medida{{ $producto->id }}">
                                            @if ($producto->medida['estado'] == 1)
                                                {{ $producto->medida['descripcion'] }}
                                            @else
                                                No Disponible
                                            @endif
                                        </td>
                                        <td style="text-align: center;align-items: center">
                                            @if ($producto->stock > 0)
                                                <input style="text-align: center" id="cantidad{{ $producto->id }}" value="1" type="number" class="form-control" name="cantidadProducto" required style="width: 70px" autofocus="true" min="1" max="{{ $producto->stock }}">
                                            @else
                                                <input style="text-align: center" id="cantidad{{ $producto->id }}"  type="text" class="form-control" name="cantidadProducto" style="width: 70px" autofocus="true" placeholder="--" disabled>
                                            @endif
                                        </td>
                                        
                                        <!--descuento-->
                                        <td style="text-align: center;align-items: center">
                                            @if ($producto->stock > 0)
                                                <input style="text-align: center" type="number" id="descuento{{ $producto->id }}" name="descuento{{ $producto->id }}"  maxlength="3" class="form-control" style="width: 70px" min="0" max="100" placeholder="0" value="0">
                                            @else
                                                <input style="text-align: center" id="cantidad{{ $producto->id }}"  type="text" class="form-control" name="cantidadProducto" style="width: 70px" autofocus="true" placeholder="--" disabled>
                                            @endif
                                        </td>

                                        <td style="text-align: center">
                                            <a href="javascript:void(0)"  id="plus{{ $producto->id }}" onclick="funcion('{{ $producto['nombreProducto'] }}',{{ $producto['valorVenta'] }},{{ $producto['stock'] }},{{ $producto->id }},'{{$config->ivaActual}}','{{$config->impuestos}}');" class="btn btn-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                             <!--añadir-->
                                             @php
                                             $iva = $producto->iva;
                                             $stock = $producto->stock;
                                             $precio = $producto->valorVenta;
                                             @endphp
                                        </td>
                                    </tr>
                                    @endif 
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                   
                </div>   

            </div>

            <!--opcion vender-->
            <div class="form-group row col-md-5">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-success " >{{ __('Realizar Venta') }}
                    </button>
            </div>

     
            <!--estado-->
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-group" class="form-control">
                        <select name="estado" id="estado" hidden="true">
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div> 
            </div>
                <input type="text" id="idProducto" name="idProducto"  hidden >
                <input type="text" id="cantidadProducto" name="cantidadProducto"hidden >
                <input type="text" id="iva" name="iva"hidden >
                <input type="text" id="descuentoPorcentaje" name="descuentoPorcentaje"hidden >
                <input type="text" id="impuesto" name="impuesto" value="0"hidden >

               
                
            
        </div>
        <!--vista previa de factura************************************************************************-->
        <div class="card card-login2 mx-auto mt-2" style="border:1px solid #666;">
            <input id="fechaEmision2" type="date" class="form-control" name="fechaEmision2" value="{{ $fecha }}" readonly>
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">LISTA DE VENTA&nbsp&nbsp<i class="fa fa-list" aria-hidden="true"></i> </div>

                <div class="card-body">

                    <!--subtotal-->
                <div class="form-group row">
                    <label for="subtotal" class="col-md-5 col-form-label text-md-right">{{ __('Subtotal $') }}</label>
                    <div class="col-md-4">
                        <input id="subtotal" type="number" class="form-control @error('subtotal') is-invalid @enderror"  name="subtotal" autofocus="true" readonly>
                    </div>
                    <label  for="subtotal">.00</label>
                
                </div>
                <!--iva-->
                <div class="form-group row">    
                    <label for="ivaAcum" class="col-md-5 col-form-label text-md-right">{{ __('Iva Total $') }}</label>
                    <div class="col-md-4">
                        <input id="ivaAcum" type="number"  class="form-control @error('ivaAcum') is-invalid @enderror" name="ivaAcum" autofocus="true" readonly>
                    </div>
                    <label for="ivaAcum">.00</label>
                </div>
                <!--descuento-->
                <div class="form-group row">    
                    <label for="totalDescontado" class="col-md-5 col-form-label text-md-right">{{ __('Descuento Total $') }}</label>
                    <div class="col-md-4">
                        <input id="totalDescontado" type="number"  class="form-control @error('total') is-invalid @enderror" name="totalDescontado" autofocus="true" readonly>
                    </div>
                    <label for="totalDescontado">.00</label>
                </div>
                <!--total-->
                <div class="form-group row">    
                    <label for="total" class="col-md-5 col-form-label text-md-right">{{ __('Total $') }}</label>
                    <div class="col-md-4">
                        <input id="total" type="number"  class="form-control @error('totalDescontado') is-invalid @enderror" name="total" autofocus="true" readonly>
                    </div>
                    <label for="total" >.00</label>
                </div><br>
                <div class="table-responsive">
                    <div class="form-group" hidden>
                        <label title="nombre producto" for="" class="col-md-2 col-form-label text-md-right" style="font-weight: bold;">Producto</label>
                        <label title="cantidad producto" for="" class="col-md-2 col-form-label text-md-right" style="font-weight: bold;">Cantidad</label>
                        <label title="precio producto" for="" class="col-md-2 col-form-label text-md-right" style="font-weight: bold;">Precio c/u</label>
                        <label title="descuento asignado" for="" class="col-md-2 col-form-label text-md-right" style="font-weight: bold;">Desc&nbsp<i class="fa fa-tag" aria-hidden="true"></i><i class="fa fa-percent" aria-hidden="true"></i></label>
                        <label title="iva producto" for="" class="col-md-1 col-form-label text-md-right" style="font-weight: bold;">Iva</label>
                        <label title="total producto" for="" class="col-md-2 col-form-label text-md-right" style="font-weight: bold;">Total</label>
                        
                    </div>
                    <div class="form-group" id="factura" style="align-content: center" hidden >
                    </div>
                    
                    <div class="form-group" id="lista" style="align-content: center" >
                        <table class="table table-striped table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th title="NOMBRE DE PRODUCTO">Product</th>
                                    <th title="CANTIDAD SELECCIONADA">Cantidad</th>
                                    <th title="UNIDAD">Unidad</th>
                                    <th title="VALOR ARTICULO">Precio</th>
                                    <th title="DECUENTO">Desc&nbsp<i class="fa fa-tag" aria-hidden="true"></i></th>
                                    <th title="IVA">Iva</th>
                                    <th title="TOTAL">Total</th>
                                    <th title="OPERACIONES">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <br>
                        <!--opcion vender-->
                <div class="form-group row col-md-5">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-success " >{{ __('Realizar Venta') }}
                        </button>
                        
                </div>
            </div>
        </div>
        <!--aca termina el backao-->
    </form>

    
    @stop
    
    @section('css')
        
    @stop
    
    @section('js')
        <!--todo el enredo de javascript-->
        <script>
            //validar portenaje de descuento
            
            //variables de la primera vista
            var subtotal = 0;
            var total = 0;
            var stock = 0;
            var cont = 0;
            var totali=0;
            var descuento=0;
            var cantidad2 = 0;
            var ivaAcum =0;
            var ivaIndi =0;
            var descuentoAcum=0;
            var iProduct =  new Array(); //idProducto
            var cProduct =  new Array(); //cantidadProducto
            var ivaProduct =  new Array(); //cantidadProducto
            var disProduct =  new Array(); //descuento si hay de Producto
            var disCant = new Array(); //cuanto desconto en dinero
            var ide= "";
            var ide2= "";
            var iva;
            function fock(event){
                $('#clienter').html(this.options[this.selectedIndex].text); 
            };

            function funcionIva(costo, idef,ivaP) {
                ibas=document.getElementById("costa"+idef).value;
                compara=(costo*(ivaP/100))+costo;
                if(compara-ibas==0){
                    document.getElementById("costa"+idef).setAttribute("value", costo);
                }else{
                    document.getElementById("costa"+idef).setAttribute("value", compara);
                }

            }

            function funcion(productos, costos, cantidades, idd,impuestoIva,impuestoOtro) {
                var regex = /(\d+)/g;
                impuestoIva=impuestoIva.match(regex);
                var impuestoIvaD=parseInt(impuestoIva);
                //cantidad de producto
                cont = document.getElementById("cantidad" + idd).value;
                //descuento si hay
                descu = document.getElementById("descuento" + idd).value;
                //nuevo valor para la tabla de cantidad
                cantidad2 = cantidades - cont
                //identificacion del producto seleccionado
                ide=document.getElementById("producto"+idd).value;
                ide2=document.getElementById("medida"+idd).innerHTML;
                //convierto las variables a entero y verifico que hay en el inventario
                var cuantoHay = parseInt(cantidades);
                var cuantoVendo = parseInt(cont);
                if (cuantoVendo <= cuantoHay && cuantoVendo != 0) {
                    //document.getElementById("cantidadProducto").setAttribute("s", cProduct);
                    //producto=document.getElementById("producto").innerHTML;
                    //costo=document.getElementById("costo").innerHTML;
                
                    //multiplico por cantidad de producto
                    costosSumados=costos*cont;
                    //subtotal acumulador normal de costos sin iva y descuento
                    subtotal = subtotal + costosSumados;
                    //aplico el descuento correspondiente
                    descuentoAcum=descuentoAcum+(costosSumados*(descu/100));
                    //aca se valida que opcion se marco en el check si 1 o 0
                    ibas=document.getElementById("costa"+idd).value;
                    //aca  decido si sumo el iva o no
                    if(costos-ibas==0){
                        totali=costosSumados-(costosSumados*(descu/100));
                        total=total+costosSumados-(costosSumados*(descu/100));
                        ivaIndi=0;
                        
                    }else{
                        var ivaA = (((impuestoIvaD/100) * costosSumados) + costosSumados)-(costosSumados*(descu/100));
                        totali=ivaA
                        total = total + ivaA;
                        ivaAcum=ivaAcum+((impuestoIvaD/100) * costosSumados);
                        ivaIndi=(impuestoIvaD/100) * costosSumados;
                    }
                
                //*****************************
                    //Array para cantidad
                    iProduct.push(idd); //id de producto adquirido
                    cProduct.push(cont); //cantidad de producto
                    ivaProduct.push(ivaIndi); //iva del producto individual
                    disProduct.push(descu); //porcentaje de descuento
                
                    
                    //para alterar cambios en la tabla
                    //deshabilito la fila debido a que ya exprese la cantidad de ese producto inicial
                    //si requiero cambiar la cantidad debo eliminarlo de la list
                    document.getElementById("cantidad"+idd).disabled=true;
                    document.getElementById("plus"+idd).setAttribute("hidden","true");
                    document.getElementById("ivan"+idd).disabled=true;
                    document.getElementById("descuento"+idd).disabled=true;
                    document.getElementById("cantidadProducto").setAttribute("value", cProduct);
                    document.getElementById("idProducto").setAttribute("value", iProduct);
                    document.getElementById("stock1" + idd).setAttribute("value", cantidad2);

                    //variables ocultas
                    document.getElementById("iva").setAttribute("value", ivaProduct);
                    document.getElementById("descuentoPorcentaje").setAttribute("value", disProduct);

                    //resumen general de totales

                    document.getElementById("subtotal").setAttribute("value", subtotal);
                    document.getElementById("ivaAcum").setAttribute("value", ivaAcum);
                    document.getElementById("totalDescontado").setAttribute("value", descuentoAcum);
                    document.getElementById("total").setAttribute("value", total);

            


                    //valores plasmados en la factura
                    //document.getElementById("iva2").setAttribute("value", iva);
                    //document.getElementById("total2").setAttribute("value", total);
                    //document.getElementById("subtotal2").setAttribute("value", subtotal);
                
                    
                    //*********variables de la lista****************
                    
                    //añadir salto de linea
                    var br = document.createElement("br");
                    var img = document.createElement("i");
                    img.className = "fa fa-times";
                    img.setAttribute('aria-hidden', 'true');
                    var capa = document.getElementById("factura");
                    

                    //primero creare el boton de eliminar
                    var boton = document.createElement("a");
                    boton.className = "btn btn-danger col-md-2 col-form-label text-md-right";
                    boton.style='width:40px; ';
                    boton.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>'
                    boton.setAttribute("href","javascript:void(0)");
                    boton.setAttribute("id","borrar"+idd);
                    boton.onclick = deleteElemento;

                    //segundo creare el boton de editar
                    var boton2 = document.createElement("a");
                    boton2.className = "btn btn-danger col-md-2 col-form-label text-md-right";
                    boton2.style='width:40px; ';
                    boton2.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>'
                    boton2.setAttribute("href","javascript:void(0)");
                    boton2.setAttribute("id","editar"+idd);
                    boton2.onclick = editElemento;
                    //creare el label de subtotal
                    var producto = document.createElement("label");
                    producto.setAttribute("id", "prod");
                    producto.className = "col-md-2 col-form-label text-md-right";
                    producto.innerHTML = productos;

                    //label para cantidad
                    var cantidad = document.createElement("label");
                    cantidad.className = "col-md-2 col-form-label text-md-right";
                    cantidad.innerText = cont+' units';

                    //label para precio unitario
                    var precio = document.createElement("label");
                    precio.className = "col-md-2 col-form-label text-md-right";
                    precio.innerText = costos+'.00$$';

                    //label para descuento 
                    var descue = document.createElement("label");
                    descue.className = "col-md-2 col-form-label text-md-right";
                    descue.innerText = descu+'%';

                    //label para iva
                    var ivancio = document.createElement("label");
                    ivancio.className = "col-md-1 col-form-label text-md-right";
                    ivancio.innerText = "19%";

                    //label para precio total, todo un cache
                    var precionso = document.createElement("label");
                    precionso.className = "col-md-2 col-form-label text-md-right";
                    precionso.innerText = total+'.00$';

                    //creo un espacio
                    var espacio = document.createElement("div");
                    espacio.setAttribute("id", espacio);

                    //asignacion al documento html

                    var ope = document.createElement("br");
                    capa.appendChild(espacio);
                    espacio.appendChild(producto);
                    espacio.appendChild(cantidad);
                    espacio.appendChild(precio);
                    espacio.appendChild(descue);
                    espacio.appendChild(ivancio);
                    espacio.appendChild(precionso);
                    espacio.appendChild(boton);
                    espacio.appendChild(boton2);
                    espacio.appendChild(ope);
                    


                    //aca aumento las filas en la tabla
                    var t = $('#dataTable2').DataTable();
                    var counter = idd;
                    pos2 = iProduct.indexOf(idd);
                    cantares3=ivaProduct[pos2]; //cuanto fue el iva
                    t.row.add( [
                                productos,
                                '<input type="number" id="edicionValue'+idd+'" class="form-control" value="'+cont+'" >',
                                ide2,
                                "$"+costos+".00",
                                "$"+(costosSumados*(descu/100))+".00",
                                "$"+ivaIndi+".00",
                                "$"+totali+".00",
                                "<a clas='btn btn-danger col-md-2 col-form-label text-md-right' href='javascript:void(0)' onclick='deleteF("+idd+")'><i class='fas fa-trash-alt'></i></a>&nbsp&nbsp<a clas='btn btn-danger col-md-2 col-form-label text-md-right' href='javascript:void(0)' onclick='editF("+idd+")'><i class='fas fa-edit'></i></a>",
                                ] ).draw( false );

                    //*******************eliminar elemento de la lista****************
                    function deleteElemento() {
                        //obtengo el valor del div donde trabajare la lista
                        var capa = document.getElementById("factura");
                        //btengo la cantidad de producto original
                        contar = document.getElementById("stock1" + idd).value;
                        
                        cont = cantidades-contar;
                        
                        ibas=document.getElementById("costa"+idd).value;
                        //volver a la situacion, y revertir el iva
                        pos2 = iProduct.indexOf(idd);
                        cantares=cProduct[pos2]; //cantidad de producto
                        cantares2=(disProduct[pos2])/100; //cuanto fue el descuento
                        cantares3=ivaProduct[pos2]; //cuanto fue el iva

                        //borro respectiva fila
                        var s = $('#dataTable2').DataTable();
                        s.row(pos2).remove().draw();



                        if(costos-ibas==0){
                            costosSumados=costos*cantares; //estes costos esta por defecto no esta tomando el iva
                            subtotal = subtotal - costosSumados;
                            total=total-costosSumados+(costosSumados*cantares2);
                            descuentoAcum=descuentoAcum-(costosSumados*cantares2);
                            
                        }else{
                            iva=(impuestoIvaD/100);
                            costosSumados=costos*cantares; //estes costos esta por defecto no esta tomando el iva
                            subtotal = subtotal - costosSumados;
                            ivaA = cantares3 + costosSumados;
                            total=total-ivaA+(costosSumados*cantares2);
                            ivaAcum=ivaAcum-cantares3;
                            descuentoAcum=descuentoAcum-(costosSumados*cantares2);
                        }
                            //limpio las posiciones de los vectores
                        
                            pos2 = iProduct.indexOf(idd);
                            cProduct.splice(pos2, 1);
                            iProduct.splice(pos2, 1);
                            ivaProduct.splice(pos2, 1);
                            disProduct.splice(pos2, 1);


                        //reasigno a la tabla
                            document.getElementById("ivan"+idd).disabled=false;
                            document.getElementById("descuento"+idd).disabled=false;
                            document.getElementById("cantidadProducto").setAttribute("value", cProduct);
                            document.getElementById("idProducto").setAttribute("value", iProduct);
                            document.getElementById("stock1" + idd).setAttribute("value", cantidades);

                        //variables ocultas
                            document.getElementById("iva").setAttribute("value", ivaProduct);
                            document.getElementById("descuentoPorcentaje").setAttribute("value", disProduct);
                            
                            //asignacion inversa a los totales
                            document.getElementById("subtotal").setAttribute("value", subtotal);
                            document.getElementById("ivaAcum").setAttribute("value", ivaAcum);
                            document.getElementById("totalDescontado").setAttribute("value", descuentoAcum);
                            document.getElementById("total").setAttribute("value", total);
                            
                            //document.getElementById("iva2").setAttribute("value", iva);
                            //document.getElementById("total2").setAttribute("value", total);
                            //document.getElementById("subtotal2").setAttribute("value", subtotal);
                        
                    
                            //
                            //var borrardiv = capa.lastChild;
                            document.getElementById("plus"+idd).removeAttribute("hidden")
                            document.getElementById("cantidad"+idd).disabled=false;
                            capa.removeChild(espacio);


                    } 
                    function editElemento(){
                        
                        //PRIMERO BORRO LOS VALORES ACTUALES
                                //obtengo el valor del div donde trabajare la lista
                                var capa = document.getElementById("factura");
                                //btengo la cantidad de producto original
                                contar = document.getElementById("stock1" + idd).value;
                                
                                cont = cantidades-contar;
                                
                                ibas=document.getElementById("costa"+idd).value;
                                //volver a la situacion, y revertir el iva
                                pos2 = iProduct.indexOf(idd);
                                cantares=cProduct[pos2]; //cantidad de producto
                                cantares2=(disProduct[pos2])/100; //cuanto fue el descuento
                                cantares3=ivaProduct[pos2]; //cuanto fue el iva

                                //borro respectiva fila
                                var s = $('#dataTable2').DataTable();
                                s.row(pos2).remove().draw();



                                if(costos-ibas==0){
                                    costosSumados=costos*cantares; //estes costos esta por defecto no esta tomando el iva
                                    subtotal = subtotal - costosSumados;
                                    total=total-costosSumados+(costosSumados*cantares2);
                                    descuentoAcum=descuentoAcum-(costosSumados*cantares2);
                                    totali=0
                                    ivaIndi=0
                                    
                                }else{
                                    iva=(impuestoIvaD/100);
                                    costosSumados=costos*cantares; //estes costos esta por defecto no esta tomando el iva
                                    subtotal = subtotal - costosSumados;
                                    ivaA = cantares3 + costosSumados;
                                    total=total-ivaA+(costosSumados*cantares2);
                                    ivaAcum=ivaAcum-cantares3;
                                    descuentoAcum=descuentoAcum-(costosSumados*cantares2);
                                    totali=0
                                    ivaIndi=0
                                }
                                    //limpio las posiciones de los vectores
                                
                                    pos2 = iProduct.indexOf(idd);
                                    cProduct.splice(pos2, 1);
                                    iProduct.splice(pos2, 1);
                                    ivaProduct.splice(pos2, 1);
                                    disProduct.splice(pos2, 1);


                                //reasigno a la tabla
                                    document.getElementById("ivan"+idd).disabled=false;
                                    document.getElementById("descuento"+idd).disabled=false;
                                    document.getElementById("cantidadProducto").setAttribute("value", cProduct);
                                    document.getElementById("idProducto").setAttribute("value", iProduct);
                                    document.getElementById("stock1" + idd).setAttribute("value", cantidades);

                                //variables ocultas
                                    document.getElementById("iva").setAttribute("value", ivaProduct);
                                    document.getElementById("descuentoPorcentaje").setAttribute("value", disProduct);
                                    
                                    //asignacion inversa a los totales
                                    document.getElementById("subtotal").setAttribute("value", subtotal);
                                    document.getElementById("ivaAcum").setAttribute("value", ivaAcum);
                                    document.getElementById("totalDescontado").setAttribute("value", descuentoAcum);
                                    document.getElementById("total").setAttribute("value", total);
                                    
                                    //document.getElementById("iva2").setAttribute("value", iva);
                                    //document.getElementById("total2").setAttribute("value", total);
                                    //document.getElementById("subtotal2").setAttribute("value", subtotal);
                                
                            
                                    //
                                    //var borrardiv = capa.lastChild;
                                    document.getElementById("plus"+idd).removeAttribute("hidden")
                                    document.getElementById("cantidad"+idd).disabled=false;
                                    //capa.removeChild(espacio);

                        //SEGUNDO CREO UN NUEVO CAMPO CON EL NOUEVO COUNT
                                //cantidad de producto
                                cont = document.getElementById("cantidad"+idd).value;
                                //descuento si hay
                                descu = document.getElementById("descuento" + idd).value;
                                //nuevo valor para la tabla de cantidad
                                cantidad2 = cantidades - cont
                                //identificacion del producto seleccionado
                                ide=document.getElementById("producto"+idd).value;
                                ide2=document.getElementById("medida"+idd).innerHTML;
                                //convierto las variables a entero y verifico que hay en el inventario
                                var cuantoHay = parseInt(cantidades);
                                var cuantoVendo = parseInt(cont);
                                if (cuantoVendo <= cuantoHay && cuantoVendo != 0) {
                                    //multiplico por cantidad de producto
                                    costosSumados=costos*cont;
                                    //subtotal acumulador normal de costos sin iva y descuento
                                    subtotal = subtotal + costosSumados;
                                    //aplico el descuento correspondiente
                                    descuentoAcum=descuentoAcum+(costosSumados*(descu/100));
                                    //aca se valida que opcion se marco en el check si 1 o 0
                                    ibas=document.getElementById("costa"+idd).value;
                                    //aca  decido si sumo el iva o no
                                    if(costos-ibas==0){
                                        total=total+costosSumados-(costosSumados*(descu/100));
                                        totali=costosSumados-(costosSumados*(descu/100));
                                        ivaIndi=0;
                                    }else{
                                        var ivaA = (((impuestoIvaD/100) * costosSumados) + costosSumados)-(costosSumados*(descu/100));
                                        total = total + ivaA;
                                        totali=ivaA;
                                        ivaAcum=ivaAcum+((impuestoIvaD/100) * costosSumados);
                                        ivaIndi=(impuestoIvaD/100) * costosSumados;
                                    }
                                //*****************************
                                    //Array para cantidad
                                    iProduct.push(idd); //id de producto adquirido
                                    cProduct.push(cont); //cantidad de producto
                                    ivaProduct.push(ivaIndi); //iva del producto individual
                                    disProduct.push(descu); //porcentaje de descuento
                                    //para alterar cambios en la tabla
                                    //deshabilito la fila debido a que ya exprese la cantidad de ese producto inicial
                                    //si requiero cambiar la cantidad debo eliminarlo de la list
                                    document.getElementById("cantidad"+idd).disabled=true;
                                    document.getElementById("plus"+idd).setAttribute("hidden","true");
                                    document.getElementById("ivan"+idd).disabled=true;
                                    document.getElementById("descuento"+idd).disabled=true;
                                    document.getElementById("cantidadProducto").setAttribute("value", cProduct);
                                    document.getElementById("idProducto").setAttribute("value", iProduct);
                                    document.getElementById("stock1" + idd).setAttribute("value", cantidad2);
                
                                    //variables ocultas
                                    document.getElementById("iva").setAttribute("value", ivaProduct);
                                    document.getElementById("descuentoPorcentaje").setAttribute("value", disProduct);

                                    //resumen general de totales

                                    document.getElementById("subtotal").setAttribute("value", subtotal);
                                    document.getElementById("ivaAcum").setAttribute("value", ivaAcum);
                                    document.getElementById("totalDescontado").setAttribute("value", descuentoAcum);
                                    document.getElementById("total").setAttribute("value", total);

                                    //*********variables de la lista****************
                                    
                                    //añadir salto de linea
                                    var br = document.createElement("br");
                                    var img = document.createElement("i");
                                    img.className = "fa fa-times";
                                    img.setAttribute('aria-hidden', 'true');
                                    var capa = document.getElementById("factura");
                                    

                                    //primero creare el boton de eliminar
                                    var boton = document.createElement("a");
                                    boton.className = "btn btn-danger col-md-2 col-form-label text-md-right";
                                    boton.style='width:40px; ';
                                    boton.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>'
                                    boton.setAttribute("href","javascript:void(0)");
                                    boton.setAttribute("id","borrar"+idd);
                                    boton.onclick = deleteElemento;

                                    //segundo creare el boton de editar
                                    var boton2 = document.createElement("a");
                                    boton2.className = "btn btn-danger col-md-2 col-form-label text-md-right";
                                    boton2.style='width:40px; ';
                                    boton2.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>'
                                    boton2.setAttribute("href","javascript:void(0)");
                                    boton2.setAttribute("id","editar"+idd);
                                    boton2.onclick = editElemento;
                                    //creare el label de subtotal
                                    var producto = document.createElement("label");
                                    producto.setAttribute("id", "prod");
                                    producto.className = "col-md-2 col-form-label text-md-right";
                                    producto.innerHTML = productos;

                                    //label para cantidad
                                    var cantidad = document.createElement("label");
                                    cantidad.className = "col-md-2 col-form-label text-md-right";
                                    cantidad.innerText = cont+' units';

                                    //label para precio unitario
                                    var precio = document.createElement("label");
                                    precio.className = "col-md-2 col-form-label text-md-right";
                                    precio.innerText = costos+'.00$$';

                                    //label para descuento 
                                    var descue = document.createElement("label");
                                    descue.className = "col-md-2 col-form-label text-md-right";
                                    descue.innerText = descu+'%';

                                    //label para iva
                                    var ivancio = document.createElement("label");
                                    ivancio.className = "col-md-1 col-form-label text-md-right";
                                    ivancio.innerText = "19%";

                                    //label para precio total, todo un cache
                                    var precionso = document.createElement("label");
                                    precionso.className = "col-md-2 col-form-label text-md-right";
                                    precionso.innerText = total+'.00$';

                                    //creo un espacio
                                    var espacio = document.createElement("div");
                                    espacio.setAttribute("id", espacio);

                                    //asignacion al documento html

                                    var ope = document.createElement("br");
                                    capa.appendChild(espacio);
                                    espacio.appendChild(producto);
                                    espacio.appendChild(cantidad);
                                    espacio.appendChild(precio);
                                    espacio.appendChild(descue);
                                    espacio.appendChild(ivancio);
                                    espacio.appendChild(precionso);
                                    espacio.appendChild(boton);
                                    espacio.appendChild(boton2);
                                    espacio.appendChild(ope);

                                    //aca aumento las filas en la tabla
                                    var t = $('#dataTable2').DataTable();
                                    var counter = idd;
                                    pos2 = iProduct.indexOf(idd);
                                    cantares3=ivaProduct[pos2]; //cuanto fue el iva
                                    t.row.add( [
                                                productos,
                                                '<input type="number" id="edicionValue'+idd+'" class="form-control" value="'+cont+'" >',
                                                ide2,
                                                "$"+costos+".00",
                                                "$"+(costosSumados*(descu/100))+".00",
                                                "$"+ivaIndi+".00",
                                                "$"+totali+".00",
                                                "<a clas='btn btn-danger col-md-2 col-form-label text-md-right' href='javascript:void(0)' onclick='deleteF("+idd+")'><i class='fas fa-trash-alt'></i></a>&nbsp&nbsp<a clas='btn btn-danger col-md-2 col-form-label text-md-right' href='javascript:void(0)' onclick='editF("+idd+")'><i class='fas fa-edit'></i></a>",
                                                ] ).draw( false );


                                            } else {
                                        alert("Operacion Incorrecta PRODUCTO INSUFICIENTE")
                                        document.getElementById("cantidad"+idd).focus();
                                        }


                    }
                } else {
                    alert("Operacion Incorrecta PRODUCTO INSUFICIENTE")
                }
            }


            function deleteF(aque){

                document.getElementById("borrar"+aque).click();
            }

            function editF(aque){
                newValue=document.getElementById("edicionValue"+aque).value;
                //alert(newValue);
                document.getElementById("cantidad"+aque).setAttribute("value",newValue);
                document.getElementById("editar"+aque).click();
                }


            function buscarSelect() {
                // creamos un variable que hace referencia al select
                var select = document.getElementById("elementos");
                // obtenemos el valor a buscar
                var buscar = document.getElementById("buscar").value;
                // recorremos todos los valores del select
                for (var i = 1; i < select.length; i++) {
                    if (select.options[i].text == buscar) {
                        // seleccionamos el valor que coincide
                        select.selectedIndex = i;
                    }
                }
            }
        </script>
        <script>
            
            $(document).ready(function() {
                $('.js-example-theme-single').select2({theme:"classic"});
                $('#dataTable').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                    bSort: false,
                });

                $('#dataTable2').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                    bSort: false,
                });

            });
        </script>
    
    @stop
    
    
    
    
    


