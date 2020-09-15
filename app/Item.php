<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Cart;

class Item extends Model
{
    //attributes id, product_id, cart_id, quantity created_at, updated_at
    protected $fillable = [
        'quantity', 'product_id', 'cart_id',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($q)
    {
        $this->attributes['quantity'] = $q;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($id)
    {
        $this->attributes['product_id'] = $id;
    }

    public function getCartId()
    {
        return $this->attributes['cart_id'];
    }

    public function setCartId($id)
    {
        $this->attributes['cart_id'] = $id;
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

}
