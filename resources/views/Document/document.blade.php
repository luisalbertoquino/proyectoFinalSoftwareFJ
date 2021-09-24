@extends('adminlte::page')

    @section('title', 'Documentos')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">Ajustes</li>
          <li class="breadcrumb-item active">Documentos Registrados</li>
          <form method="get" action="/document/create" style="margin-left: auto;">
          <button type="submit" class="btn btn-primary" >
            {{ __('Registrar nuevo tipo de ID Sistema') }}&nbsp&nbsp<i class="fas fa-passport"></i>
        </button>
          </form>
        </ol> 
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
            TIPOS DE DOCUMENTO REGISTRADOS
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">Tipo Documento</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Editar</th>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <th style="text-align: center;">Eliminar</th>
                    @endif
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($documento as $documento)
                  <tr>
                    <td style="text-align: center;width:80px;">{{$documento->id}}</td>
                    <td style="text-align: center;width:400px;">{{$documento->tipoDocumento}}</td>


                    <!--cambiar estado-->
                    <td  style="text-align: center;width:150;">
                    <form action="/document/estado/{{$documento->id}}" method="POST">
                      @method('PATCH')
                      {{csrf_field()}}
                      @if ($documento->estado==0)
                        @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                        <button class="btn btn-danger" type="submit" ><i class="fas fa-minus-circle"></i></button>
                          @else
                          <button class="btn btn-danger" disabled type="submit" ><i class="fas fa-minus-circle"></i></button>
                          @endif
                      @else
                      <button class="btn btn-success" type="submit" ><i class="fas fa-minus-circle"></i></button>
                      @endif
                    </form>
                    </td>
 
                    <!--editar-->
                    <td style="text-align: center;width:150;">
                      <a class="btn btn-primary" href="/document/{{$documento->id}}/edit"><i class="fas fa-edit"></i></a>
                    </td>


                    <!--eliminar-->
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <td style="text-align: center;width:150;">
                      <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$documento->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    @endif
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
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro/a de que quieres eliminar esto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este tipo de documento asociado.</div>
                <div class="modal-footer">
                @if ($documento->id=!false)
                <form method="POST" action="/document/{{$documento->id}}">
                @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="#" onclick="$(this).closest('form').submit();">Eliminar</a>
                </form>
                @endif
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
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
            modal.find('form').attr('action','/document/' + post_id);
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
