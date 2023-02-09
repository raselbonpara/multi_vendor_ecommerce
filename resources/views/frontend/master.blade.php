
<!DOCTYPE HTML>
<html>
<head>
<title>Ecommerce Shop</title>
<!--css-->
<link href="{{ asset('/frontend/assets/') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/frontend/assets/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/frontend/assets/') }}/css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    @include('frontend.includes.style')

	@stack('style')
<!--search jQuery-->
     @include('frontend.includes.script')

	 <style>
		.checkout{
			margin-top: 50px;
			margin-bottom: 30px;
			box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
			padding:30px;
		}
	 </style>
<!--//End-rate-->
</head>
<body>
	<!--header-->
		@include('frontend.includes.header')
		<!--header-->
		@yield('content')
		<!--content-->
		@include('frontend.includes.footer')

</body>
</html>