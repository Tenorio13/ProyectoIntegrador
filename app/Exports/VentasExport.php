<?php

namespace App\Exports;

use App\Cart;
use Maatwebsite\Excel\Concerns\FromCollection;

class VentasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cart::all();
    }
}
