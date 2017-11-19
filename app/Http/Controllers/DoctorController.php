<?php

namespace App\Http\Controllers;

use App\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
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
      $doctores = doctor::where('activo','=',1)
                ->get();
      return view('doctor.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('doctor.create');
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

              $doctor=new doctor;
              $doctor->nombre=$request->nombre;
              $doctor->especialidad=$request->esp;
              $doctor->save();

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
               return redirect('Doctor');
             }
             else
             {
               alert()-> success(''.$mes.'','Doctor');
              return redirect('Doctor');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit( $doctor)
    {
      $doctor = doctor::findOrFail($doctor);
      return view('doctor.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor)
    {
      $mes="Ingreso";
      DB::beginTransaction();
       try {

              $doctor=doctor::findOrFail($doctor);
              $doctor->nombre=$request->nombre;
              $doctor->especialidad=$request->esp;
              $doctor->save();

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
               return redirect('Doctor');
             }
             else
             {
               alert()-> success(''.$mes.'','Doctor');
              return redirect('Doctor');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $doctor)
    {
      $doctor=doctor::findOrFail($doctor);
      $doctor->activo=0;
      $doctor->save();

      alert()->success('Transaccion', 'Transaccion completa');
      return back();
    }
}
