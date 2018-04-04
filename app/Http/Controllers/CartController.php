<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Dish;
use DB;



class CartController extends Controller
{


    public function store(Request $request) {

        //reikia validacijos

        $request->validate([
            'dish_id' => 'required|integer|min:1|max:100000',
        ]);

        $cart =  new Cart();
        if (Auth::check()) {$cart->user_id = Auth::id();} else {$cart->user_id = null;};

        // $cart->user_id = Auth::id();
        $cart->dish_id = $request->dish_id;

        $cart->remember_token = $request->_token;
        $cart->order_id = null;
        $cart->save();

        $dish = Dish::where('id', $request->dish_id)->first();
        $cart->price = $dish->price;

        $cart->dish;


        echo json_encode($cart);

        // return redirect()->route('dishes.index');

    }

    public function index(Request $request) {

        // dd($request);

        $token = $request->session()->get('_token');

        // $dishes = DB::table('dishes')
        //     ->join("carts", "dishes.id", "=", "carts.dish_id")
        //     ->select("dishes.*", "carts.id as cart_id")
        //     ->where('carts.remember_token', $token)
        //     ->andWhere('carts.order_id', null)
        //     ->get();


        $dishes = DB::table('dishes')
            ->join("carts", "dishes.id", "=", "carts.dish_id")
            ->select("dishes.*", "carts.id as cart_id")
            ->where(function ($query) {
                $query->where('carts.remember_token', session()->get('_token'))
                      ->where('carts.order_id', null);
                  })
            ->get();


            //reikia isimti tuos kur carts.order_id nelygu null

        // $carts = Cart::where('remember_token', $token)->get();

        $sumTotal = $dishes->sum('price');

        return view('cart', ['dishes' => $dishes]);

    }

    public function destroy(Request $request) {

        $cart = Cart::where('id', $request->cart_id)->first();

        $cart->delete();
        return redirect()->route('cart');

    }


}
