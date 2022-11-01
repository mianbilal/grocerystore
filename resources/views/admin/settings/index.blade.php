@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Grocery Settings') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('settings.update')}}">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Web Site Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$settings->name}}" placeholder="Enter Product Name" name="name">
                              @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Number</label>
                            <input type="number" class="form-control  @error('number') is-invalid @enderror" value="{{$settings->number}}" step="any"  placeholder="Enter Number" name="number">
                            @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">About Website</label>
                            <input type="text" class="form-control @error('about') is-invalid @enderror"  value="{{$settings->about}}" placeholder="Enter About Website" name="about">
                            @error('about')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$settings->email}}" placeholder="Enter Email Address" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Website Message</label>
                            <input type="text" class="form-control @error('message') is-invalid @enderror" min="0" value="{{$settings->message}}"  placeholder="Enter message of Website" name="message">
                            @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ADDRESS</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{$settings->address}}" placeholder="Enter Webiste Address" name="address">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>                   
                          <button type="submit" class="btn btn-primary">Update Settings</button>
     
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection