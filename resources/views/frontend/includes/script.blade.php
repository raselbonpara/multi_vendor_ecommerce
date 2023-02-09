<script src="{{ asset('/frontend/assets/') }}/js/main.js"></script>
<!--search jQuery-->
<script src="{{ asset('/frontend/assets/') }}/js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{ asset('/frontend/assets/') }}/js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="{{ asset('/frontend/assets/') }}/js/simpleCart.min.js"></script>
<!-- cart -->
<script defer src="{{ asset('/frontend/assets/') }}/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="{{ asset('/frontend/assets/') }}/css/flexslider.css" type="text/css" media="screen" />
<script src="{{ asset('/frontend/assets/') }}/js/imagezoom.js"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

  <!--mycart-->
  <!--start-rate-->

<!--//End-rate-->
<link href="{{ asset('/frontend/assets/') }}/css/owl.carousel.css" rel="stylesheet">
<script src="{{ asset('/frontend/assets/') }}/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>
  <!--start-rate-->
<script src="{{ asset('/frontend/assets/') }}/js/jstarbox.js"></script>
	<link rel="stylesheet" href="{{ asset('/frontend/assets/') }}/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>