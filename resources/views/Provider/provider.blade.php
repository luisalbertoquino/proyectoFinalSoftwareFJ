@extends('adminlte::page')

    @section('title', 'Proveedores')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">  
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">Proveedores Registrados</li>
          <form method="get" action="/provider/create" style="margin-left: auto;">
            <button type="submit" class="btn btn-primary" >
              {{ __('Nuevo Proveedor') }}&nbsp&nbsp<i class="fas fa-user-tie"></i>
          </button>
            </form>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-truck"></i>&nbsp&nbsp
            REGISTRO DE PROVEEDORES
            <span style="float: right">
              <a title="Imprimir registros de tabla" href="/provider2" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
          </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr> 
                    <th>Razon Social</th>
                    <th>Tipo Documento</th>
                    <th>N° Documento</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Estado</th>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <th>Eliminar</th>
                    @endif
                
                  </tr>
                </thead>

                <tbody>
                  @foreach ($proveedor as $proveedor)
                  <tr>
                    <td style="width:170px;">{{$proveedor->razonSocial}}</td>
                    <td style="width:150px; text-align:center">
                      @if ($proveedor->document['estado']==1)
                      {{$proveedor->document['tipoDocumento']}}
                      @else
                      Numero de documento desconocido
                      @endif
                    </td>
                    <td style="width:100px; text-align:center">{{$proveedor->numeroDocumento}}</td>
                    <td style="width:150px;">{{$proveedor->direccion}}</td>
                    <td style="width:150px;">{{$proveedor->telefono}}</td>
                    <td style="width:150px;">{{$proveedor->email}}</td>

                    <!--Ver-->
                    <td style="width:70px; text-align:center">
                      <a class="btn btn-warning active" style="color:#ffff" href="/provider/{{ $proveedor['id'] }}"><i class="fas fa-eye"></i></a>
                    </td>

                    <!--editar-->
                    <td style="text-align: center;width:30px;">
                      <form action="/provider/{{ $proveedor['id'] }}/edit" method="GET">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                      </form>
                    </td>


                    <!--cambiar estado-->
                    <td  style="text-align: center;width:30px;">
                      <form action="/provider/estado/{{$proveedor->id}}" method="POST">
                        @method('PATCH')
                      {{csrf_field()}}
                        @if ($proveedor->estado==0)
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
                      <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-postid="{{$proveedor->id}}"><i class="fas fa-trash-alt"></i></a>
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
              <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este proveedor.</div>
              <div class="modal-footer">
              @if ($proveedor->id=!false)
              <form method="POST" action="/provider/{{$proveedor->id}}">
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
        $(document).ready(function() {
            $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
            });

        });
      </script>
    @stop
