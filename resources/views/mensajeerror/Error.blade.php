@extends('templates.home')
@section('title', 'Error')
@section('content')
  <div class="row">
    <div class="center">

    </div>
  </div>
  <div class="row">
    <div class="center">

         <div class="col s6 card z-depth-4 offset-s3"> <!-- Borde -->
           <div class="card-image">

		       </div>
           <div class="row">
             <!-- FORMULARIO DE PIEZAS -->

             <br>
                 <h5 class="light">Error</h5>
                 
                 <h3 class="light">403</h3>
                 <br>
                 <h5 class="light"> {{$msj}}</h5>
                 <br>


           </div>
       </div>
  </div>
</div>
<script src="{{URL::asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')
@endsection
@section('section')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Tipo de pieza:</strong>Es una categoria de donde pertenece la pieza. Ej: Pieza de ferrocarril pertenece al tipo Ferrocarril</p>
  </div>
@endsection
