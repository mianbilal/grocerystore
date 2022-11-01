<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
class ShoppingController extends Controller
{
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
        Session::flash('info','Product Added to cart Successfuly.');
        return redirect()->route('cart');
    }

    public function cart(){
        //Cart::remove();
        return view('cart')->with('settings',\App\Models\Setting::first());
    }

    public function cartdelete($id){
        Cart::remove($id);
        Session::flash('info','Product Removed from Cart.');
        return redirect()->back();
    }

    public function cartaddto($id)
    {
        $pdt=\App\Models\Product::find($id);
        $cart=Cart::add([
            'id' =>$pdt->id,
            'name' => $pdt->name,
            'price' => $pdt->price,
            'quantity' => 1,
            'associatedModel' => $pdt
        ]);
        //session()->flash('success', 'Product is Added to Cart Successfully !');
        //Cart::associate($cart->rowId,'\App\Models\Product');
        Session::flash('success','Product Added To Cart.');
        return redirect()->route('cart');
    }

    public function cartdecr($id){
        Cart::update($id, array(
            'id'=>$id,
             'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
          ));
          Session::flash('info','Cart Updated.');
        return redirect()->back();
    }
    public function cartincr($id){
        Cart::update($id, array(
            'id'=>$id,
             'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
          ));
          Session::flash('info','Cart Updated.');
        return redirect()->back();
    }

    public function cartclear(){
        Cart::clear();
        Session::flash('success','cart cleared.');
        return redirect()->route('welcome');
    }
}
