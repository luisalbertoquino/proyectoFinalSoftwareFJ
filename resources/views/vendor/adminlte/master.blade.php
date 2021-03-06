<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif

</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

    <!--Compriebo la licencia del caballero-->
    @php
    if($contactos!=null){
       $date1 = new \DateTime();
       $date2 = new \DateTime("$contactos->fechaFinal");
       if($date1 <= $date2){
           $diff = $date1->diff($date2);
           $diass=$diff->days+1 . ' d??as';
           $tiempo=$diff->days;
           }else{
           $diass = "Expired";
           $tiempo=0;
           }
       }else{
           $diass=0 . ' d??as';
           $tiempo=0;
       }
   @endphp
   <!--Fin de la comprobacion-->

   <!-- Licence Modal-->
   <div class="modal fade" id="licenciaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   @if($tiempo<4 && $tiempo>0)
                   <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">El tiempo de su licencia esta por expirar</h5>
                   @else
                   <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">Su Licencia HA CADUCADO</h5>
                   @endif

                   @if($tiempo==0)
                   <a type="button" style="outline:none;" class="close" href="/contacto"></a>
                   @else
                   <button type="button" style="outline:none;" class="close" data-dismiss="modal" aria-label="Close">
                   @endif
                   
                   <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body" style="font-style:italic;">
                 
                       @if($tiempo<4 && $tiempo>0)
                           <h6>Su licencia esta por expirar el tiempo restante es de {{$diass}}</h6>
                           <span style="float: right">si desea ampliar su plan contactenos ahora</span>
                       @else
                           <h6>LA LICENCIA DE ESTE APLICATIVO HA CADUCADO</h6>
                           <span style="float: right">Si desea adquirir nuevamente su servicio contactenos ahora</span>
                       @endif
                  
               </div>
               <div class="modal-footer ">
                   <!--Contactar-->
                   @if($tiempo==0)
                       <a class="btn btn-success btn-sm" href="/contacto" type="button" style="outline:none;">Contactenos</a>  
                       @else
                       <a class="btn btn-success btn-sm" href="/contacto" type="button" style="outline:none;" >Contactenos</a> 
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form> 
                       @endif
                   

                       <!--cancelar-->
                       @if($tiempo==0)
                       <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Cerrar</button>
                       <a class="btn btn-secondary btn-sm" href="{{ route('logout') }}"  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" ><i class="fas fa-power-off"></i></a> 
                       @else
                       <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Cerrar</button>  
                       @endif
                     
                   <form id="foos" action="/contacto" method="GET" style="display: none;">
                       @csrf
                   </form>
               </div>
           </div> 
       </div>
   </div>

   @if(Auth::check()==true)
        @if(Auth::user()->permissions->contains('slug', 'administrador-main')==false)
            @if($tiempo<4)
            <a class="dropdown-item" hidden href="#" id="foo" data-toggle="modal" data-backdrop="static" data-target="#licenciaModal">Cerrar Sesion</a>
            <script type="text/javascript">
                window.onload = function() {document.getElementById('foo').click();}
            </script> 
            @endif
    @endif
   @endif
    

</body>

</html>
