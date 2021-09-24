@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif


<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}} 
    
    <a href="#" class="nav-link dropdown-toggle align-items-end" data-toggle="dropdown">
        <div class="row align-items-start">
        @if(config('adminlte.usermenu_image'))
            @if( auth()->user()->foto=="/storage/") 
                <img src="{{ Auth::user()->adminlte_image()}}"
                class="user-image img-circle elevation-2"
                alt="photo" >
            @else 
                <img src="{{ auth()->user()->foto }}"
                class="user-image img-circle elevation-2"
                alt="{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}" >
            @endif
        @endif
        <span  @if(config('adminlte.usermenu_image')) class="d-none d-md-inline " @endif>
           <h6 style="color: #ffff;font-style: bold;">&nbsp&nbsp{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}&nbsp&nbsp&nbsp&nbsp<i class="fas fa-bars"></i></h6>
        </span>
    </div>
    </a>
    
    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
    @if( $negocio->logo=="/storage/")  
        style="background-color:#ffff" 
    @else
        style="background-image:linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url({{$negocio->logo}});background-size: contain;"
    @endif
    >

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    @if( auth()->user()->foto=="/storage/") 
                        <img src="{{ Auth::user()->adminlte_image() }}"
                        class="img-circle elevation-2 mx-auto"
                        alt="{{ Auth::user()->nombre }}{{ Auth::user()->apellido }}">
                    @else 
                        <img src="{{ auth()->user()->foto }}"
                        class="img-circle elevation-2 mx-auto"
                        alt="{{ Auth::user()->nombre }}{{ Auth::user()->apellido }}">
                    @endif
                    
                @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @if($profile_url)
                <a href="/user3" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user"></i>
                    {{ __('Perfil') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
