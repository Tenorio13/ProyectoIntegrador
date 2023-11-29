<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Message;


use App\Category;

class SearchController extends Controller
{
    public function show(Request $request){
        
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', '%'.$query.'%')->paginate(9);
        
        // validacion necesaria para que vaya a la pagina del producto directamente
        if($products->count() == 1){
            $id = $products->first()->id;
            return redirect("products/$id");     # 'products/'.$id
        }     
        return view('search')->with(compact('products','query'));
    }

    public function showuser(Request $request){
        
        $query = $request->input('query');
        
        $clientes = User::where('name', 'LIKE', '%'.$query.'%')->paginate(9);
       
       


        return view('admin.users.usuarios')->with(compact('clientes','query'));
    }
    public function showbuzon(Request $request){
        
        $query = $request->input('query');
        
        $mensajes = Message::where('userName', 'LIKE', '%'.$query.'%')->paginate(9);


        return view('admin.buzon.index')->with(compact('mensajes','query'));
    }
    
    
    public function data(){
        $products = Product::pluck('name');
        return $products;
    }
}
