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
	    <a href="{{route('Cuarto.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>

    <div class="container">
      <div class="row">
        <form  id="formValidate" method="POST" class="col s12" action="{{route('Cuarto.update',$cuarto->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="numero" type="text"  name="numero" class="cnumber" value="{{$cuarto->numero}}">
              <label for="icon_prefix">No Cuarto</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="piso" type="text"  name="piso" class="cnumber" value="{{$cuarto->piso}}">
              <label for="icon_prefix"  >Piso</label>
            </div>
            </div>

            <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">fiber_manual_record</i>
              <input id="costo" type="text"  name="costo" class="cnumber" value="{{$cuarto->costo}}">
              <label for="icon_prefix">Costo</label>
            </div>
          </div>

          <div class="row">
            <p class="center-align">
            <button class="btn waves-effect waves-light  light-blue darken-4" type="submit" name="action">Registrar</button>
            </p>
          </div>


        </form>
        </div>
        </div>
    </div>
</div>

@endsection
