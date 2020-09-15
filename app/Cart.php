<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Item;

//author: Ricardo Avendaño Peña
class Cart extends Model
{
    //attributes id, total, created_at, updated_at
    protected $fillable = ['total'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['name'];
    }

    public function SetTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }

}
