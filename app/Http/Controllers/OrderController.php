<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
        // $books = Book::with(['category', 'subCategory'])->get();

        // return view('management.books.index', compact(['books']));
        $orders = Order::with(['user', 'userAddress', 'orderItems.book'])->orderBy('id', 'desc')
        // ->get();
        ->paginate(10);

        // dd($orders->items());

        return view('management.orders.index', compact('orders'));
    }
}
