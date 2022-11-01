<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct(){
        return $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index')->with('users',\App\Models\User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('users',\App\Models\User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',

        ]);
        $user=\App\Models\User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')

        ]);
        $profile=\App\Models\Profile::create([
            'user_id'=>$user->id,
            'about'=>$request->about,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'avatar'=>'uploads/avatars/1.png'

        ]);
        Session::flash('success','User Created Successfully');
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\App\Models\User::find($id);
        $user->profile->delete();
        $user->delete();

        Session::flash('info','User Deleted Successfuly');
        return redirect()->back();
    }

    public function admin($id){
        $user=\App\Models\User::find($id);
        $user->admin=1;
        $user->save();
        Session::flash('success','Now This User is made Administrator of this Grocery Management System');
        return redirect()->back();
    }
    public function notadmin($id){
        $user=\App\Models\User::find($id);
        $user->admin=0;
        $user->save();
        Session::flash('success','Now This User is Not Administrator of this Grocery Management System');
        return redirect()->back();
    }
}
