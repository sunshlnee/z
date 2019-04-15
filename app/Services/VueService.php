<?php

namespace App\Services;

use App\Models\Product\Size;
use App\Models\Product\Product;

class VueService
{
    public function cartToJson($products)
    {
        foreach($products as $product) {

            $product['quantity'] = $product['pivot']['quantity'];

            $product['size'] = Size::find($product['pivot']['size_id'])->title;
            
            $productsJSON[] = $product;
        }

        return $productsJSON;    
    }

    public function orderToJson($products)
    {

        foreach($products as $key => $value) {
        	$a[$key]['product'] = Product::find($value->product_id)->first();
            $a[$key]['size'] = Size::find($value->size_id)->title;
            $a[$key]['quantity'] = $value->quantity;
        }
        
        return $a;    
    }
}
