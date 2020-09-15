<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        //Pagina principal
        return view('pages.index');
    }
    public function goindex()
    {
        //Pagina principal
        return redirect('/index');
    }
    public function contact()
    {
        //Pagina de contacto
        return view('pages.contact');
    }
}
?>