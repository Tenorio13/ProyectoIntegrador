<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Hash;
use  Mail;
use Illuminate\Support\Str;
use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Mail\UserSendNewPassword;
class UserController extends Controller
{




  public function store(Request $request){
    $user=User::where('email',$request->input('email'))->count();
    if($user=='1'){
        $user=User::where('email',$request->input('email'))->first();
      $notification = "¡El usuario ya esta registrado.";
      return back()->with(compact('notification'));


  }else{

    $Users = new User();

    $Users->name      = $request->input('name');
    $Users->apellidos         = $request->input('apellidos');
    $Users->tel        = $request->input('tel');
    $Users->email        = $request->input('email');
    $Users->admin       = $request->input('admin');

    $new_password=Str::random(10);
    $Users->password=Hash::make($new_password);
    $Users->remember_token=null;

    if($Users->save()){

      $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->count();
      if($user=='1'){
          $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->first();

          $data=['name'=>$user->name,'email'=>$user->email,'apellidos'=>$user->apellidos,'password'=>$new_password];

          Mail::to($user->email)->send(new UserSendNewPassword($data));

          $notification = "Usuario registrado con exito sus datos se enviaron a su correo";
          return back()->with(compact('notification'));
      }



    }



  }
}

    public function users()
   {
    $query = '';


       $clientes = User::paginate(4);
 return view('admin.users.usuarios', compact('clientes','query'));

   }
   public function index()
   {

    $user = User::all();

    return view('admin.users.create');
   // return response()->json(['user' => $user], JsonResponse::HTTP_OK);

   }

   public function destroy( $usuario){


    $clientes= User::find($usuario);



  $clientes->delete($usuario);
  $notification = "¡El usuario se elemino correctamente!.";
  return back()->with(compact('notification'));
}




    public function update(Request $request, $id){

      $Users = User::find($id);


      $Users->name      = $request->input('name');
      $Users->apellidos         = $request->input('apellidos');
      $Users->tel        = $request->input('tel');
      $Users->email        = $request->input('email');

      $Users->admin       = $request->input('admin');
      $new_password=Str::random(10);
      $Users->password=Hash::make($new_password);
      $Users->remember_token=null;



      if($Users->save()){

        $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->count();
        if($user=='1'){
            $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->first();

            $data=['name'=>$user->name,'email'=>$user->email,'apellidos'=>$user->apellidos,'password'=>$new_password];

            Mail::to($user->email)->send(new UserSendNewPassword($data));

            $notification = "Se actualizaron los datos con exito ,Los datos se enviaron al   correo del usuario con modificación";
            return redirect('admin/usuarios')->with(compact('notification'));

        }




    }
  }

    public function edit($id_user){

      $user = User::find($id_user);
      return view('admin.users.edituser')->with(compact('user'));
  }


}

