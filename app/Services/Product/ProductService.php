<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Models\Product\PhotoPreview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function create(Request $request)
    {
        $product = Product::create($request->all());
        $product->setSlug();
        $product->setSizes($request->sizes);
        $product->setColors($request->colors);
        $product->setFabrics($request->fabrics);
        $product->setMainPhotos($request->photos);
        $product->setPreviewPhoto($request->photo);
        $product->saveOrFail();
        return $product;
    }

    public function edit(Product $product, Request $request)
    {
        $product->update($request->all());
        $product->setSizes($request->sizes);
        $product->setFabrics($request->fabrics);
        $product->setColors($request->colors);
        $product->saveOrFail();
        return $product;
    }
    
    public function getString(Product $product, $entity)
    {
        $entity = $product->$entity()->pluck('title', 'id')->all();
        $string = null;

        foreach ($entity as $key => $value) {
           $string =  $string . $value . ', ';
        }
        
        return substr($string, 0, -2);
    }

    public function getSizes($product)
    {
        $json = '[';

        if ($result = $product->sizes()->pluck('title', 'id')->all()) {

            foreach($result as $key => $value) {
                $json .= "{\"value\": $key, \"text\": \"$value\"},";
            }

            return substr($json, 0, -1) .']';
        }

        return $json . "]";
    }
}   
