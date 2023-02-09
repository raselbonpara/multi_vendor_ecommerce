@extends('frontend.master')

@push('style')
  <style>
        .rating {
        margin-top: 10px;
        border: none;
        float: left;
        }

        .rating > label {
        color: #90A0A3;
        float: right;
        }

        .rating > label:before {
        margin: 5px;
        font-size: 2em;
        font-family: FontAwesome;
        content: "\f005";
        display: inline-block;
        }

        .rating > input {
        display: none;
        }

        .rating > input:checked ~ label,
        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
        color: #F79426;
        }

        .rating > input:checked + label:hover,
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label,
        .rating > input:checked ~ label:hover ~ label {
        color: #FECE31;
        }
  </style>
@endpush

@section('content')
  <!--banner-->
  <div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Single</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						<div class="col-md-9 single-grid">
							<div clas="single-top">
								<div class="single-left">
									<div class="flexslider">
										<ul class="slides">
                                            @foreach(json_decode($product->multi_image) as $gallery)
                                                <li data-thumb="{{ asset('/gallery/'.$gallery) }}">
                                                    <div class="thumb-image"> <img src="{{ asset('/gallery/'.$gallery) }}" data-imagezoom="true" class="img-responsive"> </div>
                                                </li>
                                            @endforeach
											
											
										 </ul>
									</div>
								</div>
								<div class="single-right simpleCart_shelfItem">
									<h4>{{ $product->name }}</h4>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<p class="price item_price">$ {{ $product->price }}</p>
									<div class="description">
										<p><span>Quick Overview : </span>{{ $product->short_description }}</p>
									</div>

                                    <form action="{{ url('/add/to/cart') }}" method="post">
										@csrf
										<input type ="hidden" name="vendor_id" value="{{ $product->vendor_id }}" />
										<input type ="hidden" name="product_id" value="{{ $product->id }}" />
										<input type ="hidden" name="price" value="{{ $product->price }}" />
										<div class="women">
											<h6><a href="{{ url('/product/details/'.$product->id) }}">{{ $product->name }}</a></h6>
											<span class="size">Size : {{ $product->size->name }}</span>
											<p ><em class="item_price">Price : ${{ $product->price }}</em></p>
                                            <input type="number" name="qty" value="1" min="1" />
											@if (auth()->check())
                                              @if ($product->qty > 0)
                                                <button class="btn btn-sm btn-primary" type="submit">Add To Cart</button>
                                              @else
                                                <button class="btn btn-sm btn-primary" type="button">Out Of Stock</button>
                                              @endif
											@else
											 <a href="{{ url('/login') }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
											@endif
									    </div>
									</form>
									
									<!-- <div class="women">
										<span class="size">XL / XXL / S </span>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div> -->
									
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 single-grid1">
							<h3>Recent Products</h3>
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="images/r.jpg" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<span class=" price-in1"> $ 29.00</span>
								</div>	
								<div class="clearfix"> </div>
							</div>
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="images/r1.jpg" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<span class=" price-in1"> $ 19.00</span>
								</div>	
								<div class="clearfix"> </div>
							</div>
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="images/r2.jpg" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<span class=" price-in1"> $ 19.00</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="images/r3.jpg" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div> 
									<span class=" price-in1">$ 45.00</span>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--Product Description-->
						<div class="product-w3agile">
							<h3 class="tittle1">Product Description</h3>
							<div class="product-grids">
								<div class="col-md-4 product-grid">
									<div id="owl-demo" class="owl-carousel">
										<div class="item">
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 29.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r1.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r2.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r3.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1">$ 45.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
										</div>
										<div class="item">
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r4.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 29.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r5.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r2.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ 19.00</span>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="images/r3.jpg" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1">$ 45.00</span>
												</div>	
												<div class="clearfix"> </div>
											</div>
										</div>
									</div>
									<img class="img-responsive " src="images/woo2.jpg" alt="">
								</div>
								<div class="col-md-8 product-grid1">
									<div class="tab-wl3">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
												<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
												<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>

											</ul>
											<div id="myTabContent" class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
													<div class="descr">
														<h4>Suspendisse laoreet, augue vel mattis </h4>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
														<p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
															<div class="video">
															<iframe src="https://player.vimeo.com/video/22158502" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
															</div>
														<ul>
															<li> Twin button front fastening</li>
															<li> Length:65cm</li>
															<li> Regular fit</li>
															<li> Notched lapels</li>
															<li> Internal pockets</li>
															<li> Centre-back vent </li>
															<li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li>
														</ul>
														<p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
													<div class="descr">
														@foreach ($product->reviews as $review)
														<div class="reviews-top">
												
															<div class="reviews-right">
																<ul>
																	<li><a href="#">{{ $review->user->name ?? 'No Name Found' }}</a></li>
																	<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
																</ul>
																<p>{{ $review->message }}</p>
															</div>
															<div class="clearfix"></div>
														</div>
														@endforeach
											
                                                        @if (auth()->check())
                                                        <div class="reviews-bottom">
															<h4>Add Reviews</h4>
															<p>Your email address will not be published. Required fields are marked *</p>
															<p>Your Rating</p>
															
															</div>
															<form action="{{ url('/review/store') }}" method="post">
                                                                @csrf
															<input type ="hidden" name="product_id" value="{{ $product->id }}" />
                                                            <div class="block">
                                                                 <div class="rating">
                                                                    <input type="radio" id="star5" name="rating" value="5" />
                                                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" />
                                                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" />
                                                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" />
                                                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" />
                                                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                                                 </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label>Message</label>
                                                                <textarea class="form-control" rows="5" name="message" placeholder="Enter Your review"></textarea>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
															</form>
														</div>
                                                        @else
                                                         <div class="alert alert-danger">
                                                            <a href="{{ url('/user/login') }}" style="text-align: center; font-size: 24px; color: black; font-weight:600px;">Login</a>
                                                         </div>
                                                        @endif
														
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/p28.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/p27.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/p30.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/p29.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben2">
										<p>OUT OF STOCK</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/s2.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/s1.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/s4.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/s3.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
		</div>
		<!--content-->
@endsection