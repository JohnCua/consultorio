@extends('templates.home')
@section('content')
<div class="container ">

  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo Cuarto</h5>
    </div>
  </div>

  <div class="card z-depth-4">
    <div class="card-image">
	    <a href="{{route('Cuarto.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="container">
        <div class="row">
        <br>
          <form class="col s12" method="POST" action="{{route('Cuarto.store')}}" id="formValidate">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">business</i>
                  <input id="numero" type="text"  name="numero" class="cnumber">
                  <label for="icon_prefix">No Cuarto</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">business</i>
                  <input id="piso" type="text"  name="piso" class="cnumber">
                  <label for="icon_prefix"  >Piso</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">fiber_manual_record</i>
                  <input id="costo" type="text"  name="costo" class="cnumber" >
                  <label for="icon_prefix">Costo</label>
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
