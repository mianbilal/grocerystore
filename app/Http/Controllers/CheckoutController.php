<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;
use Mail;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout')->with('settings',\App\Models\Setting::first());
    }

    public function pay()
    {
        //dd(request()->all());
        Stripe::setApiKey('sk_test_kSALyJkyrKsQZ9tmbAiqPfg8');
        $token=request()->stripeToken;
        $charge=Charge::create([
            'amount'=> Cart::getTotal()*100,
            'currency'=>'pkr',
            'description'=>'Buy Your Groceries and Enjoy the Day.',
            'source'=>request()->stripeToken

        ]);
        Cart::clear();
        //Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        Session::flash('success','Payment Successful! Keep Buying from here.');
        return redirect()->route('welcome');
    }

}