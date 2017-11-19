@extends('templates.home')
@section('content')
<div class="container">

  <div class="row">
    <div class="left"><br>
      <h5 class="light">Listado de pruebas de analisis</h5>
    </div>

    <div class="right"><br>
      <a href="{{route('Analisis.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card hoverable z-depth-2">
        <table class="centered highlight responsive-table">
          <thead class="light-blue darken-1 white-text">
            <tr>
              <th>Analisis</th>
              <th>Paciente</th>
              <th>Fecha prueba</th>
              <th>Resultado</th>
              <th></th>
            </tr>
          </thead>

          <tbody>

            @foreach($pruebas as $prueba)
              <tr>
                <td>{{$prueba->a}}</td>
                <td>{{$prueba->paci}}</td>
                <td>{{$prueba->fecha}}</td>
                <td>{{$prueba->res}}</td>
                <td>
                <a class="tooltipped  btn-floating btn-small waves-effect waves-light light-blue darken-4" data-position="bottom" href="{{route('Analisis.edit',$prueba->idprue)}}" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                </td>
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
