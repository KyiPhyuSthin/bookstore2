<?php

namespace App\Http\Controllers\WEBSITE;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class OrderCheckoutController extends Controller
{
    //
    public function checkout(Request $request)
    {
        $user = User::with("addresses")->find(Auth::user()->id);

        return view("website.checkout", compact("user"));
    }

    public function order(Request $request)
    {
        $orderData = $request->except(["_token", "order_items"]);
        $orderData["user_id"] = Auth::user()->id;
        $order = Order::create($orderData);
        $orderItems = json_decode($request->order_items, true);
        foreach($orderItems as $orderItem){
            $orderItem['order_id'] = $order->id;
            $orderItem['book_id'] = $orderItem['id'];
            unset($orderItem['id']);
            OrderItem::create($orderItem);
        }

        return redirect()->route("website.thank_you");
    }
}
