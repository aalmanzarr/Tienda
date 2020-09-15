<?php

namespace App\Http\Controllers;
use App\Catalogue;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Redis;

class CatalogueController extends Controller
{
    public function show()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Show catalogues";
        $data["catalogues"] =  Catalogue::orderBy('id','ASC')->get(); //trae la busqueda en orden ascendente con orderBy
        return view('catalogue.showCatalogues')->with("data",$data);
    }
    public function showDetails($id)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Show catalogues";
        $data["catalogue"] =  Catalogue::where('id', $id)->get();
        $data["catalogue"]["id"] = $data["catalogue"][0]->getId();
        $data["catalogue"]["name"] = $data["catalogue"][0]->getName();
        $data["catalogue"]["description"] = $data["catalogue"][0]->getDescription();

        return view('catalogue.showCataloguesDetails')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create catalogues";
        $data["catalogues"] = Catalogue::all();

        return view('catalogue.createCatalogues')->with("data",$data);
    }


    public function save(Request $request)
    {
        Catalogue::validate($request);
        Catalogue::create($request->only(["name","description"]));

        return back()->with('success','Item created successfully!');

    }
    public function delete(Request $request)
    {
        Catalogue::destroy($request->only(["id"]));
        return view('catalogue.deletedCatalogues');
    }


}
