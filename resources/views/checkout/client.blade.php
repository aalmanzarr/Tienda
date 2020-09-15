@extends('layouts.master')
@section("title", "Show Product")
@section('content')

<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
                <li><a href="{{url('/index')}}">Home</a></li>
                <li><a href="{{url('/product/show/last')}}">Products</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
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
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Checkout</li>
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
	<form method="POST" id="form1" action="{{ route('checkout.client.save') }}">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Client Information -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Buyer Information</h3>
						</div>

							@csrf
							<div class="form-group">
								<input class="input" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="telephone" placeholder="Telephone" value="{{ old('telephone') }}">
							</div>

							<button style="margin-left:40%" type=submit class="primary-btn">Continue</button>

						<div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="create-account">
							</div>
						</div>
					</div>
					<!-- /Client Information -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title form-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
						</div>
						@foreach($cartInfo["item"] as $product)
						<div class="order-products">
							<div class="order-col">
							 <input type='hidden' name='itemName[]' value="{{$product->getName()}}" />
							 <input type='hidden' name='itemPrice[]' value="{{$product->getPrice()}}" />
							 <input type='hidden' name='itemQnty[]' value="{{$product["cantidad"]}}" />

							<div>{{$product->getName()}} * {{$product["cantidad"]}}</div>
							<div>{{$product->getPrice()}}</div>
							</div>
							@endforeach
							<input type='hidden' name='cart_id' value="{{$cartInfo["cart_id"]}}" />
							<input type='hidden' name='total_item' value="{{$cartInfo["total_item"]}}" />
							<input type='hidden' name='total' value="{{$cartInfo["total"]}}" />
						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
						<div><strong>TOTAL</strong></div>
							<div><strong class="order-total">${{$cartInfo["total"]}}</strong></div>
						</div>
					</div>

				</div>
				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</form>
</div>
<!-- /SECTION -->
@endsection
