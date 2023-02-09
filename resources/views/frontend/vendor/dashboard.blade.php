@extends('frontend.master')

@section('content')
  <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
        </div>
  </div>

    <div class="container mt-5" style="height: auto; margin-top: 20px;">

      <nav>
        <ul>
            <li>
                <a href="{{ url('/vendor/orders') }}">Orders</a>
            </li>
            <li>
                <a href="{{ url('/vendor/pending/product') }}">Pending Products</a>
            </li>
            <li>
                <a href="{{ url('/vendor/approved/product') }}">Approved products</a>
            </li>
        </ul>
      </nav>
        <div class="well">
            <h1 class="text-center">Products List</h1>
            <a href="{{ url('/vendor/product/create') }}" class="btn btn-sm btn-success pull-right" style="margin-top: -35px;">Add Product</a>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <img src="{{ asset('/product/'.$product->image) }}" height="50" width="50" />
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>
                            @if ($product->status == 0)
                               <span class="badge badge-danger">Pending</span> 
                            @else
                               <span class="badge badge-success">Approved</span>     
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

