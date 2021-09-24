@extends('adminlte::page')

@section('title', 'Crear Resumen Financiero')
    
@section('content_header')
      <br> 
@stop
    
@section('content')

    <!-- Breadcrumbs-->
 
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Crear Resumen Financiero</li>
          </ol> 

          <div class="table-responsive">
              <div class="card mb-3" style="width: 40rem; margin: auto"> 
                  <div class="card-header" style="text-align: center">NUEVO MOVIMIENTO&nbsp&nbsp<i class="fas fa-chart-line"></i>
                      <!--boton regresar-->
                      <span style="float: left">
                          <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                      </span>
                  </div>
                  <div class="card-body">
      
                          <!--mensajes de error-->
                          @if ($errors->any())
                          <div class="alert alert-danger" role="alert">
                              <ul >
                                  @foreach ($errors->all() as $error)
                                      <li>{{$error}}</li>
                                  @endforeach
                              </ul> 
                          </div>
                          @endif
              
                      <form role="form" action = "/summary/save" method = "post"  enctype="multipart/form-data">
                          @csrf
                          <!-- Modal content-->
                          <div  id="modal" class="modal" >
                            <div class="modal-dialog">
                              
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" id="closemodal" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Subcategorias</h4>
                                </div>
                                <div class="modal-body" id="res_ajax">
                                
                                </div></br>
                                <div class="modal-footer">
                                <button style=" margin: 15px;" type="button" id="closemodal3" class="btn btn-default" data-dismiss="modal">Ok</button>
                                
                                </div>
                              </div>
          
                            </div>
                          </div>
                          <div  id="modal1" class="modal" >
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" id="closemodal1" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Fecha de producto</h4>
                                </div>
                                <div class="modal-body" id="res_ajax1">
                                
                                </div></br>
                                <div class="modal-footer">
          
                                <button  style=" margin: 15px;" type="button" id="closemodal2" class="btn btn-default" data-dismiss="modal">Ok</button>
                                </div>
                              </div>
          
                            </div>
                          </div>
                          <!--formulario-->
                          <div class="form-group row">
                              <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de movimiento') }}</label>
                              <div class="col-md-6">
                                <select class="form-control " id="type_movimiento" name="type">
                                  <option  value="" >
                                      Seleccione Tipo
                                    </option>
                                  @if($type=="add")
                                    <option  value="add"  selected>
                                      Abono
                                    </option>
                                  @elseif($type=="out")  
                                    <option value="out" selected>
                                      Retiro
                                    </option>
                                  @else 
                                    <option  value="add" >
                                      Abono
                                    </option>
                                    <option  value="out" >
                                      Retiro
                                    </option>
                                  @endif
                                </select>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Concept') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" type="text" name="concept"  class="form-control" placeholder="motivo del movimiento">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>
                          <div class="col-md-6">
                            <input required maxlength="200" name="amount" type="text"   data-mask="000,000,000,000,000.00" data-mask-reverse="true"    class="form-control"  placeholder="Monto">
                          </div>
                      </div>

                        <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Impuesto') }}</label>
                          <div class="col-md-6">
                            <input required maxlength="200" name="tax" type="text" data-mask-reverse="true"   class="form-control" data-mask="000,000,000,000,000.00"  placeholder="Impuesto">  
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('N° Ref') }}</label>
                        <div class="col-md-6">
                          <input  maxlength="200" name="factura" type="text"   class="form-control"  placeholder="N° de control">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Categorias') }}</label>
                      <div class="col-md-6">
                        <select required class="form-control" name="categories_id" id="categorie_select">
                          <option class="" value="">Seleccione Categoria</option>
                          @foreach ($data2 as $datas2)	

                            
                            @if($datas2->id!=1)
                          
                            <option class="attr-{{$datas2->type}}" value="{{ $datas2->id }}">
                          
                              {{ $datas2->name }}
                              
                            </option>
                              @endif
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Productos') }}</label>
                    <div class="col-md-6">
                      <select  class="form-control" name="tours_id" id="tours_select">
                        <option class="" value="">No Aplica</option>
                        @foreach ($tours as $tour)       
                          <option class="attr-{{$tour->valorVenta}}" value="{{ $tour->id }}">
                            {{ $tour->nombreProducto }}  
                          </option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                  <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Cuentas') }}</label>
                  <div class="col-md-6">
                    <select  required id="origen" class="form-control" name="account_id">
                      <option value="">Seleccione Cuenta</option>
                      @foreach ($data as $datas)		
                        <option value="{{ $datas->id }}">
                        
                          {{ $datas->name }}
                      
                        </option>
                      @endforeach
                    </select>
                    <div class="form-group hidden" id="res_origen"></div>
                  </div>
                </div>
                  <!--div new extrange-->
                  <div class="form-group hidden" id="res_ajax">
                  </div>

                  <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                    <div class="col-md-6">
                      <input  maxlength="200" name="created_at" type="date" required class="form-control"  placeholder="Fecha">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Anexar Adjunto') }}</label>
                  <div class="col-md-6">
                    <input type="file"  name="path"  class="form-control" placeholder="Nombre del archivo">
                  </div>
                </div>
                      <button type="submit" class="btn btn-success">Guardar</button>

                      </form>
                
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
		
