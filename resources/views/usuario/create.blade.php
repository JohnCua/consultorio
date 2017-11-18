@extends('templates.home')
@section('content')
<div class="container ">

  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo Usuario</h5>
    </div>
  </div>

  <div class="card z-depth-4">
    <div class="card-image">
	    <a href="{{route('Usuario.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="container">
        <div class="row">
        <br>
          <form class="col s12" method="POST" action="{{route('Usuario.store')}}" id="formValidate">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">person_pin</i>
                  <input id="icon_prefix" type="text"  name="usuario" class="required">
                  <label for="icon_prefix">Usuario</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">email</i>
                  <input id="email" type="email"  name="email" class="required">
                  <label for="email" data-error="wrong" >Email</label>
                </div>


                </div>
                <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">keyboard</i>
                  <input id="password" type="password"  name="password" class="required" >
                  <label for="password">Password</label>
                </div>

                <div class="input-field col s6"  >
                  <i class="material-icons prefix">person_add</i>

                  <select multiple name="roles[]">
                    <option value="" disabled selected>Rol</option>
                    @foreach ($roles as $rol)
                      <option value="{{$rol->id}}">{{ $rol->nombre}}</option>
                    @endforeach
                  </select>

                    <label>Seleccion de Rol</label>
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
