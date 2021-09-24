@extends('adminlte::page')

    @section('title', 'Empresa Registrada')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">SystemFJ</li>
          <li class="breadcrumb-item active">Empresa Registrada</li>
          @php
           $find=0;
            foreach($contacto as $flag){
              $find=$flag->id;
            }
            print_r($find);
          @endphp
          <label for="">{{$find}}</label>
            @if( $find==null)
                <form method="get" action="/contacto/create" style="margin-left: auto;">
                  <button type="submit" class="btn btn-primary" >
                      {{ __('Registrar Licencia') }}&nbsp&nbsp<i class="fas fa-passport"></i>
                  </button>
                </form>
            @else
            <button disabled type="submit" class="btn btn-success" style="margin-left: auto;">
              {{ __('Licencia Creada') }}&nbsp&nbsp<i class="fas fa-passport"></i>
          </button>
            @endif

        </ol> 
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
            EMPRESA REGISTRADA
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Empresa</th>
                    <th style="text-align: center;">Cliente</th>
                    <th style="text-align: center;">Responsable</th>
                    <th style="text-align: center;">Licencia</th>
                    <th style="text-align: center;">HoraInicial</th>
                    <th style="text-align: center;">FechaInicio</th>
                    <th style="text-align: center;">FechaFinal</th>
                    <th style="text-align: center;">TiempoRestante</th>
                    <th style="text-align: center;">Valor</th>
                    
                    <th style="text-align: center;">Editar</th>
                    <th style="text-align: center;">Delete</th>
           
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($contacto as $contacto)
                  <tr>
                    <td style="text-align: center;width:80px;">{{$config}}</td>
                    <td style="text-align: center;width:400px;">
                      <!--Cliente-->
                      @if ($contacto->cliente['estado']==1)
                      {{$contacto->cliente['nombre']}}{{$contacto->cliente['apellido']}}
                      @else
                      Cliente no definido
                      @endif
                    </td>
                    <td style="text-align: center;width:400px;">
                      <!--Responsable-->
                      @if ($contacto->responsable['estado']==1)
                      {{$contacto->responsable['nombre']}}{{$contacto->responsable['apellido']}}
                      @else
                      Responsable no definido
                      @endif
                    </td>
                    <td style="text-align: center;width:400px;">
                      <!--Categoria-->
                      @if ($contacto->licencia['estado']==1)
                      {{$contacto->licencia['nombreLicencia']}}
                      @else
                      Licencia no definida
                      @endif
                    </td>
                    <td style="text-align: center;width:400px;">{{$contacto->horaInicio}}</td>
                    <td style="text-align: center;width:400px;">{{$contacto->fechaInicio}}</td>
                    <td style="text-align: center;width:400px;">{{$contacto->fechaFinal}}</td>
                      @php
                        $date1 = new DateTime();
                        $date2 = new DateTime("$contacto->fechaFinal");
                        if($date1 < $date2){
                          $diff = $date1->diff($date2);
                          $diass=$diff->days. ' Dias';
                          }else{
                            $diass = "Expired";
                            }
                        
                        // will output 2 days
                        //echo $diff->days . ' days ';
                      @endphp
                    <td style="text-align: center;width:200px;">{{$diass}}</td>
                    <td style="text-align: center;width:200px;">
                      <!--Categoria-->
                      @if ($contacto->licencia['estado']==1)
                      ${{$contacto->licencia['valor']}}.00
                      @else
                      Licencia no definida
                      @endif
                    </td>
                    
                    <td  style="text-align: center;width:50px;">
                    <!--editar-->
                      <a class="btn btn-primary" href="/contacto/{{$contacto->id}}/edit"><i class="fas fa-edit"></i></a>
                    </td>
                    <td  style="text-align: center;width:50px;">
                    <!--eliminar-->
                      <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$contacto->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody> 
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
        </div>

        <!-- delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de que desea eliminar esto?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              </div>
              <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este cliente.</div>
              <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              @if ($contacto->id=!false)
              <form method="POST" action="/contacto/{{$contacto->id}}">
              @method('DELETE')
                  @csrf
                
                  <a class="btn btn-primary" href="#" onclick="$(this).closest('form').submit();">Eliminar</a>
              </form>
              @endif
              </div>
          </div>
          </div>
        </div>

    
    @stop
    
    @section('css')
        
    @stop
    
    @section('js')

      <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var post_id = button.data('postid') 
            var modal = $(this)
            modal.find('.modal-footer #post_id').val(post_id);
            modal.find('form').attr('action','/contacto/' + post_id);
        });

        

      </script>



      <script>
        $(document).ready(function() {
            $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
              
            });

        });
      </script>

    
    @stop