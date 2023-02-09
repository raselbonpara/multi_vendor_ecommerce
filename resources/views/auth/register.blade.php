@extends('frontend.master')

@section('content')
<div class="banner1">
			<div class="container">
				<h3><a href="{{ url('/') }}">Home</a> / <span>User Authentication</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="container" style="height: auto;">
			<div class="card">
				<div class="card-body">
					@if (session()->has('success'))
						<div class="alert alert-success">{{session()->get('success') }}</div>
					@endif 
					@if (session()->has('error'))
						<div class="alert alert-danger">{{session()->get('error') }}</div>
					@endif    
					<div class="col-lg-12 checkout">
						<div class="row">
						   <div class="col-md-6">
				               <h3>Login</h3>
							   <form action="{{ route('login') }}" method="post">
								@csrf 
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email" />
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
								</div>
								<button type="submit" name="btn" class="btn btn-primary">Login</button>
							   </form>
				           </div>
						   <div class="col-md-6">
						      <h3>Registration</h3>
							  <form action="{{ route('register') }}" method="post" >
								@csrf 
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Your Full Name" />
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email" />
								</div>

								<div class="form-group">
									<label>Phone</label>
									<input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone number" />
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea  name="address" class="form-control" rows="5" placeholder="Enter Your Address"></textarea>
								</div>


								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
								</div>

								
								<button type="submit" name="btn" class="btn btn-primary">Register</button>
							   </form>

				           </div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection