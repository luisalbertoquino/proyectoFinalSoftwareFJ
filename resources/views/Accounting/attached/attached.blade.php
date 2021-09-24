@extends('adminlte::page')

    @section('title', 'Archivos Adjuntos')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Documentos o Archivos adjuntos</li>
          </ol>

          <div class="container-fluid spark-screen">
            <div class="row">
              <div class="col-md-12 ">
                <div class="box-body">
                  <div class="container-fluid spark-screen">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box box-admin-border">
                          <div class="box-header with-border">
                            <i class="fa fa-folder"></i><h3 class="box-title"><b>Documentos o arhivos adjuntos</b></h3>
                            
                            
                          </div>
                          
                          <div class="box-body responsive-table">
        
                            <div id="lista_item_wrapper" class="">
                              <div class="row">
                                <div class="col-sm-12">
                                  <table id="attached" class="table table-bordered" cellspacing="0" width="100%">
                                      <thead>
                                         <tr>
                                          <th>ID</th>
                                          <th>Archivo</th>
                                          <th>Fecha de creación</th>
                                          <th>Ultima Edición </th>
                                          <th>Acción</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                            @foreach ($attached as $attacheds)
                                            <tr>
                                              <td>{{ $attacheds->id }}</td>
                                              <td> <i class="fa fa-paperclip"></i></td>
                                              <td>{{ $attacheds->created_at }}</td>
                                              <td>{{ $attacheds->updated_at }}</td>
                                                <td style="text-align: center">
                                               
                                                <form role="form" action = "/attached/eliminar/{{ $attacheds->id }}" method="post"  enctype="multipart/form-data">
                                                              {{method_field('DELETE')}}
                                                              {{ csrf_field() }}
                                                          <a class="btn btn-sm btn-primary" href="/attached/edit/{{ $attacheds->id }}"><i class="fa fa-edit"></i></a>
                                                          <button onclick='if(confirmDel() == false){return false;}' class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                                                        </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                      </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
    @stop

    
    @section('css')
      
      <link rel="stylesheet" href="/css/formulario.css">
    @stop
    
    @section('js')
      <script src="/js/Chart.js"></script>
      <script src="/js/Chart.min.js"></script>
      <script src="/js/custom.js"></script>
      <script>

        $(document).ready(function() {
          $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
                
            });
            //modal
            

            });
    </script>
    @stop

    

  

