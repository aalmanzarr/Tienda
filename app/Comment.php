<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Http\Request;
class Comment extends Model
{
    //attributes id, description, product_id, created_at, updated_at
    protected $fillable = ['email','name','description', 'product_id','rating'];

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
    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($pId)
    {
        $this->attributes['product_id'] = $pId;
    }
    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRaing()
    {
        $this->attributes['rating'];
    }
    

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "rating" => "required|numeric|gt:0|lt:6",
            "description" => "required"
        ]);
    }
}
