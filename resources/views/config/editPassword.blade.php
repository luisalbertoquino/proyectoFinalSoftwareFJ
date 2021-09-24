@extends('adminlte::page')

    @section('title', 'Editar PASSWORD')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
            <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a> 
            </li>
            <li class="breadcrumb-item active">Modificar Password</li>
        </ol>

        <div class="table-responsive">
          <div class="card mb-3" style="width: 40rem; margin: auto"> 
              <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">MODIFICAR PASSWORD&nbsp&nbsp<i class="fa fa-address-book" aria-hidden="true"></i>
                  <!--boton regresar-->
                  <span style="float: left">
                      <a href="/home" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
                
                        <form method="POST" action="/user3/{{$piola}}" enctype="multipart/form-data">
                            @method('PATCH')
                            {{csrf_field()}}
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-right">{{ __(' Old_Password') }}</label>
                                <div class="col-md-7">
                                    <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" @if ($errors->has('oldPassword')) autofocus @endif>
                                    @error('oldPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
        
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('New_Password') }}</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if ($errors->has('password')) autofocus @endif>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-group pt-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modificar Password') }}
                                    </button>
                                </div>
                
                        </form>
                    
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
                var premissions_box = $('#permissions_box');
                var permissions_checkbox_list = $('#permissions_checkbox_list');
                var user_permissions_box = $('#user_permissions_box');

                premissions_box.hide(); //hide all boxes
                
                $('#role').on('change', function(){
                    var role = $(this).find(':selected');
                    var role_id = role.data('role-id');
                    var role_slug = role.data('role-slug');

                    permissions_checkbox_list.empty();
                    user_permissions_box.empty();

                        $.ajax({
                            url:"/user/create",
                            method:'get',
                            dataType: 'json',
                            data:{
                                role_id: role_id,
                                role_slug: role_slug,
                            }
                        }).done(function(data){
                            console.log(data);
                            //permissions_box.show();
                            // permissions_checkbox_list.empty();


                            $.each(data, function(index, element){
                                $(permissions_checkbox_list).append(
                                    '<div class="custom-control custom-checkbox col-md-8">'+
                                    '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+element.slug+'"value="'+element.id+'">'+
                                    '<label class="custom-control-label" for="'+element.slug+'">'+element.nombre+'</label>'+
                                    '</div>'
                                );
                            });
                        });

                });
                $('.js-example-responsive').select2({theme:"classic"});
                $('.js-example-theme-single').select2({theme:"classic"});

            });
        
            
        </script>
    
    @stop
    
    
    
    
    

           