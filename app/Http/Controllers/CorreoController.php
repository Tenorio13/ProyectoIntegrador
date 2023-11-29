<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Mail;

class CorreoController extends Controller
{
   public function correo(){
    return back();
   } 

  
   
   public function store(Request $request){
    $data = array(
        'nombre' => $request->get('name_user'),
        'correo' => $request->get('email'),
        'asunto' => $request->get('asunto'),


        'mensaje' => $request->get('message'),
    );

   Mail::send('mail.mail', $data, function($message) use($data){
       $message->from('al221911809@gmail.com','Geo Plastic')
       ->subject('Geo Plastic');

       $message->to($data['correo'], $data['nombre']);
   });

   if(Mail::failures()){
    // return response()->Fail('Error: Intente más tarde !!!');
    // return view("error");
    return "Error";
}
else{
    // return response()->json('Si, se a enviado el Mensaje !!!');
    $notification = "¡Se envio el mensaje correctamente!.";
    return back()->with(compact('notification'));
}

}
}
