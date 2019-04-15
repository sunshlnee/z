<?php

namespace App\Http\Controllers\Products;

use App\Models\User;
use App\Services\VueService;
use Illuminate\Http\Request;
use App\Models\Product\Size;
use App\Models\Product\Card;
use App\Models\Product\Order;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
    private $service;

    public function __construct(VueService $service)
    {
        $this->service = $service;
    }

    public function add($product, $size)
    {
        Auth::user()->addToCard($product, $size);
    }

    public function remove($productID, $id)
    {
        Auth::user()->removeFromCard($id);
    }

    public function cartCount()
    {
        return Auth::user()->cartCount();
    }

    public function reloadCart()
    {
        if (Auth::check()) {

            $products = Auth::user()->cards()->get()->toArray();
            return $this->service->cartToJson($products);    
        }
    }

    public function makeOrder()
    {       
        return Order::create([
            'user_id' => Auth::id(),
            'order' => Card::where('user_id', Auth::id())->get()->toJson()
        ]);
    }

    public function removeOrder($id)
    {       
        return Order::find($id)->delete();
    }
}   
