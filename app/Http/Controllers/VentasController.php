<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Illuminate\Http\JsonResponse;
use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;


class ventasController extends Controller
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
    public function ventas()
    {
        // Assuming you want to filter by dates in 2023


        $compras = Cart::paginate(10);

       return view('admin.venta.ventas', compact('compras'));

       // return response()->json(['compras' => $compras], JsonResponse::HTTP_OK);
    }




   //







}
