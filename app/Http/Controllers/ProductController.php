<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function exportproduct()
	{

   return Excel::download(new ProductsExport,'productos.csv', \Maatwebsite\Excel\Excel::CSV, [
     'Content-Type' => 'text/csv',
]);


  }




    public function index(){
        $allProducts = Product::paginate(6);
        #Inyectamos a la vista, compact crea un arreglo asociativo
      return view("products.productspage")->with(compact('allProducts'));
      // return response()->json(['allProducts' => $allProducts], JsonResponse::HTTP_OK);

    }

    public function show($id){

        $product = Product::find($id);
        $images = $product->getImages;

        $imagesLeft = collect();
        $imagesRight = collect();

        foreach ($images as $key => $image) {
            if($key%2 == 0)
                $imagesLeft->push($image);
            else
                $imagesRight->push($image);
        }
        return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));

    }
}
