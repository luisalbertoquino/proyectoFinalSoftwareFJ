@extends('adminlte::page')

    @section('title', 'Dashboard')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

         <!--segundo modelo-->
         <div class="card card-login2 mx-auto mt-1" style="border:1px solid #666">
          <div class="card-header p-0">
            <div class="bg-info text-white text-center py-2">
                <h3><i class="fa fa-envelope"></i> Informacion de Licencia</h3>
                <p class="m-0">Sofwtare FJ</p>
            </div>
          </div>
          <div class="card-body">  
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                  <h2>Pricing</h2>
                  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
        
                <div class="row">
        
                  <div class="col-lg-4 col-md-6" data-aos="zoom-im" data-aos-delay="100">
                    <div class="box featured">
                      <h3>Stock</h3>
                      <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                      </ul>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box featured">
                      <h3>Sales</h3>
                      <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                      </ul>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box featured">
                      <h3>Operational</h3>
                      <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                      </ul>
                    </div>
                  </div>
        
                </div>
        
              </div>
        
          </div>
        </div>

      <!--primer modelo-->
      <br><br>
      <div class="card card-login2 mx-auto mt-1" style="border:1px solid #666">
        <div class="card-header p-0">
          <div class="bg-info text-white text-center py-2">
              <h3><i class="fa fa-envelope"></i> Adquiere una mejora en tu licencia</h3>
              <p class="m-0">Sofwtare FJ</p>
          </div>
        </div>
        <div class="card-body">  
          <div class="container" data-aos="fade-up">
            <div class="row text-center">

              <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="{{ asset ('/img/free.png')}}" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Free</h4>
                    <p class="card-text">
                      <h4>$0<span> / limited Demo</span></h4>
                      <ul style="text-align: left">
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                      </ul>
                    </p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Buy Now!</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="{{ asset ('/img/basic.png')}}" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Basic</h4>
                    <p class="card-text">
                      <h4>$30.000<span> / Month</span></h4>
                      <ul style="text-align: left">
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                      </ul>
                    </p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Buy Now!</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="{{ asset ('/img/pro.png')}}" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Pro</h4>
                    <p class="card-text">
                      <h4>$400.000<span> / Year</span></h4>
                      <ul style="text-align: left">
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                      </ul>
                    </p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Buy Now!</a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="{{ asset ('/img/permanente.jpg')}}" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Ilimited</h4>
                    <p class="card-text">
                      <h4>$2.500.000<span> / Ilimited</span></h4>
                      <ul style="text-align: left">
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                      </ul>
                    </p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Buy Now!</a>
                  </div>
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
