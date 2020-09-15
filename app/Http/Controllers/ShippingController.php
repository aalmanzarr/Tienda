<?php
//author: Ricardo Avendaño Peña
namespace App\Http\Controllers;
use App\Client;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function show()
    {
        //Pagina principal
        return view('checkout.shipping');
    }

    public function save(Request $request)
    {
        $data = [];
        Shipping::validate($request);
        
        Shipping::create($request->only(["adress","city", "country", "state", "zip_code","details","shipping_cost"]));
        $data["client_id"] = $request->client_id;
        $data["first_name"] = $request->first_name;
        $data["last_name"] = $request->last_name;
        $data["email"] = $request->email;
        $data["telephone"] = $request->telephone;
        $data["shipping_id"] = Shipping::all()->last()->getId();
        $data["adress"] = $request->adress;
        $data["country"] = $request->country;
        $data["city"] = $request->city;
        $data["state"] = $request->state;
        $data["details"] = $request->details;
        $data["zip_code"] = $request->zip_code;
        $data["shipping_cost"] = $request->shipping_cost;
        $data["payment_method"] = $request->payment_method;
        $data["item"]["name"] = $request->input('itemName.*');
        $data["item"]["price"] = $request->input('itemPrice.*');
        $data["item"]["qnty"] = $request->input('itemQnty.*');
        $data["total"] = $request->total;
        $data["total_item"] = $request->total_item;
        $data["cart_id"] = $request->cart_id;
        
        return view('checkout.order')->with('data',$data);
    }
}
