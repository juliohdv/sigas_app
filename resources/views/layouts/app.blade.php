<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" href="{{asset('assets/images/favicon.ico') }}"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!--LIVEWIRE Styles-->
    @livewireStyles
@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @yield('page_css')

    @yield('css')
</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')

        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>

@include('profile.change_password')
@include('profile.edit_profile')
    <!--LIVEWIRE Scripts-->
    @livewireScripts
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>

{{-- SCRIPT PARA HACER OBLIGATORIOS LOS CAMPOS DE DOCUMENTOS SI LA NACIONALIDAD SELECCIONADA ES SALVADOREÑO --}}
<script type="text/javascript">
    $('#nacionalidad').on('change',
        function(e){
            var selecionado = $("option:selected", this);
            var valorSeleccionado = this.value;
            if (valorSeleccionado == 'Savadoran') {
                $('#nit').prop('required',true);
                $('#nup').prop('required',true);
                $('#isss').prop('required',true);
            }else{
                $('#nit').prop('required',false);
                $('#nup').prop('required',false);
                $('#isss').prop('required',false);
            }
        });
</script>

<script type="text/javascript">
    var tot=0;
    $('#porcentaje3, #porcentaje2, #porcentaje1').on('blur change keyup', function(){
        var p1 = parseInt($('#porcentaje1').val());
        var p2 = parseInt($('#porcentaje2').val());
        var p3 = parseInt($('#porcentaje3').val());
        tot=p1+p2+p3;
        $('#totalP').attr('value',tot);
        if(p1 == 100){
            tot = p1;            
            $('#beneficiarioNombre2').prop('readonly',true);
            $('#beneficiarioEdad2').prop('readonly',true);
            $('#beneficiarioParentesco2').prop('readonly',true);
            $('#porcentaje2').prop('readonly',true)
            $('#beneficiarioNombre3').prop('readonly',true);
            $('#beneficiarioEdad3').prop('readonly',true);
            $('#beneficiarioParentesco3').prop('readonly',true);
            $('#porcentaje3').prop('readonly',true)
            $('#totalP').attr('value',tot);
        }else if((p1+p2) == 100){
            tot = p1+p2;
            $('#beneficiarioNombre3').prop('readonly',true);
            $('#beneficiarioEdad3').prop('readonly',true);
            $('#beneficiarioParentesco3').prop('readonly',true);
            $('#porcentaje3').prop('readonly',true)
            $('#totalP').attr('value',tot);
        }else if(((p1+p2+p3) == 100) || ((p1+p2)<100)){
            $('#beneficiarioNombre2').prop('readonly',false);
            $('#beneficiarioEdad2').prop('readonly',false);
            $('#beneficiarioParentesco2').prop('readonly',false);
            $('#porcentaje2').prop('readonly',false)
            $('#beneficiarioNombre3').prop('readonly',false);
            $('#beneficiarioEdad3').prop('readonly',false);
            $('#beneficiarioParentesco3').prop('readonly',false);
            $('#porcentaje3').prop('readonly',false)
            tot = p1+p2+p3;
            $('#totalP').attr('value',tot);
        }
    });    
</script>
    
{{-- SCRIPT PARA INHABILITAR OPCION DE SECTOR PUBLICO SI SE SELECCIONA SOLO EMPRESARIO --}}
<script type="text/javascript">
    $('input:checkbox').change(
        function(){
            if($('#empresario').is(':checked') && $('#empleado').is(':checked')) {                    
                    $('#sector_id option[value=1]').prop('disabled',false);
                }
                else if($('#empresario').is(':checked') && !$('#empleado').is(':checked')) {
                    $('#sector_id option[value=1]').prop('disabled',true);
                }else if(!$('#empresario').is(':checked') && !$('#empleado').is(':checked')){
                    $('#sector_id option[value=1]').prop('disabled',false);
                }
        });
</script>
{{-- SCRIPT PARA INHABILITAR LOS CAMPOS DE ESTAD CIVIL SI SE SELECCIONA SOLTERO O VIUDO --}}
<script type="text/javascript">
    $('#estado_civil_id').on('change',
        function(e){
            var selecionado = $("option:selected", this);
            var valorSeleccionado = this.value;
            if (valorSeleccionado == 2 || valorSeleccionado == 3 || valorSeleccionado == 4) {
                $('#conyuge_nombre').prop('readonly',true);
                $('#conyuge_direccion').prop('readonly',true);
                $('#conyuge_telefono').prop('readonly',true);
            }else{
                $('#conyuge_nombre').prop('readonly',false);
                $('#conyuge_direccion').prop('readonly',false);
                $('#conyuge_telefono').prop('readonly',false);
            }
        });
</script>
{{-- SCRIPT PARA INHABILITAR EL CAMPO DE APELLIDO DE CASADA SI SE SELECCIONA GENERO MASCULINO U OTRO --}}
<script type="text/javascript">
    $('input:radio[name="genero"]').change(
        function(){
            if (this.checked && this.value == 'M' || this.checked && this.value == 'O') {
                $('#apellidoCasada').prop('readonly',true);
            }else{
                $('#apellidoCasada').prop('readonly',false);
            }
        });
</script>
{{-- SCRIPT PARA MASCARA DE CAMPOS TELEFONICOS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script type="text/javascript">   
   const conyuge_telefono = document.querySelector("#conyuge_telefono");
   const referencia_telefono1 = document.querySelector("#referencias1");
   const referencia_telefono2 = document.querySelector("#referencias2");
   const referencia_telefono3 = document.querySelector("#referencias3");
   const referencia_telefono4 = document.querySelector("#referencias4");
   const telefonoCasa = document.querySelector("#telefonoCasa");
   const telefonoTrabajo = document.querySelector("#telefonoTrabajo");
   const celular1 = document.querySelector("#celular1");
   const celular2 = document.querySelector("#celular2");

   const conyuge = window.intlTelInput(conyuge_telefono, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
    const referencia1 = window.intlTelInput(referencia_telefono1, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE_OR_MOBILE',
   });
    const referencia2 = window.intlTelInput(referencia_telefono2, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   const referencia3 = window.intlTelInput(referencia_telefono3, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   const referencia4 = window.intlTelInput(referencia_telefono4, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   const casa = window.intlTelInput(telefonoCasa, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE',
   });
   const trabajo = window.intlTelInput(telefonoTrabajo, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE',
   });
   const cel1 = window.intlTelInput(celular1, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   const cel2 = window.intlTelInput(celular2, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     nationalMode: true,
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   const cambioConyuge = function(){
        const numero = (conyuge.isValidNumber() ? conyuge.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacionalConyuge').attr('value',conyuge.getNumber());
        $('#stelConyuge').text(nodo.data);
   }
    const cambioReferencia1 = function(){
        const numero = (referencia1.isValidNumber() ? referencia1.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacional1').attr('value',referencia1.getNumber());
        $('#stelReferencia1').text(nodo.data);
   }
   const cambioReferencia2 = function(){
        const numero = (referencia2.isValidNumber() ? referencia2.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacional2').attr('value',referencia2.getNumber());
        $('#stelReferencia2').text(nodo.data);
   }
   const cambioReferencia3 = function(){
        const numero = (referencia3.isValidNumber() ? referencia3.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacional3').attr('value',referencia3.getNumber());
        $('#stelReferencia3').text(nodo.data);
   }
   const cambioReferencia4 = function(){
        const numero = (referencia4.isValidNumber() ? referencia4.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacional4').attr('value',referencia4.getNumber());
        $('#stelReferencia4').text(nodo.data);
   }
   const cambioCassa = function(){
        const numero = (casa.isValidNumber() ? casa.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacionalCasa').attr('value',casa.getNumber());
        $('#stelCasa').text(nodo.data);
   }
   const cambioTrabajo = function(){
        const numero = (trabajo.isValidNumber() ? trabajo.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacionalTrabajo').attr('value',trabajo.getNumber());
        $('#stelTrabajo').text(nodo.data);
   }
   const cambioCelular1 = function(){
        const numero = (cel1.isValidNumber() ? cel1.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacionalCelular1').attr('value',cel1.getNumber());
        $('#stelCelular1').text(nodo.data);
   }
   const cambioCelular2 = function(){
        const numero = (cel2.isValidNumber() ? cel2.getNumber() : "Ingrese un número válido");
        const nodo = document.createTextNode(numero);
        $('#telInternacionalCelular2').attr('value',cel2.getNumber());
        $('#stelCelular2').text(nodo.data);
   }
   conyuge_telefono.addEventListener('chage',cambioConyuge)
   conyuge_telefono.addEventListener('keyup',cambioConyuge)
   referencia_telefono1.addEventListener('change', cambioReferencia1);
   referencia_telefono1.addEventListener('keyup', cambioReferencia1);
   referencia_telefono2.addEventListener('change', cambioReferencia2);
   referencia_telefono2.addEventListener('keyup', cambioReferencia2);
   referencia_telefono3.addEventListener('change', cambioReferencia3);
   referencia_telefono3.addEventListener('keyup', cambioReferencia3);
   referencia_telefono4.addEventListener('change', cambioReferencia4);
   referencia_telefono4.addEventListener('keyup', cambioReferencia4);
   celular1.addEventListener('change', cambioCelular1);
   celular1.addEventListener('keyup', cambioCelular1);
   celular2.addEventListener('change', cambioCelular2);
   celular2.addEventListener('keyup', cambioCelular2);
   telefonoCasa.addEventListener('change', cambioCassa);
   telefonoCasa.addEventListener('keyup', cambioCassa);
   telefonoTrabajo.addEventListener('change', cambioTrabajo);
   telefonoTrabajo.addEventListener('keyup', cambioTrabajo);
</script>
@yield('page_js')
@yield('scripts')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    const userUrl = '{{url('users')}}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
</html>
