<?php
//author: Ricardo Avendaño Peña
namespace App\Http\Controllers;
use App\Client;
use App\Comment;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show()
    {
        //Pagina principal
        return view('checkout.client');
    }

    public function save(Request $request)
    {
        Client::validate($request);
        Client::create($request->only(["first_name", "last_name", "telephone","email"]));
        $clientInfo["client_id"] = Client::all()->last()->getId();
        $clientInfo["first_name"] = $request->first_name;
        $clientInfo["last_name"] = $request->last_name;
        $clientInfo["email"] = $request->email;
        $clientInfo["telephone"] = $request->telephone;
        $clientInfo["item"]["name"] = $request->input('itemName.*');
        $clientInfo["item"]["price"] = $request->input('itemPrice.*');
        $clientInfo["item"]["qnty"] = $request->input('itemQnty.*');
        $clientInfo["total"] = $request->total;
        $clientInfo["total_item"] = $request->total_item;
        $clientInfo["cart_id"] = $request->cart_id;




        return view('checkout.shipping')->with(['clientInfo'=> $clientInfo]);
    }
}
