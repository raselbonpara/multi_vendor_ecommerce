@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
    @if (session()->has('success'))
        <div class="alert alert-success">{{session()->get('success') }}</div>
    @endif 
       <table class="table table-bordered">
             <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
             </tr>
             @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src="{{ asset('/category/'.$category->image) }}" height="80" width="80"/>
                    </td>
                    <td>
                        <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/category/delete/'.$category->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
             @endforeach   
       </table>
    </div>
</div>
@endsection