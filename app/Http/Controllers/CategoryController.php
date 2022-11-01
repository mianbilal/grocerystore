<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('admin');
    }
     public function index()
    {
        return view('admin.categorys.index')->with('categories', \App\Models\Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //dd($request->all());
                $this->validate($request,[
                    'name'=>'required|unique:categories',
                ]);
                
                $category= new \App\Models\Category;
                $category->name=$request->name;
                $category->save();
                Session::flash('success','Category Created Successfully');
                return redirect()->back();
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
        $category=\App\Models\Category::find($id);
        return view('admin.categorys.edit')->with('category',$category);
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
        $category=\App\Models\Category::find($id);
        $category->name=$request->name;
        $category->save();
        Session::flash('info','Category Updated Successfully');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=\App\Models\Category::find($id);
        
        foreach($category->products as $product){
            $product->delete();
        }
        $category->delete();
        Session::flash('info','Category Deleted Successfully');
        return redirect()->back();
    }
}
