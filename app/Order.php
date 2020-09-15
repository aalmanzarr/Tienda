<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = [
        'payment_method', 'shipping_id', 'client_id', 'cart_id',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPaymenthMethod()
    {
        return $this->attributes['payment_method'];
    }

    public function setPaymentMethod($payment_method)
    {
        $this->attributes['payment_method'] = $payment_method;
    }


    public static function validate(Request $request){
        $request->validate([
            "payment_method" => "required",
        ]);
    }
    public function client()
    {
        return $this->hasOne('App\Client');
    }
    public function cart()
    {
        return $this->hasOne('App\Cart');
    }
}

