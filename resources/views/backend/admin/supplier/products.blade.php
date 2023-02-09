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
                <th>Image</th>
                <th>Vendor Name</th>
                <th>Product Name</th>
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
                            @if ( $product->status == 0)
                                <span class="badge badge-danger">Pending</span> 
                            @else
                                <span class="badge badge-success">Approved</span>     
                            @endif
                         </td>
                        <td>
                            @if ( $product->status == 0)
                                <a href="{{ url('/vendor/product/approved/' .$product->id) }}" class="btn btn-sm btn-success">Approve</a> 
                            @else
                                <a href="{{ url('/vendor/product/pending/' .$product->id) }}" class="btn btn-sm btn-warning">Pending</a>     
                            @endif
                                <a href="{{ url('/vendor/product/delete/' .$product->id) }}" class="btn btn-sm btn-danger">Delete</a>    
                        </td>
                    </tr>
                @endforeach
       </table>
    </div>
</div>
@endsection