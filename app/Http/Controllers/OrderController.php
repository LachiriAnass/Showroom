<?php

namespace App\Http\Controllers;

use App\Order;
use App\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id' , Auth::id() )->orderBy('created_at', 'desc')->get();
        $paintings = Painting::All();

        return view('orders',['orders' => $orders, 'paintings' => $paintings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $orders = Order::where('painting_id',request('painting_id'))
                        ->where('user_id', request('user_id'))
                        ->where('address', request('address'))
                        ->where('country', request('country'))->get();
        if(count($orders)!=0){
            return redirect("/painting/".request('painting_id'))->with('error','Painting already ordered!!');
        }else{
            $order = new Order;
            $order->painting_id = request('painting_id');
            $order->user_id = request('user_id');
            $order->country = request('country');
            $order->address = request('address');
            $order->save();
        }


        return redirect("/painting/$order->painting_id");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
