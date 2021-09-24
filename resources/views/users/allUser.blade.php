@extends('adminlte::page')

    @section('title', 'Usuarios del Sistema')
    
    @section('content_header')
    
    @stop
    
    @section('content')
   
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">Usuarios</li>
          <form method="get" action="/user/create" style="margin-left: auto;">
            <button type="submit" class="btn btn-primary" >
              {{ __('Nuevo Usuario del sistema') }}&nbsp&nbsp<i class="fas fa-user-plus"></i>
          </button>
            </form> 
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-user-lock"></i>&nbsp&nbsp
            USUARIOS REGISTRADOS
            <span style="float: right">
              <a href="/user2" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
          </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <th>id</th>
                    @endif
                    <th style="text-align: center;">Nombre</th>
                    <th style="text-align: center;">Usuario</th>
                    <th style="text-align: center;">Email</th>
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
                  @foreach ($users as $users)
                  <!--Esconcer credenciales del administrador en la tabla de usuarios general-->
                  @if ((!\Auth::user()->hasRole('administrador-main') && $users->hasRole('administrador-main')) || $users->hasRole('administrador-main')) @continue; @endif
                  <tr {{Auth::user()->id == $users->id  ? 'bgcolor=#ddd' : '' }}>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <td style="width:20px;">{{$users->id}}</td>
                    @endif
                    <td style="width:150px;">{{$users->nombre}} {{$users->apellido}}</td>
                    <td style="width:150px;">{{$users->username}}</td>
                    <td style="width:100px;">{{$users->email}}</td>
                    <td style="width:100px;">
                      @if($users->roles->isNotEmpty())
                        @foreach($users->roles as $role)
                          <span class="badge badge-secondary">
                              {{$role->nombre}}
                          </span>
                        @endforeach 
                      @endif
                    </td>
                    <td style="width:150px;">
                      @if($users->permissions->isNotEmpty())

                        @foreach($users->permissions as $permission)
                          <span class="badge badge-secondary">
                              {{$permission->nombre}}
                          </span>
                        @endforeach
                      @endif
                    </td> 
                    <!--ver usuario-->
                    <td style="text-align: center;width:30px;">
                      <a class="btn btn-warning active" style="color:#ffff" href="/user/{{$users->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>

                    <!--editar--> 
                    <td style="text-align: center;width:30px;">
                      <form action="/user/{{ $users['id'] }}/edit" method="GET">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                      </form>
                    </td>

                    <!--cambiar estado-->
                    <td  style="text-align: center;width:30px;">
                      <form action="/user/estado/{{$users->id}}" method="POST">
                        @method('PATCH')
                      {{csrf_field()}}
                        @if ($users->estado==0)
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

                    <!--eliminar-->
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <td style="width:70px; text-align:center">
                      <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$users->id}}"><i class="fas fa-trash-alt"></i></a>
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
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close" href="#">
                      <span aria-hidden="true">×</span>
                  </button>
                  </div>
                  <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este usuario.</div>
                  <div class="modal-footer">
                  @if ($users->id=!false)
                  <form method="POST" action="">
                    @method('DELETE')
                        @csrf
                        <input type="hidden" id="post_id" name="post_id" value="">
                        <a class="btn btn-primary" onclick="$(this).closest('form').submit();" href="#">Eliminar</a>
                    </form>
                  @endif
                  <button class="btn btn-secondary" type="button" data-dismiss="modal" href="#">Cancelar</button>
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
              modal.find('form').attr('action','/user/'+post_id);
          });

        $(document).ready(function() {
            $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
                
            });

        });
      </script>

    @stop
 