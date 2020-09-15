@extends('layouts.master')
@section('content')
<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
                <li ><a href="{{url('/index')}}">Home</a></li>
                <li class="active">  <a href="{{url('/product/show/last')}}">Products</a></li>
                <li ><a href="{{url('/contact')}}">Contact</a></li>
                <li><a href= "{{ url('/catalogue/showCatalogues')}}" >Catalogues</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Categories</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Headphones</a></li>
					<li class="active">Product name goes here</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Categories</h3>
					<div class="checkbox-filter">

						<div class="input-checkbox">
							<input type="checkbox" id="category-1">
							<label for="category-1">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-2">
							<label for="category-2">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-3">
							<label for="category-3">
								<span></span>
								Cameras
								<small>(1450)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-4">
							<label for="category-4">
								<span></span>
								Accessories
								<small>(578)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-5">
							<label for="category-5">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-6">
							<label for="category-6">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Price</h3>
					<div class="price-filter">
						<div id="price-slider"></div>
						<div class="input-number price-min">
							<input id="price-min" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
						<span>-</span>
						<div class="input-number price-max">
							<input id="price-max" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Brand</h3>
					<div class="checkbox-filter">
						<div class="input-checkbox">
							<input type="checkbox" id="brand-1">
							<label for="brand-1">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-2">
							<label for="brand-2">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-3">
							<label for="brand-3">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-4">
							<label for="brand-4">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-5">
							<label for="brand-5">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-6">
							<label for="brand-6">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Top selling</h3>
					@foreach($listOfProducts["top"] as $products)

					<div class="product-widget">
						<div class="product-img">
							<img src="{{asset('bootstrap/img/product01.png')}}" alt="">
						</div>
						<div class="product-body">
						<p class="product-category">{{$products->catalogues()->where('id', $products->getId())->get()}}</p>
							<h3 class="product-name"><a href="{{url('/product/showDetails/'. $products->getId())}}">{{$products->getName()}}</a></h3>

							<h4 class="product-price">${{$products->getPrice()}} <del class="product-old-price">${{$products->getPrice() + 100}}</del></h4>

						</div>

					</div>
					@endforeach
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:

							<button class="input-select"><a href="{{url('/product/show/last')}}">Last</button>
							<button class = "input-select"><a href="{{url('/product/show/lower_price')}}">Low Price</button>

						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					@foreach($listOfProducts["all"] as $product)
					<!-- product -->
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{asset('bootstrap/img/product01.png')}}" alt="">
								<div class="product-label">

									<span class="new">NEW</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">{{$product->catalogues->getName()}}</p>
								<h3 class="product-name"><a href="{{url('/product/showDetails/'. $product->getId() )}}">{{$product->getName()}}</a></h3>
								<h4 class="product-price">${{$product->getPrice()}} <del class="product-old-price">${{$product->getPrice() + 100}}</del></h4>
								<div class="product-rating">

									@for($i = 1;$i<=5;$i++)
										@if($i-0.2 <=round($product->comments()->avg('rating'), 1))
											<i class="fa fa-star"></i>
										@elseif($i-0.75 < round($product->comments()->avg('rating'), 1))
											<i class="fa fa-star-half-o"></i>
										@else
											<i class="fa fa-star-o"></i>
										@endif
									@endfor
									<h4 class="product-price">{{$product->comments()->count()}} Reviews</h4>
								</div>

							</div>
                            <div class="add-to-cart">


                                <form  action="{{ route('cart.addToCart',['id'=>$product->getId()]) }}" method="POST">
                                    @csrf

                                    <input type='hidden' name='quantity' value='1' />
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Add</button>

                                </form>
                            </div>
						</div>
					</div>
					@endforeach
					<!-- /product -->


				</div>
				<!-- /store products -->

				<!-- store bottom filter
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						 /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

@endsection
