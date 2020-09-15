<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name','description'];

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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($descrpition)
    {
        $this->attributes['description'] = $descrpition;
    }
    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

}
