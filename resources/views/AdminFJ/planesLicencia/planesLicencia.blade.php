@extends('adminlte::page')

    @section('title', 'Planes de Licencia')
    
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
          <li class="breadcrumb-item active">Planes de Licencia Registrados</li>
          <form method="get" action="/licencia/create" style="margin-left: auto;">
            <button type="submit" class="btn btn-primary" >
                {{ __('Registrar nuevo tipo de Licencia') }}&nbsp&nbsp<i class="fas fa-passport"></i>
            </button>
          </form>
        </ol> 
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
            PLANES DE LICENCIA REGISTRADOS
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Licencia</th>
                    <th style="text-align: center;">Tipo</th>
                    <th style="text-align: center;">Descripcion</th>
                    <th style="text-align: center;">Tiempo(dias)</th>
                    <th style="text-align: center;">TiempoExtra(dias)</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Editar</th>
                    <th style="text-align: center;">Eliminar</th>
              
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($licencia as $licencia)
                  <tr>
                    <td style="text-align: center;width:300px;">{{$licencia->nombreLicencia}}</td>
                    <td style="text-align: center;width:300px;">{{$licencia->tipoLicencia}}</td>
                    <td style="text-align: center;width:400px;">{{$licencia->descripcion}}</td>
                    <td style="text-align: center;width:50px;">{{$licencia->cantidadTiempo}}</td>
                    <td style="text-align: center;width:50px;">{{$licencia->tiempoExtra}}</td>
                    <!--cambiar estado-->
                    <td  style="text-align: center;width:150;">
                    <form action="/licencia/estado/{{$licencia->id}}" method="POST">
                      @method('PATCH')
                      {{csrf_field()}}
                      @if ($licencia->estado==0)
                        <button class="btn btn-danger" type="submit" ><i class="fas fa-minus-circle"></i></button>
                      @else
                          <button class="btn btn-success"  type="submit" ><i class="fas fa-minus-circle"></i></button>
                      @endif
                    </form>
                    </td> 
 
                    <!--editar-->
                    <td style="text-align: center;width:150;">
                      <a class="btn btn-primary" href="/licencia/{{$licencia->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>

                    <!--eliminar-->
                    <td style="text-align: center;width:150;">
                      <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$licencia->id}}"><i class="fas fa-trash-alt"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "delete" If you realy want to delete this type of licence.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                @if ($licencia->id=!false)
                <form method="POST" action="/licencia/{{$licencia->id}}">
                @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="#" onclick="$(this).closest('form').submit();">Delete</a>
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
            modal.find('form').attr('action','/licencia/' + post_id);
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
    
  
