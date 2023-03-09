<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Order::all();

        return view('admin.orders.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource    .
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items=DB::table('ordersdetail')
        ->join('orders','ordersdetail.order_id','=','orders.id')
        ->join('products','ordersdetail.product_id','=','products.id')
        ->select('products.*', 'ordersdetail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        return view('admin.orders.orderdetail',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
