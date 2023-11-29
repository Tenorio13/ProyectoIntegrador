<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Str;
use  Mail;
use Hash;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
public function postRecover(Request $request){

$user=User::where('email',$request->input('email'))->count();
if($user=='1'){
    $user=User::where('email',$request->input('email'))->first();
$code=rand(100000,999999);

    $data=['name'=>$user->name,'email'=>$user->email,'apellidos'=>$user->apellidos,'code'=>$code];
   $u=User::find($user->id);
   $u->remember_token=$code;
if($u->save()){
    Mail::to($user->email)->send(new UserSendRecover($data));

    return redirect('reset?mail='.$user->email);


}
}
else{
    $notification = "¡El correo no existe!.";
    return back()->with(compact('notification'));
}




}



public function getReset(Request $request){
    $data=['email'=>$request->get('email')];
    $notification = "¡Te enviamos un codigo de viricacion a tu correo!.";

 return view('auth.passwords.email', $data)->with(compact('notification'));

}

public function postReset(Request $request){

        $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->count();
        if($user=='1'){
            $user=User::where('email',$request->input('email'))->where('remember_token',$request->input('codigo'))->first();

            $new_password=Str::random(10);
            $user->password=Hash::make($new_password);
            $user->remember_token=null;

            if($user->save()){
                $data=['name'=>$user->name,'email'=>$user->email,'apellidos'=>$user->apellidos,'password'=>$new_password];

                Mail::to($user->email)->send(new UserSendNewPassword($data));

                $notification = "Te enviamos tu nueva contraseña a tu correo";

                return redirect('/login')->with(compact('notification'));


            }


        }
        else{
            $notification = "El correo o codigo no es el correto";
            return back()->with(compact('notification'));
        }




    }




}
