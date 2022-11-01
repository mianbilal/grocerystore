@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Products List') }}</div>

                <div class="card-body">
                    <table id="cat" class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quntity</th>
                            <th scope="col">Categoy</th>
                            <th scope="col">Image</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                          <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->category_id}}</td>
                            <td><img src="{{$product->image}}" alt="{{$product->name}}" width="50" height="50"></td>
                            <td><a href="{{route('product.edit',['id'=>$product->id])}}" type="button" class="btn btn-success">Update</a></td>
                            <td><a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger">X</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection