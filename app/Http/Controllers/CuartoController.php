<?php

namespace App\Http\Controllers;

use App\cuarto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CuartoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cuartos = cuarto::all();
      return view('cuarto.index',compact('cuartos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuarto.create');
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

              $existe=0;

              $numeroC = cuarto::where('numero','=',$request->numero)
                        ->Where('piso','=',$request->piso)
                        ->get();

            $existe=$numeroC->count();

              if ($existe==1)
              {
                $mes="El cuarto ya existe";
              }
              else
              {
                $cuarto=new cuarto;
                $cuarto->numero=$request->numero;
                $cuarto->piso=$request->piso;
                $cuarto->costo=$request->costo;
                $cuarto->save();
                DB::commit();
                  $mes="Ingreso correcto";
              }




             }
             catch (\Exception $e)
             {
                 DB::rollback();
                 $mes=$e->getMessage();
             }
             if ($mes!="Ingreso correcto")
              {
               alert()->error(''.$mes.'', 'Error');
               return redirect('Cuarto');
             }
             else
             {
               alert()-> success(''.$mes.'','Cuarto');
              return redirect('Cuarto');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuarto  $cuarto
     * @return \Illuminate\Http\Response
     */
    public function show(cuarto $cuarto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuarto  $cuarto
     * @return \Illuminate\Http\Response
     */
    public function edit($cuarto)
    {
      $cuarto = cuarto::findOrFail($cuarto);
      return view('cuarto.edit',compact('cuarto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuarto  $cuarto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cuarto)
    {

        $mes="Ingreso";
        DB::beginTransaction();
         try {
               $cuarto=cuarto::findOrFail($cuarto);
               $cuarto->numero=$request->numero;
               $cuarto->piso=$request->piso;
               $cuarto->costo=$request->costo;
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
                 return redirect('Cuarto');
               }
               else
               {
                 alert()-> success(''.$mes.'','Cuarto');
                return redirect('Cuarto');
              }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuarto  $cuarto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cuarto)
    {

        $cuarto = cuarto::findOrFail($cuarto);
        if ($cuarto->activo==0)
         {

          alert()->success('Transaccion', 'No puede eliminar el cuarto, esta en uso');
        }
        else {
          $cuarto->delete();
            alert()->success('Transaccion', 'Transaccion completa');
        }
      return back();
    }

}
