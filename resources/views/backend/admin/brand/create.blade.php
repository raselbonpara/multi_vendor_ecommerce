@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success') }}</div>
                @endif    
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/brand/store') }}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option selected disabled>Select A Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Brand  name"/>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-md-3">
              
            </div> 
        </div>
    </div>
</div>
@endsection