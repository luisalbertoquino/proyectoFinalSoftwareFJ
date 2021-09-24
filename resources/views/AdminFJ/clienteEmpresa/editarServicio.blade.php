@extends('adminlte::page')

    @section('title', 'Editar Servicio')
    
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
              <a href="/contactoFJ">Empresa Registrada</a>
            </li>
            <li class="breadcrumb-item active">Modificar Cliente</li>
          </ol>
          
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">MODIFICAR LICENCIA DE CLIENTE&nbsp&nbsp<i class="fas fa-id-card-alt"></i>
                    <span style="float: left">
                        <a href="/contactoFJ" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
            
                    <form method="POST" action="/contacto/{{$contacto->id}}">
                        @method('PATCH')
                        @csrf
    
                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa Registrada') }}</label>
                            <div class="col-md-6">
                                <input id="empresa" readonly type="text" class="form-control  @error('empresa') is-invalid @enderror" name="empresa"  @if ($errors->has('empresa')) autofocus @endif  value="{{$config}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="idCliente" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                            <div class="col-md-6">
                                <select class="js-example-theme-single form-control @error('idCliente') is-invalid @enderror" data-live-search="true" id="idCliente" name="idCliente"  onchange="fock.call(this, event)">
                                    <option value="" class="form-control" disabled selected>Buscar Cliente</option>
                                    @foreach ($usuario as $usuario)
                                        @if($usuario->permissions->contains('slug', 'administrador')==true)
                                            @if($usuario->id==$contacto->idCliente)
                                                <option selected onselect="asignarCliente('{{ $usuario->nombre }}','{{ $usuario->numeroDocumento }}')"
                                                    value="{{ $usuario->id }}">{{ $usuario->numeroDocumento }}-{{ $usuario->nombre }}
                                                </option>
                                            @else
                                                <option onselect="asignarCliente('{{ $usuario->nombre }}','{{ $usuario->numeroDocumento }}')"
                                                    value="{{ $usuario->id }}">{{ $usuario->numeroDocumento }}-{{ $usuario->nombre }}
                                                </option>
                                            @endif
                                        @endif    
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="idResponsable" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>
                            <div class="col-md-6">
                                <select class="js-example-theme-single form-control @error('idResponsable') is-invalid @enderror" data-live-search="true" id="idResponsable" name="idResponsable"  onchange="fock.call(this, event)">
                                    <option value="" class="form-control" disabled selected>Buscar Cliente</option>
                                    @foreach ($usuario2 as $usuario2)
                                        @if($usuario2->permissions->contains('slug', 'administrador-main')==true)
                                            @if($usuario2->id==$contacto->idResponsable)
                                                <option selected onselect="asignarCliente('{{ $usuario2->nombre }}','{{ $usuario2->numeroDocumento }}')"
                                                    value="{{ $usuario2->id }}">{{ $usuario2->numeroDocumento }}-{{ $usuario2->nombre }}
                                                </option>
                                            @else
                                                <option onselect="asignarCliente('{{ $usuario2->nombre }}','{{ $usuario2->numeroDocumento }}')"
                                                    value="{{ $usuario2->id }}">{{ $usuario2->numeroDocumento }}-{{ $usuario2->nombre }}
                                                </option>
                                            @endif
                                        @endif    
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="idLicencia" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Licencia') }}</label>
                            <div class="col-md-6">
                                <select name="idLicencia2" oninput="alerta()" id="idLicencia2" class="form-control @error('idLicencia') is-invalid @enderror" @if ($errors->has('idLicencia')) autofocus @endif>
                                    <option value="" selected disabled hidden>Choose here</option>
                                    @foreach ($licencia as $licencias)
                                    @if ($licencias->estado==1)
                                        @if($contacto->idLicencia==$licencias->id)
                                            <option selected value={{$licencias->cantidadTiempo+$licencias->tiempoExtra}} {{ old('idLicencia') == $licencias->id ? 'selected' : '' }}>{{$licencias->nombreLicencia}}</option>
                                        @else
                                            <option  value={{$licencias->cantidadTiempo+$licencias->tiempoExtra}} {{ old('idLicencia') == $licencias->id ? 'selected' : '' }}>{{$licencias->nombreLicencia}}</option>    
                                        @endif
                                @endif
                                    @endforeach
                                </select>  
                            </div>
                        </div>
    
                        <div class="form-group row" hidden>
                            <label for="idLicencia" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Licencia') }}</label>
                            <div class="col-md-6">
                                <select name="idLicencia" id="idLicencia" class="form-control " >
                                    <option value="" selected disabled hidden>Choose here</option>
                                    @foreach ($licencia as $licencia)
                                    @if ($licencia->estado==1)
                                        @if($contacto->idLicencia==$licencia->id)
                                            <option selected value={{$licencia->id}} {{ old('idLicencia') == $licencia->id ? 'selected' : '' }}>{{$licencia->nombreLicencia}}</option>
                                        @else
                                            <option  value={{$licencia->id}} {{ old('idLicencia') == $licencia->id ? 'selected' : '' }}>{{$licencia->nombreLicencia}}</option>    
                                        @endif
                                @endif
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        @php
                            $date1 = new DateTime();
                            $date2 = new DateTime("$contacto->fechaFinal");
                            if($date1 < $date2){
                                $diff = $date1->diff($date2);
                                $diass=$diff->days+1 . ' Dias';
                                }else{
                                    $diass = "Expired"; 
                                    }
                        @endphp 
    
                        <div class="form-group row">
                            <label for="tiempoRestante" class="col-md-4 col-form-label text-md-right">{{ __('Tiempo de licencia') }}</label>
                            <div class="col-md-6">
                                <input id="tiempoRestante" readonly type="text" class="form-control @error('tiempoRestante') is-invalid @enderror" value="{{$diass}}"  @if ($errors->has('tiempoRestante')) autofocus @endif value="{{ old('tiempoRestante') }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="horaInicio" class="col-md-4 col-form-label text-md-right">{{ __('Hora de Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="horaInicio" oninput="alerta()" type="time"  class="form-control @error('horaInicio') is-invalid @enderror" name="horaInicio"  @if ($errors->has('horaInicio')) autofocus @endif value="{{ $contacto->horaInicio }}">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="fechaInicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fechaInicio" oninput="alerta()" type="date" class="form-control @error('fechaInicio') is-invalid @enderror" name="fechaInicio"  @if ($errors->has('fechaInicio')) autofocus @endif value="{{ $contacto->fechaInicio }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fechaFinal" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>
                            <div class="col-md-6">
                                <input id="fechaFinal" readonly type="date"  class="form-control @error('fechaFinal') is-invalid @enderror" name="fechaFinal"  @if ($errors->has('fechaFinal')) autofocus @endif value="{{ $contacto->fechaFinal }}">
                            </div>
                        </div>
                        
                
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Estado') }}</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" @if ($errors->has('estado')) autofocus @endif value="{{ old('estado') }}">
                                        @if($contacto->estado==0)
                                            <option  value="1">Activo</option> 
                                            <option selected value="0">Inactivo</option>
                                        @else
                                            <option selected value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        @endif
                                    </select>
                                </div>
                        </div>
                
                        
            
            
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary" style="align-content: center;text-lign:center">
                                    {{ __('Registrar nuevo Cliente') }}
                                </button>
                            </div>
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
            function alerta() {
            var fechaInicial=0;
            var fechaFinal=0;
            var diferencia=0;
            var total=0;
            fechaInicial=document.getElementById("fechaInicio").value;
            tiempo=document.getElementById("idLicencia2").value;
            tiempo=parseInt(tiempo);
            document.getElementById("fechaFinal").setAttribute("value", fechaInicial);
            //Obtenemos una cadena con la fecha que deseamos leer
            const cadenaFecha = document.querySelector("#fechaInicio").value
                    if (cadenaFecha != "" && tiempo !=""){
                        //capturo y reasigno el numero de dias y el tipo de licencia
                        document.getElementById("tiempoRestante").setAttribute("value", tiempo+" Dias");
                        var x = document.getElementById("idLicencia2").selectedIndex;
                        document.getElementById("idLicencia").selectedIndex = x;
        
                        //capturo lo fecha inicial
                        var totali=new Date($('#fechaInicio').val());
                        totali.setDate(totali.getDate() + tiempo);
        
                        //Esta función de utilidad nos dará la fecha formateada
                        const formatear = f =>{
                        const año = f.getFullYear();
                        const mes = ("0" + (f.getMonth()+1)).substr(-2);
                        const dia = ("0" + f.getDate()).substr(-2);
                        return `${año}-${mes}-${dia}`
                        }
                        document.getElementById("fechaFinal").setAttribute("value", formatear(totali));
                        //alert(totali);
                    } 
        }
        </script>
    
    @stop
    
    
    
    
    

    

        



          
 