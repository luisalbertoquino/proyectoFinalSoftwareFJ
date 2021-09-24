@extends('adminlte::page')

    @section('title', 'Roles')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content') 
         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li> 
          <li class="breadcrumb-item active">Roles</li>
          <li class="breadcrumb-item active">Roles Creados</li>
          <form method="get" action="/roles/create" style="margin-left: auto;">
          <button type="submit" class="btn btn-primary" >
            {{ __('Registrar nuevo Rol en el Sistema') }}&nbsp&nbsp<i class="fas fa-id-badge"></i>
        </button>
          </form>
        </ol> 
 
        <!-- DataTables Example -->
        <div class="card mb-3"> 
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-id-card-alt"></i>&nbsp&nbsp
            REGISTRO DE ROLES
            <span style="float: right">
              <a href="/roles2" title="Imprimir registros de tabla" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
          </span>
          </div> 
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">Rol</th>
                    <th style="text-align: center;">Permisos</th>
                    <th style="text-align: center;">Ver</th>
                    <th style="text-align: center;">Editar</th>
                    <th style="text-align: center;">Estado</th>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <th style="text-align: center;">Eliminar</th>
                    @endif
                  </tr>
                </thead>
        
                <tbody>
                    @foreach($rol as $roles)
                      @if($roles->slug!='administrador-main' && $roles->slug!='administrador'  || Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                      <tr>
                          <td style="text-align: center;width:30px;">{{ $roles['id'] }}</td>
                          <td style="text-align: center;width:150px;">{{ $roles['nombre'] }}</td>
                          <td style="text-align: center;width:250px;">
                              @if($roles->permissions != null)
                                @foreach($roles->permissions as $permission)
                                  <span class="badge badge-secondary">
                                    {{$permission->nombre}}
                                  </span>
                                @endforeach
                              @endif
                          </td> 

                          <!--ver-->
                          <td style="text-align: center;width:50px;">
                              <a class="btn btn-warning" href="/roles/{{ $roles['id'] }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                          </td>


                          <!--editar-->
                          <td style="text-align: center;width:50px;">
                                  <a class="btn btn-primary" href="/roles/{{ $roles['id'] }}/edit"><i class="fas fa-edit"></i></a>
                          </td>

 
                              <!--cambiar estado-->
                        <td  style="text-align: center;width:30px;">
                          <form action="/roles/estado/{{$roles->id}}" method="POST">
                            @method('PATCH')
                          {{csrf_field()}}
                            @if ($roles->estado==0)
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

                          <!--eliminar (solo admin)-->
                          @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                          <td style="text-align: center;width:50px;">
                                  <a class="btn btn-danger" href="javascript:void(0)" data-toggle="modal" data-target="#deleteModal" data-postid="{{$roles->id}}"><i class="fas fa-trash-alt"></i></a>
                          </td>
                          @endif
                      </tr>
                      @endif
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
            <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este Rol.</div>
            <div class="modal-footer">
            
            <form method="POST" action="">
            @method('DELETE')
                @csrf
                <a class="btn btn-primary" onclick="$(this).closest('form').submit();" href="#">Eliminar</a>
            </form>
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
            modal.find('form').attr('action','/roles/'+post_id);
        })
      </script> 

      <script>
        $(document).ready(function() {
            $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
            });

        });
      </script>

    
    @stop
    
    
    
    
    

    

       


    