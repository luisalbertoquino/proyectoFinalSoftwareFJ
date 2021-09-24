@extends('layouts.app')
@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card card-login2 mx-auto mt-1" style="border:1px solid #666">  
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: italic;">
                <div class="bg-info text-white text-center py-2">
                    <h3><i class="fa fa-envelope"></i> Contactanos</h3>
                    <p class="m-0">Con gusto te ayudaremos</p>
                </div>
            </div>
        
          </div>
        
      </div>
    </div>
    @section('js_user_page')
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
        @section('css_role_page')
        <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
        @endsection
    
        @section('js_role_page')
          <script src="/js/bootstrap-tagsinput.js"></script>
        @endsection

  </div>

</div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
</div>
  </div>
  <!-- /.content-wrapper -->
      
      @endsection
      @endsection