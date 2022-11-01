<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
    
    public function __construct(){
        return $this->middleware('admin');
    }
    
    public function index(){

        return view('admin.settings.index')->with('settings',\App\Models\Setting::first());

    }

    public function update(){
        $this->validate(request(),[
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'message'=>'required',
            'about'=>'required',
            'number'=>'required',

        ]);
        $settings=\App\Models\Setting::first();
        $settings->name=request()->name;
        $settings->address=request()->address;
        $settings->email=request()->email;
        $settings->message=request()->message;
        $settings->about=request()->about;
        $settings->number=request()->number;
        $settings->save();

        Session::flash('success','Site Settings Updated Successfully');
        return redirect()->back();

    }
}

