
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" href="{{URL::asset('Images/mphoto.png')}}" sizes="32x32">
    <link href="{{URL::asset('css/prism.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ghpages-materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div class="continer"><br><br><br>
      <div class="row">
        <div class="col s4">

        </div>
        <div class="col s4 center-align ">
            <h1 class="header">Error 403</h1>
        </div>
        <div class="col s4">

        </div>
      </div>
      <div class="row">
        <div class="col s4">

        </div>
        <div class="col s4 center-align ">
        <i class="large material-icons red-text">error_outline</i>
        </div>
        <div class="col s4">

        </div>
      </div>
      <div class="row">
        <div class="col s3">

        </div>
        <div class="col s6 center-align ">
      <h1>{{$msj}}</h1>
        </div>
        <div class="col s3">

        </div>
      </div>
      <div class="row">
        <div class="col s4">

        </div>
        <div class="col s4 center-align ">
          <a href="/home" class="tooltipped btn-floating btn-large waves-effect waves-light red" data-position="bottom" data-delay="50" data-tooltip="Ir a la pagina principal"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="col s4">

        </div>
      </div>
    </div>

  </body>

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
</html>
