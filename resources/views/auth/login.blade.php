<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Museo de Historia</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#1b5a6b">


    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ghpages-materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style >

      * {-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;}

      .waves-effect.waves-sbx .waves-ripple{background-color: rgba(2, 86, 156, 1);}
      body{display: flex;min-height: 100vh;flex-direction: column;background: url({{URL::asset('images/cover9.jpg')}}) no-repeat fixed;background-size: cover;background-position: 50%;-webkit-font-smoothing: antialiased;font-smoothing: antialiased;}
      .card{background-color:rgba(255, 255, 255, 0.87);}
      ::-webkit-input-placeholder {color: #302c2c;}

      .input-field div.error
      {
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
    body .menu {position: absolute;width: 100%;background: inherit;}

    body .menu .mainmenu:before
    {
      position: absolute;
      content: "";
      display: block;
      width: 100%;
      height: 100%;
      background: inherit;
      -webkit-filter: blur(3px);
      filter: blur(3px);
    }
  body .menu .mainmenu:after
    {
      clear: both;
      content: "";
      display: block;
    }
  body .menu .mainmenu .menuitem
  {
    float: left;
    width: 10%;
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    cursor: pointer;
    color: white;
    font-size: 1.5rem;
  }
  main {flex: 1 0 auto;}
  .card{background-color:rgba(255, 255, 255, 0.87);}


    </style>
</head>
<nav>
  <div class="nav-wrapper cyan darken-4">


  </div>
</nav>

<body>

<div class="container">


  <br><br><br>

  <div class="row">


    <div class="col m4 s12 l4 offset-l4">

      <div class="card"><br><br>
        <div class="card-content center-align black-text">

          <i class="large material-icons black-text">local_hospital</i>
          <span class="card-title center-align">Consultorio Medico</span>
          <div class="col s8 offset-s2 divider black">

          </div> <br>

          <div class="row ">
            <form id="formValidate" class="col s12 " method="POST" action="{{route('login')}}" >
              {{ csrf_field() }}
              {{ method_field('POST') }}

                <div class="input-field col s12">
                  <input id="name" type="text" name="name" class="required black-text" autocomplete="off" >
                  <label for="email" class="blue-grey-text text-darken-3">Usuario</label>
                </div>

                <div class="input-field col s12">
                  <input id="password" type="password" name="password" class="required">
                  <label class="blue-grey-text text-darken-3" for="password">Password</label>
                </div>

                <div class="input-field col s12">
                  <button class="col s12 btn waves-effect waves-light cyan darken-4" type="submit" name="action">Ingresar</button>
                </div>

            </form>
          </div>
          @if(Session::has('flash_message'))
          <span class="help-block red-text">
              <strong>{{Session::get('flash_message')}}</strong>
          </span>
          @endif
          <br><br>
        </div>
      </div>
    </div>
  </div>


</div>



</body>

<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.timeago.min.js')}}"></script>
<script src="{{URL::asset('js/prism.js')}}"></script>
<script src="{{URL::asset('jade/lunr.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('js/valid.js')}}"></script>
<script src="{{URL::asset('jade/search.js')}}"></script>
<script src="{{URL::asset('bin/materialize.js')}}"></script>
<script src="{{URL::asset('js/init.js')}}"></script>


</html>
