@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Categories List') }}</div>

                <div class="card-body">
                    <table id="cat" class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                          <tr>
                            <td>{{$category->name}}</td>
                            <td><a href="{{route('category.edit',['id'=>$category->id])}}" type="button" class="btn btn-success">Update</a></td>
                            <td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">X</td>
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