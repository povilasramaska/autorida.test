<?php

//virtuali direktorija-kelias
namespace App\Http\Helpers;
use App\Cart as CartModel;

class Cart {

    public static function count() {

        $token = csrf_token();
        $count = CartModel::where('remember_token', $token)->whereNull('order_id')->count();
        return $count;

    }


    public static function total() {

        $token = csrf_token();
        $items = CartModel::where('remember_token', $token)->whereNull('order_id')->get();
        $sumTotal = 0;

        foreach ($items as $cart) {
            $sumTotal += $cart->dish->price;
        }

        return $sumTotal;

    }

    public static function tax() {

        $vat = 0.21;

        $total = Cart::total();
        $tax_amount = round(($total - $total/(1 + $vat)), 2);

        return $tax_amount;


        // $token = csrf_token();
        // $items = CartModel::where('remember_token', $token)->whereNull('order_id')->get();
        // $sumTotal = 0;
        //
        // foreach ($items as $cart) {
        //     $sumTotal += $cart->dish->price;
        // }

        return $sumTotal;

    }



}




 ?>
