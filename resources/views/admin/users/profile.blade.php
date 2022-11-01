@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Edit Your profile') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">User Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="Enter User Name" name="name">
                              @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">User Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}" placeholder="Enter User Email" name="email">
                          @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">User Facebook</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror"  value="{{$user->profile->facebook}}" placeholder="Enter User Facbook Address" name="facebook">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">User Twitter</label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror"  value="{{$user->profile->twitter}}" placeholder="Enter User Twitter Address" name="twitter">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Enter New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password" name="password">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Upadte User Avatar</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                            @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">About User</label>
                            <input type="text" class="form-control  @error('about') is-invalid @enderror"  value="{{$user->profile->about}}" min="0" max="10000" step="any" placeholder="Enter About User" name="about">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>                  
                          <button type="submit" class="btn btn-primary">Upadte Profile</button>
     
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection