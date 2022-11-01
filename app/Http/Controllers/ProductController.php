<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
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
        return view('admin.products.index')->with('products', \App\Models\Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category=\App\Models\Category::all();
        if($category->count()==0){
            Session::flash('info','You must have some caetgory to add a product.');
            return redirect()->back();
        } 
        return view('admin.products.create')->with('categories',\App\Models\Category::all());
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
            'name'=>'required|unique:products',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'required|image',
            'category_id'=>'required'
        ]);

        $image=$request->image;
        $image_new_name=time().$image->getClientOriginalName();
        $image->move('uploads/products', $image_new_name);
        $product=\App\Models\Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'image'=>'uploads/products/'.$image_new_name,
            'category_id'=>$request->category_id,
        ]);
        Session::flash('success','Product Created Successfully');
        return redirect()->route('products');
        
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
        $product=\App\Models\Product::find($id);
        return view('admin.products.edit')->with('product',$product)->with('categories',\App\Models\Category::all());
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
            //dd($request->all());
            $this->validate($request,[
                'name'=>'required',
                'description'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'category_id'=>'required'
            ]);
            $product=\App\Models\Product::find($id);
            if($request->hasFile('image')){
                    $image=$request->image;
                    $image_new_name=time().$image->getClientOriginalName();
                    $image->move('uploads/products/', $image_new_name);
                    $product->image='uploads/products/'.$image_new_name;
            }
                $product->name=$request->name;
                $product->description=$request->description;
                $product->price=$request->price;
                $product->quantity=$request->quantity;
                $product->category_id=$request->category_id;
                $product->save();
            
            Session::flash('success','Product Updated Successfully');
            return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=\App\Models\Product::find($id);
        $category->delete();
        Session::flash('info','Category Deleted Successfully');
        return redirect()->back();
    }
}
