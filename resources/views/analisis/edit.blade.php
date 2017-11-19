@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="center"><br>
      <h5 class="light">Editar Resultado</h5>
    </div>
  </div>

  <div class="card z-depth-4">
		<div class="card-image">
	    <a href="{{route('Analisis.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>

    <div class="container">
      <div class="row">
        <form  id="formValidate" method="POST" class="col s12" action="{{route('Analisis.update',$prueba->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">add_to_queue</i>
              <input id="icon_prefix" type="text"  name="nombre" class="required" disabled  value="{{$prueba->idana}}">
              <label for="icon_prefix">ID Analisis</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">person</i>
              <input id="icon_prefix" type="text"  name="nombre" class="required" disabled value="{{$prueba->idpaci}}">
              <label for="icon_prefix">ID Paciente</label>
            </div>

            </div>
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">library_add</i>
                <input id="rest" type="text"  name="rest" class="required" >
                <label for="icon_prefix">Resultado</label>
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
</div>

@endsection
