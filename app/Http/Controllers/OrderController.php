<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Helpers\Cart;
use App\Http\Helpers\Order as OrderHelper;
use App\Order;
use App\Cart as Cartmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Novanti\LaravelPDF\PDFFacade as PDF;


// namespace App\Http\Helpers;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', Auth::user()->id)->get();
        }
            return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $token = $request->session()->get('_token');

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total_amount += Cart::total();
        $order->tax_amount = Cart::tax();
        $order->save();

        $carts = Cartmodel::where('remember_token', $token)->whereNull('order_id');
        $carts->update(['order_id' => $order->id]);

        Mail::to($request->user())->send(new OrderCreated($order));

        $request->session()->flash('success', 'Thank You for Your order!');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
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
        $order->delete();
        return redirect()->route('orders.index');
    }


    public function invoice(Order $order) {

        return PDF::loadHTML(view('orders/invoice', ['order' => $order]))->pageSize('A4')->encoding('UTF-8')->stream('');

    }




}
