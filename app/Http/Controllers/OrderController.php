<?php
//author: Ricardo Avendaño Peña
namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        //Pagina principal
        return view('checkout.order');
    }

    public function save(Request $request)
    {
        Order::validate($request);
        Order::create($request->only(["payment_method", "shipping_id","client_id","cart_id"]));
        $request->session()->forget('products');
        return redirect('/index');
    }


}
