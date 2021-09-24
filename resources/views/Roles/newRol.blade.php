@extends('adminlte::page')

    @section('title', 'Nuevo Rol')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

        <!-- Breadcrumbs--> 
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="/roles">Todos los Roles</a>
          </li>
          <li class="breadcrumb-item active">Crear nuevo Rol</li>
        </ol>


        <div class="table-responsive">

          <div class="card mb-3" style="width: 40rem; margin: auto"> 
              <div class="card-header" style="text-align: center">REGISTRAR NUEVO ROL&nbsp&nbsp<i class="fas fa-id-badge"></i>
                <!--boton regresar-->
                <span style="float: left">
                    <a href="/roles" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </span>
          
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

                  <div class="container">
                    <form method="POST" action="/roles">
                      @csrf 
                      <div class="form-group row">
                          <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Rol') }}</label>
                          <div class="col-md-7">
                              <input id="role_name" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" placeholder="Role Name" autofocus="true" value="{{old('role_name')}}" @if ($errors->has('role_name')) autofocus @endif>
                          </div>
                      </div>

                      <div class="form-group row" hidden>
                        <label for="role_slug" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Slug') }}</label>
                        <div class="col-md-7">
                            <input id="role_slug" type="text" class="form-control @error('role_slug') is-invalid @enderror" name="role_slug" placeholder="Role Slug" autofocus="true" value="{{old('role_slug')}}" @if ($errors->has('role_slug')) autofocus @endif>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="role_permisions2" class="col-md-4 col-form-label text-md-right">{{ __('Add Permissions') }}</label>
                        <div class="col-md-7">
                          <select class="js-example-responsive form-control @error('role_permisions2') is-invalid @enderror" required  multiple data-live-search="true" id="role_permisions2" name="role_permisions2"  onchange="fock.call(this, event)">
                            <!--Administrador FJ-->
                            @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                            
                            <option>Administrador-Main</option>
                            <!--Administrador Cliente-->
                            <option>Administrador</option>  
                            @endif
                            <option>Productos</option>
                            <option>Ventas</option>
                            <option>Compras</option>
                            <option>Proveedores</option>
                            <option>Clientes</option>
                            <option>Informes</option>
                            <option>Sistema</option>
                            @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                            <option>Usuarios</option>
                            @endif
                            <option>ActualizarCuenta</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group row" hidden>
                        <label for="estado"  class="col-md-4 col-form-label text-md-right" >{{ __('Seleccione Estado') }}</label>
                        <div class="col-md-6">
                                <select name="estado"  id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif value="{{ old('estado') }}">
                                    <option value="1" selected >Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                        </div>
                      </div>
                

                      <input id="hftest" type="text" class="form-control" name="hftest" autofocus="true" readonly hidden>
                
                      <div class="form-group row mb-0">
                          <div class="col-md-12 offset-md-4">
                              <br>
                              <button type="submit" class="btn btn-primary" style="align-content: center;text-lign:center">
                                  {{ __('Registrar Rol') }}&nbsp&nbsp
                              </button>
                          </div>
                      </div>
                    </form>



                  </div>

              
              </div>
              </div>
          </div>
        </div>
    
    @stop
    
    @section('css')
        
    @stop
    
    @section('js')

    <script>
      function fock(event){
          var values = $('#role_permisions2').val();
          document.getElementById("hftest").setAttribute("value",values);
  
      }
  
  
      $(document).ready(function() {
          $('.js-example-responsive').select2({
            theme:"classic",
              placeholder: "Seleccione",
              tags: true,
              
          });
          var s2 = $("#role_permisions2").select2({
                placeholder: " Seleccione los permisos",
                tags: true
            });
  
          $('#role_name').keyup(function(e){
            var str = $('#role_name').val();
            var niu = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#role_slug').val(niu);
            $('#role_slug').attr('placeholder',niu);
          })
      });
  
      
    </script>
    
    @stop