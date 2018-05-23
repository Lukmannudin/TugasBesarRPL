<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chefController extends Controller
{
    public function index()
    {
        $ingredients = DB::table('ingredients')->get();
        return view('chef.index',['ingredients'=>$ingredients]);
    }

    public function order()
    {
        // $orders = DB::table('orders')->get();
        

        $orders = DB::table('orders')
            ->join('tables', 'orders.tableid', '=', 'tables.tableid')
            ->select('orders.*', 'tables.*')
            ->get();

        return view('chef.orders',['orders'=>$orders]);
    }
}
