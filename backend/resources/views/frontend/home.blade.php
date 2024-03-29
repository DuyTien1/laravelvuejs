@extends('clientlayout')
@section('slider')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="slider-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#slider-carousel" data-slide-to="1"></li>
					<li data-target="#slider-carousel" data-slide-to="2"></li>
					<li data-target="#slider-carousel" data-slide-to="3"></li>
				</ol>
			
				<div class="carousel-inner">
					<div class="item active">
						<div class="col-sm-6">
							<h1><span>E</span>-Shop Real</h1>
							<p>Shop bán nước hoa chính hãng uy tín hàng đầu Việt Nam. </p>
							<p>Có nhiều thương hiệu nổi tiếng khắp toàn cầu tha hồ lựa chọn. </p>
							<p>Đảm bảo sản phẩm đến được tay khách hàng nhanh chóng và tiện lợi. </p>
							<!-- <button type="button" class="btn btn-default get">Mua Ngay</button> -->
						</div>
						<div class="col-sm-6">
							<img src="{{('images/banner1.jpg')}}" class="girl img-responsive" alt="" />
							<!-- <img src="{{('frontend/images/pricing.png')}}"  class="pricing" alt="" /> -->
						</div>
					</div>
					<div class="item">
						<div class="col-sm-6">
							<h1><span>E</span>-Shop Real</h1>
							<p>Shop bán nước hoa chất lượng đảm bảo hàng đầu Việt Nam. </p>
							<p>Có nhiều thương hiệu nổi tiếng khắp toàn cầu tha hồ lựa chọn. </p>
							<p>Đảm bảo sản phẩm đến được tay khách hàng nhanh chóng và tiện lợi. </p>
							<!-- <button type="button" class="btn btn-default get">Mua Ngay</button> -->
						</div>
						<div class="col-sm-6">
							<img src="{{ ('images/banner2.jpg') }}" class="girl img-responsive" alt="" />
							<!-- <img src="{{ ('frontend/images/pricing.png') }}"  class="pricing" alt="" /> -->
						</div>
					</div>
					
					<div class="item">
						<div class="col-sm-6">
							<h1><span>E</span>-Shop Real</h1>
							<p>Shop bán nước hoa chất lượng đảm bảo hàng đầu Việt Nam. </p>
							<p>Có nhiều thương hiệu nổi tiếng khắp toàn cầu tha hồ lựa chọn. </p>
							<p>Đảm bảo sản phẩm đến được tay khách hàng nhanh chóng và tiện lợi. </p>
							<!-- <button type="button" class="btn btn-default get">Mua Ngay</button> -->
						</div>
						<div class="col-sm-6">
							<img src="{{ ('images/banner3.jpg') }}" class="girl img-responsive" alt="" />
							<!-- <img src="{{ ('frontend/images/pricing.png') }}" class="pricing" alt="" /> -->
						</div>
					</div>
					<div class="item">
						<div class="col-sm-6">
							<h1><span>E</span>-Shop Real</h1>
							<p>Shop bán nước hoa chất lượng đảm bảo hàng đầu Việt Nam. </p>
							<p>Có nhiều thương hiệu nổi tiếng khắp toàn cầu tha hồ lựa chọn. </p>
							<p>Đảm bảo sản phẩm đến được tay khách hàng nhanh chóng và tiện lợi. </p>
							<!-- <button type="button" class="btn btn-default get">Mua Ngay</button> -->
						</div>
						<div class="col-sm-6">
							<img src="{{ ('images/banner4.jpg') }}" class="girl img-responsive" alt="" />
							<!-- <img src="{{ ('frontend/images/pricing.png') }}" class="pricing" alt="" /> -->
						</div>
					</div>
					
				</div>
				
				<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa-solid fa-angle-left"></i>
				</a>
				<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa-solid fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</div>

@endsection
@section('content')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Features Items</h2>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="images/home/product1.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
						</div>
					</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/home/product2.jpg" alt="" />
					<h2>$56</h2>
					<p>Easy Polo Black Edition</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/home/product3.jpg" alt="" />
					<h2>$56</h2>
					<p>Easy Polo Black Edition</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/home/product4.jpg" alt="" />
					<h2>$56</h2>
					<p>Easy Polo Black Edition</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
				<img src="images/home/new.png" class="new" alt="" />
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/home/product5.jpg" alt="" />
					<h2>$56</h2>
					<p>Easy Polo Black Edition</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
				<img src="images/home/sale.png" class="new" alt="" />
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="images/home/product6.jpg" alt="" />
					<h2>$56</h2>
					<p>Easy Polo Black Edition</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa-solid fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</div><!--features_items-->



<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend2.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend3.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="item">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend2.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend3.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa-solid fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa-solid fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa-solid fa-angle-right"></i>
			</a>			
	</div>
</div><!--/recommended_items-->
@endsection


@section('left-sidebar')

<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Kids</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Fashion</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Households</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Interiors</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Clothing</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Bags</a></h4>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="#">Shoes</a></h4>
			</div>
		</div>
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
				<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
				<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
				<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
				<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
				<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
				<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
			</ul>
		</div>
	</div><!--/brands_products-->
	
	<!--shipping-->
	<!-- <div class="shipping text-center">
		<img src="images/home/shipping.jpg" alt="" />
	</div> -->
	<!--/shipping-->

</div>

@endsection