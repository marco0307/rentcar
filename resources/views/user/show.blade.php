@extends('layouts.app')
@section('css')
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>PERFIL DE USUARIO</h2>
    </div>
    @if(session('status'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('status')}}
        </div>
    @endif
    <!-- Body Copy -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{$user->full_name}}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{url('/')}}">Lista de usuarios</a></li>
                                <li><a href="{{route('edit-user',$user->slug)}}">Editar</a></li>
                                <li>
                                    <a href="#" onclick="if(confirm('¿Deseas eliminar este usuario?')){document.getElementById('form').submit();}">Eliminar</a>
                                    <form action="/user/{{$user->slug}}" method="POST" id="form" style="display: contents;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <img src="{{ asset('images/big-img.png') }}" width="200" height="200" style="border-radius:10px;" alt="User" />
                        </div>
                        <div class="col-sm-4">
                            <p><b>Nombre completo:</b> {{$user->full_name}}</p>
                            <p><b>Correo electrónico:</b> {{$user->email}}</p>
                            <p><b>Cédula:</b> {{$user->cedula}}</p>
                            <p><b>Tipo de usuario:</b> @if ($user->role_id == 1)<span class="label bg-black">Administrador</span>@else<span class="label bg-blue-grey">Empleado</span>@endif</p>
                        </div>
                        <div class="col-sm-3">
                            <p><b>Tanda laboral:</b> @foreach (explode(",",$user->tanda) as $item) {{$item}} @if (!$loop->last),@endif @endforeach</p>
                            <p><b>Comisión:</b> {{$user->comision}}</p>
                            <p><b>Fecha de ingreso:</b> {{$user->fecha_ingreso}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
   <!-- Jquery Core Js -->
   <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

   <!-- Bootstrap Core Js -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

   <!-- Select Plugin Js -->
   <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

   <!-- Slimscroll Plugin Js -->
   <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

   <!-- Waves Effect Plugin Js -->
   <script src="{{ asset('plugins/node-waves/waves.js')}}"></script>

   <!-- Jquery CountTo Plugin Js -->
   <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

   <!-- Morris Plugin Js -->
   <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
   <script src="{{ asset('plugins/morrisjs/morris.js')}}"></script>

   <!-- ChartJs -->
   <script src="{{ asset('plugins/chartjs/Chart.bundle.js')}}"></script>

   <!-- Flot Charts Plugin Js -->
   <script src="{{ asset('plugins/flot-charts/jquery.flot.js')}}"></script>
   <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
   <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
   <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
   <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

   <!-- Sparkline Chart Plugin Js -->
   <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

   <!-- Custom Js -->
   <script src="{{ asset('js/admin.js')}}"></script>
   <script src="{{ asset('js/pages/index.js')}}"></script>

   <!-- Demo Js -->
   <script src="{{ asset('js/demo.js')}}"></script>
@endsection