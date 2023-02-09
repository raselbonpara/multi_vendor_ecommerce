@extends('frontend.master')

@section('content')
  <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Pending Products</span></h3>
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
            <h1 class="text-center">Pending List</h1>
            
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <img src="{{ asset('/product/'.$product->image) }}" height="50" width="50" />
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

