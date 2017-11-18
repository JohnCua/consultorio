@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="center"><br>
      <h5 class="light">Editar Paciente</h5>
    </div>
  </div>

  <div class="card z-depth-4">
		<div class="card-image">
	    <a href="{{route('Paciente.index')}}" class="btn-floating halfway-fab tooltipped waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i></a>
    </div>

    <div class="container">
      <div class="row">
        <form  id="formValidate" method="POST" class="col s12" action="{{route('Paciente.update',$paciente->id)}}"><br>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">person</i>
              <input id="icon_prefix" type="text"  name="nombre" class="required" value="{{$paciente->nombre}}">
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input id="edad" type="text"  name="edad" class="cnumber" value="{{$paciente->edad}}">
              <label for="password">Edad</label>
            </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                  <i class="material-icons prefix">date_range</i>
                  <input name="fechai" type="text" class="datepicker required" value="{{$paciente->fecha_ingreso}}">
                  <label for="dateone">Fecha ingreso</label>
              </div>
              <div class="input-field col s6">
                  <i class="material-icons prefix">date_range</i>
                  <input name="fechaf" type="text" class="datepicker " >
                  <label for="dateone">Fecha egreso</label>
              </div>

            </div>
            <div class="row">
              <div class="input-field col s6"  >
                <i class="material-icons prefix">domain</i>
                <select  name="cuarto">
                  <option value="" disabled selected>Cuarto</option>



                  @foreach ($cuartos as $cuarto)
                    @if ($cuarto->activo == 1)
                    @if (($cuarto->id)==($paciente->idcuarto))
                    <option value="{{$cuarto->id}}" selected>No. {{$cuarto->numero}}, Piso {{$cuarto->piso}} </option>
                      @else
                    <option value="{{$cuarto->id}}" >No. {{$cuarto->numero}}, Piso {{$cuarto->piso}} </option>
                      @endif
                      @else

                      @endif
                  @endforeach



                </select>
                  <label>Seleccion de Cuarto</label>
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
