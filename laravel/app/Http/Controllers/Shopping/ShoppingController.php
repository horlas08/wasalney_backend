<?php

namespace App\Http\Controllers\Shopping;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;

class ShoppingController extends Controller
{

    function addProduct(Request $request){
        $result=addProductShopping($request->productId);
    }
    function getCountBasket(Request $request){
        return getCount();
    }

    function pdf(Request $request){
        $text='سلام';
        $pdf = PDF::loadView('theme.test',compact('text'));
        return $pdf->stream('pdf.pdf');
    }
}
