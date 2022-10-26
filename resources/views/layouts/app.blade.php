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
{{-- SCRIPT PARA INHABILITAR EL CAMPO DE APELLIDO DE CASADA SI SE SELECCIONA GENERO MASCULINO U OTRO --}}

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
   window.intlTelInput(conyuge_telefono, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
    window.intlTelInput(referencia_telefono1, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE_OR_MOBILE',
   });
   window.intlTelInput(referencia_telefono2, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   window.intlTelInput(referencia_telefono3, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   window.intlTelInput(referencia_telefono4, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   window.intlTelInput(telefonoCasa, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE',
   });
   window.intlTelInput(telefonoTrabajo, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       placeholderNumberType: 'FIXED_LINE',
   });
   window.intlTelInput(celular1, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
   window.intlTelInput(celular2, {
     preferredCountries: ["sv","us", "co", "in", "de"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
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
