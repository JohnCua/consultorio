@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="left"><br>
      <h5 class="light">Listado de Pacientes</h5>
    </div>

    <div class="right"><br>
      <a href="{{route('Paciente.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card hoverable z-depth-2">
        <table class="centered highlight responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Nombre</th>
              <th>Edad</th>
              <th>No Cuarto</th>
              <th>Estado</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Egreso</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

            @foreach($pacientes as $paciente)
              <tr>
                <td>{{$paciente->nombre}}</td>
                <td>{{$paciente->edad}}</td>
                <td>{{$paciente->idcuarto}}</td>
                <td>
                  @if ($paciente->activo == 1)
                   Hospitalizado
                   @else
                   De Alta
                   @endif
                </td>
                <td>{{$paciente->fecha_ingreso}} </td>
                <td>{{$paciente->fecha_egreso}} </td>
                <td>
                  <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{route('Paciente.edit',$paciente->id)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                

                </td>
                <form action="{{route('Paciente.destroy',$paciente->id)}}" method="POST">
                  {{csrf_field()}}
                  {{ method_field('DELETE') }}
                    <div id="modal{{$paciente->id}}" class="modal">
                      <div class="modal-content">
                        <h4 class="center-align">Desea eliminar?</h4>
                        <center> <i class="center-align medium material-icons">error_outline</i></center>
                        <p class="center-align">Nota: los cambios no pueden deshacerse </p>
                      </div>

                      <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                        <button class="btn red" type="submit" name="action">Eliminar</button>
                      </div>
                    </div>
                </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
  @include('sweet::alert')
@endsection
