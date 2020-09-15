<?php

namespace App\Http\Controllers;
//author: Ricardo Avendaño Peña
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Item;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show($sort)
    {
        $listOfProducts = []; //to be sent to the view
        if ($sort == "lower_price") {
            $listOfProducts["all"] =  Product::orderBy('price', 'ASC')->get(); //trae la busqueda en orden ascendente con orderBy
        } else {
            $listOfProducts["all"] =  Product::orderBy('created_at', 'DESC')->get();
        }
        $listOfProducts["top"] = Product::orderBy('price', 'DESC')->get()->take(2);

        return view('product.showProducts')->with("listOfProducts", $listOfProducts);
    }

    public function addToCart($id, Request $request)
    {

        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);

        return back()->with('success', 'Item created successfully!');
    }

    public function removeCart(Request $request)
    {

        $request->session()->forget('products');
        return redirect()->route('pages.index');
    }


    public function cart(Request $request)
    {
        $products = $request->session()->get("products");
        if ($products) {
            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;
            $data["cantidad"] =  Session::get('products');
            $data["precio_total"] = 0;
            foreach($data["products"] as $product){
                $data["precio_total"] = $data["precio_total"]+$product->getPrice() * $data["cantidad"][$product->getId()];

            }
            return view('product.cart')->with("data", $data);
        }

        return redirect()->route('pages.index');
    }

    public function buy(Request $request)
    {
        $cart = new Cart();
        $cart->setTotal("0");
        $cart->save();
        $cartInfo = [];
        $precioTotal = 0;
        $cartInfo["cart_id"] = $cart->getId();
        $products = $request->session()->get("products");
        if ($products) {
            $keys = array_keys($products);
            for ($i = 0; $i < count($keys); $i++) {

                $item = new Item();
                $item->setProductId($keys[$i]);
                $item->setCartId($cart->getId());
                $item->setQuantity($products[$keys[$i]]);
                $item->save();
                $productActual = Product::find($keys[$i]);
                $cartInfo["item"][$i] = Product::find($keys[$i]);
                $cartInfo["item"][$i]["cantidad"] =  $products[$keys[$i]];
                $precioTotal = $precioTotal + $productActual->getPrice() * $products[$keys[$i]];
            }
            $cartInfo["total_item"] = $i;
            $cartInfo["total"] = $precioTotal;
            $cart->setTotal($precioTotal);
            $cart->save();


        }

        return view('checkout.client')->with("cartInfo", $cartInfo);
    }


    public function showDetails($id)
    {

        $product =  Product::findOrFail($id);
        $product["comments"] =  $product->comments()->where('product_id', $id)->get();
        $product["pgnteComments"] =  $product->comments()->where('product_id', $id)->paginate(3);
        $product["avgRating"] = round($product->comments()->where('product_id', $id)->avg('rating'), 1);
        $product["ttlRating"] = $product->comments()->where('product_id', $id)->count();
        return view('product.showDetails')->with("product", $product);
    }

    public function create($catalogueId)
    {
        return view('product.createProducts')->with('catalogueId',$catalogueId);
    }


    public function save(Request $request)
    {
        Product::validate($request);
        Product::create($request->only(["name", "price", "description", "details", "catalogue_id"]));

        return back()->with('success', 'Item created successfully!');
    }
    public function delete(Request $request)
    {
        Product::destroy($request->only(["id"]));
        return view('product.deletedProducts');
    }
}
