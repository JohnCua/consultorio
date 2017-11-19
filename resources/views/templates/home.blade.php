<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Consultorio Medico</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#1b5a6b">

    <link rel="icon" href="{{URL::asset('Images/mphoto.png')}}" sizes="32x32">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ghpages-materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style media="screen">
      .waves-effect.waves-sbx .waves-ripple {background-color: rgba(2, 86, 156, 1);}
      body {display: flex;min-height: 100vh;flex-direction: column;}
      main {flex: 1 0 auto;}

      .input-field div.error{
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color:#f10d0d;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
      }
      .input-field label.active{
          width:100%;
      }
      .left-alert input[type=text] + label:after,
      .left-alert input[type=password] + label:after,
      .left-alert input[type=email] + label:after,
      .left-alert input[type=url] + label:after,
      .left-alert input[type=time] + label:after,
      .left-alert input[type=date] + label:after,
      .left-alert input[type=datetime-local] + label:after,
      .left-alert input[type=tel] + label:after,
      .left-alert input[type=number] + label:after,
      .left-alert input[type=search] + label:after,
      .left-alert textarea.materialize-textarea + label:after{
          left:0px;
      }
      .right-alert input[type=text] + label:after,
      .right-alert input[type=password] + label:after,
      .right-alert input[type=email] + label:after,
      .right-alert input[type=url] + label:after,
      .right-alert input[type=time] + label:after,
      .right-alert input[type=date] + label:after,
      .right-alert input[type=datetime-local] + label:after,
      .right-alert input[type=tel] + label:after,
      .right-alert input[type=number] + label:after,
      .right-alert input[type=search] + label:after,
      .right-alert textarea.materialize-textarea + label:after{ right:70px;}
      /* label color */
   .input-field label {
     color: #1792a4;
   }
   /* label focus color */
   .input-field input[type=email]:focus + label {color: #1792a4;}
   .input-field input[type=password]:focus + label {color: #1792a4;}
   .input-field input[type=checkbox]:focus + label {color: #1792a4;}
   /* label underline focus color */
   .input-field input[type=email]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
   .input-field input[type=password]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
   .input-field input[type=checkbox]:focus {border-bottom: 1px solid #1792a4;box-shadow: 0 1px 0 0  #1792a4;}
   /* valid color */checkbox
   .input-field .prefix.active {  color: #1792a4;}
    </style>
</head>

<body class="white">
  <header>



    <ul id="dropdown1" class="dropdown-content">
     <!--guest-->
     @guest
      <li><a href="{{ route('login') }}">Ingresar</a></li>
      @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="material-icons">face</i>  {{ Auth::user()->name }}
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="material-icons">keyboard_tab</i>
                          Salir
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endguest
    </ul>




    <nav class="top-nav light-blue darken-4">
      <div class="container">
        <div class="nav-wrapper center"><a class="page-title" href="#">
        <img src="{{URL::asset('')}}" width="330" height="130" alt=""></a>
        <ul class="right" style="margin-top:30px;">
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i style="font-size:30px;" class=" material-icons right">expand_more</i></a></li>
        </ul>
        </div>
      </div>
    </nav>
    <div class="container ">
      <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
      <i class="material-icons">menu</i>
      </a>
    </div>

    <ul id="nav-mobile" class="side-nav fixed">
      <li class="logo"><a id="logo-container" href="" class="brand-logo">
          <img src="{{URL::asset('')}}" style="margin-top:-25px;" width="110" height="110" alt=""></a>
      </li>
      <li class="search">
        <div class="search-wrapper card">
        <input id="search"><i class="material-icons">search</i>
        <div class="search-results"></div>
        </div>
      </li>
      <?php

      $rol=0;
      $irUsuario=Auth::user()->id;

      $permisos= App\permiso::join('users', 'permisos.iduser', '=', 'users.id')
            ->join('roles', 'permisos.idrol', '=', 'roles.id')
            ->select(
                    'roles.id as idpermiso',
                    'roles.nombre as name'
                    )
            ->where('iduser', '=', $irUsuario)
            ->get();
            $asignado=false;
  foreach ($permisos as $permiso)
   {
      if ($permiso->idpermiso==1) {
          $rol =$permiso->idpermiso;
          $asignado=true;
      }
      elseif ($permiso->idpermiso==2 && !$asignado) {
        $rol =$permiso->idpermiso;
        $asignado=true;
      }
      elseif ($permiso->idpermiso==3 && !$asignado) {
        $rol =$permiso->idpermiso;
        $asignado=true;
      }
      elseif ($permiso->idpermiso==4 && !$asignado) {
        $rol =$permiso->idpermiso;
        $asignado=true;
      }
   }
       ?>
       <li class="no-padding">
         <ul class="collapsible collapsible-accordion"><br>
           <li class="bold"><a class="collapsible-header waves-effect waves-sbx"><i class="medium material-icons  blue-grey-text text-darken-4">home</i>Hospedaje</a>
             <div class="collapsible-body">
             <ul>
               @if ($rol === 1)
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.index')}}">   Cuartos         </a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.create')}}">  Nuevo cuarto  </a></li>
               @elseif ($rol=== 2)
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.index')}}">   Cuartos         </a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.create')}}">  Nuevo cuarto  </a></li>
               @elseif ($rol=== 3)
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.index')}}">   Cuartos         </a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Cuarto.create')}}">  Nuevo cuarto  </a></li>
               @elseif ($rol=== 4)
               @endif
             </ul>
             </div>
           </li>
           <div class="divider"></div>
           <li class="bold"><a class="collapsible-header  waves-effect waves-sbx"><i class="medium material-icons  blue-grey-text text-darken-4">local_hotel</i>Pacientes</a>
             <div class="collapsible-body">
               <ul>
               @if ($rol === 1)
               <li><a class="waves-effect waves-sbx" href="{{route('Paciente.index')}}">   Pacientes         </a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Paciente.create')}}">  Nuevo Paciente  </a></li>
               @elseif ($rol=== 2)
               <li><a class="waves-effect waves-sbx" href="{{route('Paciente.index')}}">   Pacientes         </a></li>
                <li><a class="waves-effect waves-sbx" href="{{route('Paciente.create')}}">  Nuevo Paciente  </a></li>
               @elseif ($rol=== 3)
               <li><a class="waves-effect waves-sbx" href="{{route('Paciente.index')}}">   Pacientes         </a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Paciente.create')}}">  Nuevo Paciente  </a></li>
               @endif
               </ul>
             </div>
           </li>
           <div class="divider"></div>
           <li class="bold"><a class="collapsible-header  waves-effect waves-sbx"><i class="medium material-icons  blue-grey-text text-darken-4">people</i>Doctores</a>
           <div class="collapsible-body">
             <ul>
               @if ($rol === 1)
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.index')}}">Doctores</a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.create')}}">Nuevo Doctor</a></li>
               @elseif ($rol=== 2)
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.index')}}">Doctores</a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.create')}}">Nuevo Doctor</a></li>
               @elseif ($rol=== 3)
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.index')}}">Doctores</a></li>
               <li><a class="waves-effect waves-sbx" href="{{route('Doctor.create')}}">Nuevo Doctor</a></li>
               @elseif ($rol=== 4)
               @endif

             </ul>
           </div>
         </li>

             <div class="divider"></div>


             <li class="bold"><a class="collapsible-header waves-effect waves-sbx"><i class="medium material-icons blue-grey-text text-darken-4">note_add</i>Analisis</a>
               <div class="collapsible-body">
                 <ul>
                 @if ($rol === 1)
                  <li><a class="waves-effect waves-sbx" href="{{route('Analisis.index')}}">Listado de analisis</a></li>
                   <li><a class="waves-effect waves-sbx" href="{{route('Analisis.create')}}">Nuevo Analisis</a></li>
                   @elseif ($rol=== 2)
                   <li><a class="waves-effect waves-sbx" href="{{route('Analisis.index')}}">Listado de analisis</a></li>
                    <li><a class="waves-effect waves-sbx" href="{{route('Analisis.create')}}">Nuevo Analisis</a></li>
                   @elseif ($rol=== 3)
                   @elseif ($rol=== 4)

                   @endif


                 </ul>
               </div>
             </li>

             <div class="divider"></div>

         <li class="bold"><a class="collapsible-header waves-effect waves-sbx"><i class="medium material-icons blue-grey-text text-darken-4">account_circle</i>Personal</a>
         <div class="collapsible-body">
           <ul>
           @if ($rol === 1)
           <li><a class="waves-effect waves-sbx" href="{{route('Usuario.index')}}">Usuarios     </a></li>
           <li><a class="waves-effect waves-sbx" href="{{route('Usuario.create')}}">Nuevo usuario </a></li>
           @elseif ($rol=== 2)

           @elseif ($rol=== 3)

           @elseif ($rol=== 4)
                   @endif
           </ul>
         </div>
       </li>




     </ul>
     </li>
     </ul>
     </header>

<main>

  <div class="row">
    <div class="col s12 m9 l10">
      <div class="section scrollspy">

        @yield('content')

      </div>
    </div>

    <div class="col hide-on-small-only m3 l2">
      <div class="toc-wrapper">
        <div style="height: 1px;">

          @yield('sections')

        </div>
      </div>
    </div>
  </div>
</main>

<footer class="page-footer light-blue darken-4">
  <div class="footer-copyright">
    <div class="container  light-blue darken-4">
      © 2017 Consultorio Medico
      <a class="grey-text text-lighten-4 right" href="">All rights reserved.</a>
    </div>
  </div>
</footer>

    <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.timeago.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('js/valid.js')}}"></script>
    <script src="{{URL::asset('js/prism.js')}}"></script>
    <script src="{{URL::asset('jade/lunr.min.js')}}"></script>
    <script src="{{URL::asset('jade/search.js')}}"></script>
    <script src="{{URL::asset('bin/materialize.js')}}"></script>
    <script src="{{URL::asset('js/init.js')}}"></script>
</body>
    <!--  Scripts-->


</html>
