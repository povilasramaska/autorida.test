<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use SoftDeletes;

    protected $dates = ['deteled_at'];

    public function carts() {
        return $this->hasMany('App\Cart', 'order_id', 'id');
    }

    public function users() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }




}
