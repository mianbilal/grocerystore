@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Regsitered Users List') }}</div>

                <div class="card-body">
                    <table id="cat" class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td><img src="{{$user->profile !== null ? asset($user->profile->avatar) : asset('path-to-default-image')}}" alt="" width="50" height="50"></td>
                            <td>
                              @if($user->admin&&Auth::id()==$user->id)
                              <a href="#" type="button" class="btn btn-info">Admin</a>
                              @elseif($user->admin)
                              <a href="{{route('user.not.admin',['id'=>$user->id])}}" type="button" class="btn btn-danger">Remove Permissions</a>
                              @else
                              <a href="{{route('user.admin',['id'=>$user->id])}}" type="button" class="btn btn-success">Make Admin</a>
                              @endif
                            </td>
                            <td>
                              @if(Auth::id()!==$user->id)
                              <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger">X</a>
                              @endif
                            </td>
                              
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