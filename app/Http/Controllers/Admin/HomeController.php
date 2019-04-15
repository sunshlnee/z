<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\VueService;
use App\Models\Product\Order;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	private $service;

	public function __construct(VueService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        $orders = null;
    	foreach (Order::all() as $key => $value) {
    		$orders[$key]['id'] = $value->id;
    		$orders[$key]['user'] = User::find($value->user_id)->first();
    		$orders[$key]['order'] = $this->service->orderToJson(json_decode($value->order));
    	}

        return view('admin.home', [
        	'orders' => json_encode($orders) 
        ]);
    }
}
