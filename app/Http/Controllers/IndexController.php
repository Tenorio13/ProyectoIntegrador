<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use App\Exports\BuzonExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{


    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       //Llama al middleware de autenticacion
       $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $mensajes = Message::paginate(5);


 return view('admin.buzon.index', compact('mensajes'));


     // return response()->json(['mensajes' => $mensajes], JsonResponse::HTTP_OK);

   }







}
