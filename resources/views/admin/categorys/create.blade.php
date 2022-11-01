@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('category.store')}}">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" name="name">
                              @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>              
                          <button type="submit" class="btn btn-primary">Add Category</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection