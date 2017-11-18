@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="center"><br>
      <h5 class="light">Editar Usuario</h5>
    </div>
  </div>

  <div class="card z-depth-4">
		<div class="card-image">
	    <a href="{{route('Usuario.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>

    <div class="container">
      <div class="row">
        <form  id="formValidate" method="POST" class="col s12" action="{{route('Usuario.update',$usuario->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">

            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input class="required" id="icon_prefix" type="text"  name="usuario" value="{{$usuario->name}}">
              <label for="icon_prefix">Usuario</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input  id="email" type="email"  name="email" value="{{$usuario->email}}">
              <label for="email" data-error="wrong" >Email</label>
            </div>

            </div>

            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">keyboard</i>
                <input  id="password" type="password"  name="password" >
                <label for="password">Password</label>
              </div>

              <div class="input-field col s6"  >
                <i class="material-icons prefix">person_add</i>
                  <select class="required_option" multiple name="roles[]" >
                    <option value="" disabled selected>Rol</option>
                    @foreach ($roles as $rol)
                      @php $desplegado=false; @endphp
                        @foreach ($permisos as $permiso)
                          @if (($rol->id)==($permiso->idpermiso))
                          <option value="{{$rol->id }}" selected>{{ $rol->nombre}}</option>@php $desplegado=true; @endphp
                          @endif
                      @endforeach
                        @if(!$desplegado)
                        <option value="{{$rol->id }}">{{ $rol->nombre}}</optio>
                        @php $desplegado=true; @endphp
                        @endif
                      @endforeach
                  </select>
                <label>Seleccion de Rol</label>
              </div>
            </div>
            <div class="row">
              <p class="center-align">
              <button class="btn waves-effect waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar</button>
              </p>
            </div>

        </form>
        </div>
        </div>
    </div>
</div>

@endsection
