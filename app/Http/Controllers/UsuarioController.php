<?php

namespace App\Http\Controllers;
use App\User;
use App\role;
use App\permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
  }

  public function index()
  {
      $usuarios = User::all();
      return view('usuario.index',compact('usuarios'));
  }

  public function create()
  {
    $roles = role::all();
    return view('usuario.create',compact('roles'));

  }

  public function store(Request $request)
  {
      $mes="Ingreso";
      DB::beginTransaction();
       try {

              $usuario=new user;
              $usuario->name=$request->usuario;
              $usuario->email=$request->email;
              $usuario->password=bcrypt($request->password);
              $usuario->save();

              $userG = user::where('name','=',$request->usuario)
                        ->Where('email','=',$request->email)
                        ->select('users.id as id')
                        ->get();

              $idUsG=$userG[0];
              $resultadoEidUser = intval(preg_replace('/[^0-9]+/', '', $idUsG), 10);

             $admin=true;
             $encmuseo=true;
             $roles=true;
              foreach ($_POST['roles'] as  $valor)
              {
                if ($admin==true && $valor==1)
               {
                  for ($i=1; $i <4 ; $i++)
                 {
                 $permiso = new permiso;
                 $permiso->idrol=$i;
                 $permiso->iduser = $resultadoEidUser;
                 $permiso->save();
                 }
                $admin=false;
                $encmuseo=false;
                $roles=false;
              }
              elseif($encmuseo==true && $valor==2)
              {
                  for ($i=2; $i <4 ; $i++)
                 {
                 $permiso = new permiso;
                 $permiso->idrol=$i;
                 $permiso->iduser = $resultadoEidUser;
                 $permiso->save();
                 }
               $admin=false;
               $encmuseo=false;
               $roles=false;
              }
              elseif($roles==true)
              {
               $permiso = new permiso;
               $permiso->idrol=$valor;
               $permiso->iduser = $resultadoEidUser;
               $permiso->save();
              }
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
               return redirect('Usuario');
             }
             else
             {
               alert()-> success(''.$mes.'','Usuario');
              return redirect('Usuario');
            }

   }

  public function show(empleado $empleado)
  {
      //
  }

  public function edit($usuario)
  {

    $usuario = User::findOrFail($usuario);
    $idU=$usuario->id;


    $permisos =permiso::join('users', 'permisos.iduser', '=', 'users.id')
        ->join('roles', 'permisos.idrol', '=', 'roles.id')
        ->select(
                'roles.id as idpermiso',
                'roles.nombre as name'
                )
        ->where('iduser', '=', $idU)
        ->get();


    $roles = role::all();

    return view('usuario.edit',compact('usuario','roles','permisos'));
  }

  public function update(Request $request, $usuario)
  {
    $idusuarioE=$usuario;
    $mes="Ingreso";
    DB::beginTransaction();
     try {
         if ($request->password=="")
          {
           $usuario=User::findOrFail($idusuarioE);
           $usuario->name=$request->usuario;
           $usuario->email=$request->email;
           $usuario->save();
         }
         else
          {
           $usuario=User::findOrFail($idusuarioE);
           $usuario->name=$request->usuario;
           $usuario->email=$request->email;
           $usuario->password=bcrypt($request->password);
           $usuario->save();

         }


         DB::table('permisos')->where('iduser', '=', $idusuarioE)->delete();

          foreach ($_POST['roles'] as  $valor)
          {

            $permiso = new permiso;
            $permiso->idrol=$valor;
            $permiso->iduser = $idusuarioE;
            $permiso->save();

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
             return redirect('Usuario');
           }
           else
           {
             alert()-> success(''.$mes.'','Usuario');
            return redirect('Usuario');
          }

  }


  public function destroy(Request $request, $usuario)
  {
    $idusuario=$usuario;

    $permisos =permiso::join('users', 'permisos.iduser', '=', 'users.id')
        ->join('roles', 'permisos.idrol', '=', 'roles.id')
        ->select(
                'roles.nombre as name'
                )
        ->where('iduser', '=', $idusuario)
        ->get();

      $eliminar="si";

    foreach ($permisos as $permiso)
    {
      if ($permiso->name=="Admin")
      {
        $eliminar="no";
      }
    }

    if ($eliminar=="si") {

      DB::table('permisos')->where('iduser', '=', $idusuario)->delete();

      $user = User::findOrFail($idusuario);
      $user->delete();

      alert()->success('Transaccion', 'Transaccion completa');
    }
    else {
    alert()->success('Transaccion', 'No se puede eliminar al administrador');
    }
    return back();
  }
}
