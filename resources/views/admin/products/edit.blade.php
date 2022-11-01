@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Update Product') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('product.update',['id'=>$product->id])}}" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Prouct Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}" name="name">
                              @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Product Description</label>
                          <textarea class="form-control  @error('description') is-invalid @enderror" value="{{$product->description}}" name="description">
                          </textarea>
                          @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Price</label>
                            <input type="number" class="form-control  @error('price') is-invalid @enderror" min="0" max="10000" step="any" value="{{$product->price}}" name="price">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" min="0" value="{{$product->quantity}}" name="quantity">
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="category" class="form-label">Prodcut Catgeory</label>
                            <select class="form-select" name="category_id" id="category">
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>                   
                          <button type="submit" class="btn btn-primary">Update Product</button>
     
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection