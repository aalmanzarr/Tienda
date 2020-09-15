<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
//author: Ricardo Avendaño Peña
class Product extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name','price','description','details','catalogue_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($descrpition)
    {
        $this->attributes['description'] = $descrpition;
    }
    public function getDetails()
    {
        return $this->attributes['details'];
    }

    public function setDetails()
    {
        $this->attributes['details'];
    }

    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
            "description" => "required",
            "details" => "required",
            "catalogue_id" => "required"
        ]);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function catalogues(){
        return $this->belongsTo(Catalogue::class , 'catalogue_id');
    }

}
