<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Shipping extends Model
{
    protected $fillable = [
        'shipping_cost','country', 'city', 'zip_code', 'adress', 'details', 'state'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getAdress()
    {
        return $this->attributes['adress'];
    }
    public function setAdress($adress)
    {
        $this->attributes['adress'] = $adress;
    }
    public static function validate(Request $request){
        $request->validate([
            
            "adress" => "required",
            "zip_code" => "numeric",
            "city" => "required",
            "country" => "required",
            "state" => "required",
            "shipping_cost" => "required|numeric",
            "payment_method" => "required",

        ]);
    }
}

