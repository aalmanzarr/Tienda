@extends('layouts.master')
@section("title", "Show Product")
@section('content')

@if(isset($_GET["page"]))
	<script>
		$(document).ready(function() {

				$("body,html").animate(
				{
					scrollTop: $("#tabcontent").offset().top
				},
				0 //speed
				);

			});
	</script>
@endif


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
					<li><a href="#">Category goes here</a></li>
					<li class="active">{{$product->getName()}}</li>
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
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product01.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product03.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product06.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product08.png')}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product01.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product03.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product06.png')}}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{asset('bootstrap/img/product08.png')}}" alt="">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{$product->getName()}}</h2>
					<div>
						<div class="product-rating">
							@for($i = 1;$i<=5;$i++)
								@if($i-0.2 <=$product["avgRating"])
									<i class="fa fa-star"></i>
								@elseif($i-0.75 < $product["avgRating"])
									<i class="fa fa-star-half-o"></i>
								@else
									<i class="fa fa-star-o"></i>
								@endif
							@endfor
						</div>
						<a class="review-link" href="#tabcontent">{{$product["comments"]->count()}} Review(s) | Add your review</a>
					</div>
					<div>
						<h3 class="product-price">${{$product->getPrice()}} <del class="product-old-price">${{$product->getPrice()+100}}</del></h3>
						<span class="product-available">In Stock</span>
					</div>
					<p>{{$product->getDescription()}}</p>

					<div class="product-options">
						<label>
							Color
							<select class="input-select">
								<option value="0">Red</option>
							</select>
						</label>
					</div>



                        <div class="add-to-cart">


                            <form action="{{ route('cart.addToCart',['id'=>$product->getId()]) }}" method="POST">
                                @csrf
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input type="number" id="quantity" name="quantity" min="1" max="100" value="0">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Add</button>

                            </form>
                        </div>
						<div class="delete">
							<form action="{{ route('product.delete') }}" method="POST" style="margin-left:30%;margin-top:1%">
								@csrf
								<input type='hidden' name='id' value='{{$product->getId()}}' />
								<input type='hidden' name='_method' value='DELETE' />
								<button class="add-to-cart-btn" style="width: 165.70px" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>delete</button>

							</form>
						</div>

					</div>

					<ul class="product-btns">
						<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
						<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
					</ul>

					<ul class="product-links">
						<li>Category:</li>
						<li><a href="#">Headphones</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>

					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>

				</div>
			</div>
			<!-- /Product details -->

			<!-- /container -->

			<!-- Product tab -->
			<div class="col-md-12" id="tabcontent">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav" id="myTab">

						<li class="active"><a href="#tab1" data-toggle="tab">Reviews ({{$product["comments"]->count()}})</a></li>
						<li><a data-toggle="tab" href="#tab2">Details</a></li>
						<li><a data-toggle="tab" href="#tab3">Description</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<!-- Rating -->
								<div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>{{$product["avgRating"]}}</span>
											<div class="rating-stars">
												@for($i = 1;$i<=5;$i++) @if($i-0.2 <=$product["avgRating"]) <i class="fa fa-star"></i>
													@elseif($i-0.75 < $product["avgRating"]) <i class="fa fa-star-half-o"></i>
														@else
														<i class="fa fa-star-o"></i>
														@endif
												@endfor
											</div>
										</div>
										<ul class="rating">
											@for($i = 5; $i>0;$i--)
											<li>
												<div class="rating-stars">
													@for($j = 0; $j<5;$j++) @if($j<$i) <i class="fa fa-star"></i>
														@else
														<i class="fa fa-star-o empty"></i>
														@endif
														@endfor
												</div>
												<div class="rating-progress">
													@if($product["ttlRating"] != 0)
													<div style="width:{{$product["comments"]->where('rating', $i)->count()/$product["ttlRating"]*100}}%;"></div>
													@else
													<div></div>
													@endif
												</div>
												<span class="sum">{{$product["comments"]->where('rating', $i)->count()}}</span>
											</li>
											@endfor
										</ul>
									</div>
								</div>
								<!-- /Rating -->
								<!-- Reviews -->
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											@if($product["comments"]->count() != 0)
											@foreach($product["pgnteComments"] as $comments)
											<li>
												<div class="review-heading">
													<h5 class="name">{{$comments->getName()}}</h5>
													<p class="date">{{$comments["created_at"]}}</p>
													<div class="review-rating">
														@for($i = 0; $i<5;$i++) @if($i<$comments->getRating())
															<i class="fa fa-star"></i>
															@else
															<i class="fa fa-star-o empty"></i>
															@endif
															@endfor
													</div>
												</div>
												<div class="review-body">
													<p> {{$comments->getDescription()}}</p>
												</div>
											</li>
											@endforeach
											@else
											<div class="noreview-body" style="align-items:center">
												<h3 class="title">Nobody has reviewed yet! <br>
													Do yours!</h3>
											</div>
											@endif
										</ul>
									</div>

											<ul style = "margin-left:30%" id="button">{{$product["pgnteComments"]->links()}} </ul>

								</div>
								<!-- /Reviews -->
								<!-- Review Form -->
								<div class="col-md-3">
									<h3 class="title" id="myreview"> I want to review </h3>
									<form class="review-form" method="POST" action="{{ route('comment.save') }}">Name
										@csrf
										<input class="input" type="text" placeholder="Your Name" name="name" value="{{ old('name') }}" />Email
										<input class="input" type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" />Review
										<textarea class="input" type="text" placeholder="Your Review" name="description" value="{{ old('description') }}"></textarea>
										<div class="input-rating">
											<span>Your Rating: </span>
											<div class="stars">
												<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
												<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
												<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
												<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
												<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
											</div>
										</div>
										<input type='hidden' name='product_id' value='{{$product->getId()}}' />

										<button type=submit class="primary-btn">Submit</button>
									</form>
								</div>
							</div>
							<!-- /Review Form -->
						</div>

						<!-- /tab1  -->

						<!-- tab2  -->
						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<p>{{$product->getDetails()}}</p>
								</div>
							</div>
						</div>
						<!-- /tab2  -->

						<!-- tab3  -->
						<div id="tab3" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<p>{{$product->getDescription()}}</p>
								</div>
							</div>
						</div>
						<!-- /tab3  -->
					</div>

				</div>
				<!-- /product tab content  -->
			</div>
		</div>
		<!-- /product tab -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Related Products</h3>
				</div>
			</div>

			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('bootstrap/img/product01.png')}}" alt="">
						<div class="product-label">
							<span class="sale">-30%</span>
						</div>
					</div>
					<div class="product-body">
						<p class="product-category">Category</p>
						<h3 class="product-name"><a href="#">product name goes here</a></h3>
						<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
						</div>
					</div>
					<div class="add-to-cart">

						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
				</div>
			</div>
			<!-- /product -->

			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('bootstrap/img/product02.png')}}" alt="">
						<div class="product-label">
							<span class="new">NEW</span>
						</div>
					</div>
					<div class="product-body">
						<p class="product-category">Category</p>
						<h3 class="product-name"><a href="#">product name goes here</a></h3>
						<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
						</div>
					</div>
					<div class="add-to-cart">
						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
				</div>
			</div>
			<!-- /product -->

			<div class="clearfix visible-sm visible-xs"></div>

			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('bootstrap/img/product03.png')}}" alt="">
					</div>
					<div class="product-body">
						<p class="product-category">Category</p>
						<h3 class="product-name"><a href="#">product name goes here</a></h3>
						<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
						</div>
					</div>
					<div class="add-to-cart">
						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
				</div>
			</div>
			<!-- /product -->

			<!-- product -->
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('bootstrap/img/product04.png')}}" alt="">
					</div>
					<div class="product-body">
						<p class="product-category">Category</p>
						<h3 class="product-name"><a href="#">product name goes here</a></h3>
						<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
							<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
							<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
						</div>
					</div>
					<div class="add-to-cart">
						<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
				</div>
			</div>
			<!-- /product -->

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->
@endsection

