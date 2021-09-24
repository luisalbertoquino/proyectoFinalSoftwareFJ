@extends('adminlte::page')

    @section('title', 'Contacto')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
    <div class="table-responsive">
        <div class="card mb-3" style="width: 40rem; margin: auto">  
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">
              <div class="bg-info text-white text-center py-2">
                  <h3><i class="fa fa-envelope"></i> Contactanos</h3>
                  <p class="m-0">Con gusto te ayudaremos</p>
              </div>


          <div class="card-body">  
            <div class="row">
              <div class="col-lg-12 col-lg-offset-2">
        
                
                <form id="contact-form" method="post" action="" role="form">
        
                <div class="messages"></div>
        
                <div class="controls">
        
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name">Firstname *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Lastname *</label>
                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_email">Email *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_phone">Phone</label>
                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="form_message">Message *</label>
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required data-error="Please,leave us a message."></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send" value="Send message">
                    </div>
                  </div>
                
                </div>
        
                </form>
        
              </div>
        
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