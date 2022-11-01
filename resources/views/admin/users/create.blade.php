@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">User Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter User Name" name="name">
                              @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">User Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter User Email" name="email">
                          @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">User Facebook</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" placeholder="Enter User Facbook Address" name="facebook">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">User Twitter</label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" placeholder="Enter User Twiter Address" name="twitter">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">About User</label>
                            <input type="text" class="form-control  @error('about') is-invalid @enderror" min="0" max="10000" step="any" placeholder="Enter About User" name="about">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>                  
                          <button type="submit" class="btn btn-primary">Add User</button>
     
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection