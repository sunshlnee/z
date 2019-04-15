<?php

namespace App\Http\Controllers\Products;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Http\Router\ProductsPath;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    
    public function catalog(ProductsPath $path)
    {
        $categories = $path->category->descendants()->pluck('id');
        
        $categories[] = $path->category->getKey();

        $products = Product::whereIn('category_id', $categories)->paginate(30);

        return view('products.catalog', compact('products'));
    }

    public function index()
    {
        return view('products.home');
    }

    public function show(Product $product)
    {
        return view('products.show', [
        'product' => $product,
          'images' => $product->images(),
            'sizes' => $this->service->getSizes($product),
            'colors' => $this->service->getString($product, 'colors'),
            'fabrics' => $this->service->getString($product, 'fabrics'),
        ]);
    }
}
