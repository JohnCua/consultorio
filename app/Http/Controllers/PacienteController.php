<?php

namespace App\Http\Controllers;

use App\paciente;
use Illuminate\Http\Request;
use App\cuarto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
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
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
      $pacientes = paciente::all();
      return view('paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuartos = cuarto::all();
        return view('paciente.create',compact('cuartos'));
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

                $paciente=new paciente;
                $paciente->nombre=$request->nombre;
                $paciente->edad=$request->edad;
                $paciente->fecha_ingreso=$request->fechai;
                $paciente->idcuarto=$request->cuarto;
                $paciente->save();

               $cuarto=cuarto::findOrFail($request->cuarto);
               $cuarto->activo=0;
               $cuarto->save();


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
                 return redirect('Paciente');
               }
               else
               {
                 alert()-> success(''.$mes.'','Paciente');
                return redirect('Paciente');
              }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit( $paciente)
    {
      $cuartos = cuarto::all();
      $paciente = paciente::findOrFail($paciente);
      return view('paciente.edit',compact('paciente','cuartos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $paciente)
    {

    $mes="Ingreso";
    DB::beginTransaction();
     try {
          if ($request->fechaf=="")
          {

          $paciente=paciente::findOrFail($paciente);
          $paciente->nombre=$request->nombre;
          $paciente->edad=$request->edad;
          $paciente->fecha_ingreso=$request->fechai;
          $paciente->idcuarto=$request->cuarto;
          $paciente->save();

          $cuartos = cuarto::all();

          foreach ($cuartos as  $cuarto) {
            $cuarto=cuarto::findOrFail($cuarto->id);
            $cuarto->activo=1;
            $cuarto->save();
          }
           $cuarto=cuarto::findOrFail($request->cuarto);
           $cuarto->activo=0;
           $cuarto->save();
          }
          else
          {
            $paciente=paciente::findOrFail($paciente);
            $paciente->nombre=$request->nombre;
            $paciente->edad=$request->edad;
            $paciente->fecha_ingreso=$request->fechai;
            $paciente->fecha_egreso=$request->fechaf;
            $paciente->idcuarto=$request->cuarto;
            $paciente->activo=0;
            $paciente->save();

           $cuarto=cuarto::findOrFail($request->cuarto);
           $cuarto->activo=1;
           $cuarto->save();
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
             return redirect('Paciente');
           }
           else
           {
             alert()-> success(''.$mes.'','Paciente');
            return redirect('Paciente');
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($paciente)
    {
      $paciente=paciente::findOrFail($paciente);
      $paciente->activo=0;
      $paciente->save();
    }
}
