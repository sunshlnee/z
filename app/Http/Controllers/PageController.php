<?php

namespace App\Http\Controllers;

use App\Models\Product\Category;
use App\Services\VueService;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\Product;

class PageController extends Controller
{
	private $service;

    public function __construct(VueService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $products = Product::all()->where('recommended', 1);
        return view('home', compact('products'));
    }
}
