@extends('templates.home')
@section('content')
<div class="container ">

  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo Doctor</h5>
    </div>
  </div>

  <div class="card z-depth-4">
    <div class="card-image">
	    <a href="{{route('Doctor.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="container">
        <div class="row">
        <br>
          <form class="col s12" method="POST" action="{{route('Doctor.store')}}" id="formValidate">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">person</i>
                  <input id="icon_prefix" type="text"  name="nombre" class="required">
                  <label for="icon_prefix">Nombre</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">school</i>
                  <input id="esp" type="text"  name="esp" class="required" >
                  <label for="icon_prefix">Especialidad</label>
                </div>

                </div>


              <div class="row">
                <p class="center-align">
                <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Crear</button>
                </p>
              </div>


          </form>
        </div>
      </div>
    </div>


    <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')
    <script type="text/javascript">
    $(document).ready(function() {
     $('select').material_select();
    });

    </script>

@endsection
