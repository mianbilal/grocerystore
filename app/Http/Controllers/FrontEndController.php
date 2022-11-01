<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
class FrontEndController extends Controller
{
    public function index(){

        return view('welcome')->with('settings',\App\Models\Setting::first())
                              ->with('categories',\App\Models\Category::orderBy('created_at','desc')->get())
                              ->with('fruits',\App\Models\Category::find(1))
                              ->with('vegitables',\App\Models\Category::find(4));

    }

    public function fruits($id){
        $fruit=\App\Models\Product::find($id);
        return view('fruit')->with('settings',\App\Models\Setting::first())
                                ->with('fruit',$fruit)
                                ->with('fruits',\App\Models\Category::find(1));
    }

    public function vegitables($id){
        $vegitable=\App\Models\Product::find($id);
        return view('vegitable')->with('settings',\App\Models\Setting::first())
                                ->with('vegitable',$vegitable)
                                ->with('vegitables',\App\Models\Category::find(4));
    }

    public function cartadd()
    {
        $pdt=\App\Models\Product::find(request()->f_id);
        $cart=Cart::add([
            'id' =>$pdt->id,
            'name' => $pdt->name,
            'price' => $pdt->price,
            'quantity' => request()->qty,
            'associatedModel' => $pdt
        ]);
        //session()->flash('success', 'Product is Added to Cart Successfully !');
        //Cart::associate($cart->rowId,'\App\Models\Product');
        Session::flash('success','Product Added To Cart.');
        return redirect()->route('cart');
    }
}
