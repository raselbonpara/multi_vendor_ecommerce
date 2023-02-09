@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
    @if (session()->has('success'))
        <div class="alert alert-success">{{session()->get('success') }}</div>
    @endif 
       <table class="table table-bordered">
         <form action="{{ url('/orders') }}" method="get">
            @csrf
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="from" placeholder="From date" aria-label="FromDate">
                <span class="input-group-text">To</span>
                <input type="date" class="form-control" name="to" placeholder="To Date" aria-label="To date">

                <button type="submit" class="btn btn-sm btn-success">Submit</button>
            </div>
         </form>
             <tr>
                <th>SL</th>
                <th>Customer Name</th>
                <th>Vendor Name</th>
                <th>product Name</th>
                <th>Product Qty</th>
                <th>Product Price</th>
                <th>Action</th>
             </tr>

             @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->vendor->name }}</td>
                    <td>{{ $order->products->name }}</td>
                    <td>{{ $order->total_qty }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        <a href="{{ url('/order/view') .$order->id}}" class="btn btn-sm btn-info" onclick="window.print()">View</a>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
             @endforeach
             
       </table>
    </div>
    
</div>
@endsection