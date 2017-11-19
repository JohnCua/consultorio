<?php

namespace App\Http\Controllers;

use App\analisi;
use App\paciente;
use App\doctor;
use App\prueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AnalisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
      $pruebas = prueba::join('analisis', 'pruebas.idana', '=', 'analisis.id')
          ->join('pacientes', 'pruebas.idpaci', '=', 'pacientes.id')
          ->join('doctors', 'pruebas.iddoc', '=', 'doctors.id')
          ->select(
                  'analisis.id as anal',
                  'analisis.nombre as a',
                  'pruebas.resultado as res',
                  'pruebas.fecha as fecha',
                  'pruebas.id as idprue',
                  'pacientes.nombre as paci'
                  )
          ->get();
         return view('analisis.index',compact('pruebas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pacientes = paciente::all();
      $doctores = doctor::all();
      return view('analisis.create',compact('pacientes','doctores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $mes="Ingreso";
      DB::beginTransaction();
       try {
              $analisis = new analisi;
              $analisis->nombre = $request->nombre;
              $analisis->descripcion = $request->desc;
              $analisis->costo = $request->costo;
              $analisis->save();

              $analisisG = analisi::where('nombre','=',$request->nombre)
                        ->Where('costo','=',$request->costo)
                        ->select('analisis.id as id')
                        ->get();

              $idAnG=$analisisG[0];

              $resultadoEidAn = intval(preg_replace('/[^0-9]+/', '', $idAnG), 10);

              foreach ($_POST['pacientes'] as  $valor)
              {
               $prueba = new prueba;
               $prueba->idpaci=$valor;
               $prueba->idana =$resultadoEidAn;
               $prueba->iddoc =  $request->doc;
               $prueba->resultado =  $request->rest;
               $prueba->fecha = $request->fechai;
               $prueba->save();
            }

              DB::commit();

              $mes="Ingreso correcto";
             }
             catch (\Exception $e)
             {
                 DB::rollback();
                 $mes=$e->getMessage();
             }
             if ($mes!="Ingreso correcto")
              {
               alert()->error(''.$mes.'', 'Error');
               return redirect('Analisis');
             }
             else
             {
               alert()-> success(''.$mes.'','Analisis');
              return redirect('Analisis');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\analisi  $analisi
     * @return \Illuminate\Http\Response
     */
    public function show(analisi $analisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\analisi  $analisi
     * @return \Illuminate\Http\Response
     */
    public function edit($analisi)
    {
        $prueba = prueba::findOrFail($analisi);
        return view('analisis.edit',compact('prueba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\analisi  $analisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $analisi)
    {
      $mes="Ingreso";
      DB::beginTransaction();
       try {
             $prueba=prueba::findOrFail($analisi);
             $prueba->resultado=$request->rest;
             $prueba->save();

              DB::commit();

              $mes="Ingreso correcto";
             }
             catch (\Exception $e)
             {
                 DB::rollback();
                 $mes=$e->getMessage();
             }
             if ($mes!="Ingreso correcto")
              {
               alert()->error(''.$mes.'', 'Error');
               return redirect('Analisis');
             }
             else
             {
               alert()-> success(''.$mes.'','Analisis');
              return redirect('Analisis');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\analisi  $analisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(analisi $analisi)
    {
        //
    }
}
