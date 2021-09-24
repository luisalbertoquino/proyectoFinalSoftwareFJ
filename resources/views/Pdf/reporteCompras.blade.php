<div class="card mb-3">
    <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
      <i class="fas fa-table" style="color: #c2cfdd  ;"></i>&nbsp&nbsp
      REGISTRO DE COMPRAS
      <span style="float: left">
        <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </span>
    </div>
      
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th>serie</th>
              <th>N° Comprobante</th>
              <th>Fecha</th>
              <th>Proveedor</th>
              
              
            </tr>
          </thead>


          <tbody>
            @foreach ($compra as $compra)
            <tr>
              <td>{{$compra->serieComprobante}}</td>
              <td>{{$compra->numeroComprobante}}</td>
              <td>{{$compra->fechaEmision}}</td>
              <!--proveedor-->
              <td>
                @if ($compra->proveedor['estado']==1)
                {{$compra->proveedor['razonSocial']}}
                @else
                No hay categoria disponible
                @endif
                </td>
              
              
            </tr>
        
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
  </div>