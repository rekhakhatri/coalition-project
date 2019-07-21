<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function showProduct(Request $request) {

        $productObject = Storage::get('product.json');

        $products = json_decode($productObject);

        $sum = 0;

       foreach($products as $product)
       {
           $total_value = ($product->quantity)*($product->price);

           $sum = $sum +  $total_value;
       }
     
        return view('project.product.add-product')->with('products',$products)
                                                  ->with('sum',$sum);

    }

    public function addProduct(Request $request) {

        try {

            $productInfo = Storage::disk('local')->exists('product.json') ? json_decode(Storage::disk('local')->get('product.json')) : [];
        
            $inputData = $request->only(['product', 'quantity', 'price']);
           
            $inputData['datetime_submitted'] = date('Y-m-d H:i:s');
 
            array_push($productInfo,$inputData);
    
            Storage::disk('local')->put('product.json', json_encode($productInfo));
 
            return redirect()->route('show.product');
 
        } catch(Exception $e) {
 
            return ['error' => true, 'message' => $e->getMessage()];
 
        }

    }
}
