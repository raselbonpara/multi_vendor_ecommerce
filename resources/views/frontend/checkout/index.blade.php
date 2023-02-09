@extends('frontend.master')

@section('content')
<div class="banner1">
	<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
        <!--banner-->

        <!--content-->
		<div class="content">
			<div class="cart-items">
            <form action="{{ url('/customer/details/for-order') }}" method="post">
                     @csrf
				<div class="container">
					 <h2>My Shopping Bag</h2>
					
				    <div class="cart-header">
						 <table class= "table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>

                            @php
                              $sum = 0;
                              $qty = 0;
                            @endphp

                            @foreach ($products as $cartProduct)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $cartProduct->product ? $cartProduct->product->name: 'No product found' }}</td>
                                <input type="hidden" name="product_id" value="{{ $cartProduct->product_id }}" />
                                <input type="hidden" name="vendor_id" value="{{ $cartProduct->vendor_id }}" />
                                <td>{{ $cartProduct->price }}</td>
                                <td>
                                    <form action="{{ url('/cart/product/update/' .$cartProduct->id) }}" method="post">
                                        @csrf
                                        <input type ="number" name="qty" value="{{ $totalQty = $cartProduct->qty }}" /> <button type="submit" name="btn" class="btn btn-sm btn-success">Update</button>
                                    </form>
                                </td>
                                <td>{{ $totalPrice =  $cartProduct->price * $cartProduct->qty }}</td>
                                <td>
                                    <a href="{{ url('/cart/product/delete/' .$cartProduct->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            @php
                              $sum += $totalPrice;
                              $qty += $totalQty;
                            @endphp

                            @endforeach
                            <tr>
                                <td colspan="3">Sub Total</td>
                                <td colspan="3">{{ $sum }}</td>
                            </tr>
                         </table> 
                    </div>								

                <h2>
                 <center>Shipping and Billing Information</center>
                </h2>
                <hr/>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2"></div>
                            <input type="hidden" name="total_price" value="{{ $sum }}" />
                            <input type="hidden" name="total_qty" value="{{ $qty }}" />
                                <div class="col-md-8">
                                   <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" name="name" class="form-control" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" placeholder="Enter Customer Name" />
                                   </div>
                                   <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" placeholder="Enter Customer Email" />
                                   </div>
                                   <div class="form-group">
                                      <label>Phone</label>
                                      <input type="tel" name="phone" class="form-control" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}" placeholder="Enter Customer Phone" />
                                   </div>
                                   <div class="form-group">
                                      <label>Address</label>
                                      <textarea name="address" class="form-control" placeholder="Enter Customer Address">{{ auth()->check() ? auth()->user()->address : old('address') }}</textarea>
                                   </div>
                                   <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                </div>
                        </form>
                       
                        <div class="col-md-2"></div>
                    </div>
                </div>

	</div>	
 </form>
 </div>
	<!-- checkout -->	
@endsection