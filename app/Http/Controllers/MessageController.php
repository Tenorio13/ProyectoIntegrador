<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MessageController extends Controller
{
    
   
   
            

    public function store(Request $request){



        $message = new Message();
        $message->userName      = $request->input('name_user');
        $message->asunto         = $request->input('asunto');
        $message->email         = $request->input('email');
        $message->message_field = $request->input('message');
        $message->save();

        $notification = "Tu consulta se ha enviado! pronto te contactaremos via email.";
        return back()->with(compact('notification'));
    }
    
    public function destroy( $mensaje){
        $message= Message::find($mensaje);
        $message->delete($mensaje);
        $notification = "¡El  mensaje se eliminado correctamente!.";
        return back()->with(compact('notification'));
    }
   
  
    
}
