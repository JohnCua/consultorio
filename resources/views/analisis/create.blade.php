@extends('templates.home')
@section('content')
<div class="container ">

  <div class="row">
    <div class="center">
      <h5 class="light">Nuevo Analisis</h5>
    </div>
  </div>

  <div class="card z-depth-4">
    <div class="card-image">
	    <a href="{{route('Analisis.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>
      <div class="container">
        <div class="row">
        <br>
          <form class="col s12" method="POST" action="{{route('Analisis.store')}}" id="formValidate">
            {{ csrf_field() }}
            {{ method_field('POST') }}
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">add_to_queue</i>
                  <input id="icon_prefix" type="text"  name="nombre" class="required">
                  <label for="icon_prefix">Nombre</label>
                </div>

                <div class="input-field col s6">
                  <i class="material-icons prefix">description</i>
                  <input id="desc" type="text"  name="desc" >
                  <label for="icon_prefix">Descripcion</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">fiber_manual_record</i>
                  <input id="costo" type="text"  name="costo" class="cnumber required"  >
                  <label for="icon_prefix">Costo</label>
                </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                      <i class="material-icons prefix">date_range</i>
                      <input name="fechai" type="text" class="datepicker required">
                      <label for="dateone">Fecha Analisis</label>
                  </div>
                  <div class="input-field col s6">
                    <i class="material-icons prefix">library_add</i>
                    <input id="rest" type="text"  name="rest" >
                    <label for="icon_prefix">Resultado</label>
                  </div>

                </div>
                <div class="row">
                  <div class="input-field col s6"  >
                    <i class="material-icons prefix">group</i>
                    <select multiple name="pacientes[]" class="required">
                      <option value="" disabled selected>Pacientes</option>
                      @foreach ($pacientes as $paciente)
                      @if ($paciente->activo == 1)
                       <option value="{{$paciente->id}}">{{$paciente->nombre}} </option>
                       @else

                       @endif
                      @endforeach
                    </select>
                      <label>Seleccion de Pacientes</label>
                  </div>


                  <div class="input-field col s6"  >
                    <i class="material-icons prefix">person</i>
                    <select  name="doc" class="required">
                      <option value="" disabled selected>Doctores</option>
                      @foreach ($doctores as $doctor)
                      @if ($doctor->activo == 1)
                       <option value="{{$doctor->id}}">{{$doctor->nombre}} </option>
                       @else

                       @endif
                      @endforeach
                    </select>
                      <label>Seleccion de Doctor</label>
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
