@extends('adminlte::page')

    @section('title', 'Editar Rol')
    
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
          <li class="breadcrumb-item active">editar rol {{ $rol['nombre'] }}</li>
        </ol>

        <div class="table-responsive">

          <div class="card mb-3" style="width: 40rem; margin: auto"> 
            <div class="card-header" style="text-align: center">EDITAR ROL&nbsp&nbsp<i class="fas fa-id-badge"></i>
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
                  <form method="POST" action="/roles/{{$rol->id}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Rol') }}</label>
                        <div class="col-md-7">
                            <input id="role_name" type="text" class="form-control  @error('role_name') is-invalid @enderror" name="role_name" placeholder="Role Name" autofocus="true" @if ($errors->has('role_name')) autofocus @endif value="{{$rol->nombre}}">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                      <label for="role_slug" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Slug') }}</label>
                      <div class="col-md-7">
                          <input id="role_slug" type="text" class="form-control  @error('role_slug') is-invalid @enderror" name="role_slug" placeholder="Role Slug" @if ($errors->has('role_slug')) autofocus @endif  value="{{$rol->slug}}">
                      </div>
                    </div>

                  
              

                    <div class="form-group row">
                      <label for="role_permisions2" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>
                      <div class="col-md-7">
                        <select class="js-example-responsive form-control" multiple data-live-search="true" id="role_permisions2" name="role_permisions2"  onchange="fock.call(this, event)">
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
                    <div class="form-group row">
                      <label for="estado"  class="col-md-4 col-form-label text-md-right" >{{ __('Seleccione Estado') }}</label>
                      <div class="col-md-6">
                              <select name="estado" required id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado'))  @endif @if ($errors->has('estado')) autofocus @endif>
                                  @if($rol->estado==0)
                                  <option  value="1">Activo</option> 
                                  <option selected value="0">Inactivo</option>
                                  @else
                                  <option selected value="1">Activo</option>
                                  <option value="0">Inactivo</option>
                                  @endif
                              </select>
                      </div>
                    </div>

                    <input id="hftest" type="text" class="form-control" name="hftest" autofocus="true" readonly hidden>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <br>
                            <button type="submit" class="btn btn-primary" style="align-content: center;text-lign:center">
                                {{ __('Actualizar Rol') }}&nbsp&nbsp
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
            placeholder: " Actualice los permisos",
            tags: true
            });


            var s2 = $("#role_permisions2").select2({
              placeholder: " Actualice los permisos",
              tags: true 
          });

          let op = "<?php foreach($rol->permissions as $permission) echo "$permission->nombre". ',' ?>";
          var j=op.split(",")
          var vals = [op.split(",")];
        
          //var vals = ["<?php foreach($rol->permissions as $permission) echo "$permission->nombre". ','  ?>"];
          //foreach($rol->permissions as $permission) {{$permission->nombre.  ","}}
          //var vals = ["<?php echo "$rol->permissions" ?>"];
            vals.forEach(function(e){
            if(!s2.find('option:contains(' + e + ')').length) 
              s2.append($('<option>').text(e));
            });

            s2.val(op.split(",")).trigger("change"); 



          $('#role_name').keyup(function(e){
            var str = $('#role_name').val();
            var niu = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#role_slug').val(niu);
            $('#role_slug').attr('placeholder',niu);
          })
      });
  
      
    </script>
    
    @stop