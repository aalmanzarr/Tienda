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
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form method="POST" id="form1" action="{{ route('checkout.shipping.save') }}">
				@csrf
				<div class="col-md-7">
					<!-- Shipping Information -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Shipping Information</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="country" placeholder="Country" value="{{ old('country') }}" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="state" placeholder="State" value="{{ old('state') }}"required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City" value="{{ old('city') }}" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="adress" placeholder="Address" value="{{ old('adress') }}" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="zip_code" placeholder="ZIP Code" value="{{ old('zip_code') }}" required>
						</div>
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes" name="details" value="{{ old('details') }}"></textarea>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
									<a required>I've read and accept the terms & conditions</a>
							</label>
						</div>
						<input type='hidden' name='shipping_cost' value='0' />
						<input type='hidden' name='client_id' value={{$clientInfo["client_id"]}} />
						<input type='hidden' name='first_name' value={{$clientInfo["first_name"]}} />
						<input type='hidden' name='last_name' value={{$clientInfo["last_name"]}} />
						<input type='hidden' name='email' value={{$clientInfo["email"]}} />
						<input type='hidden' name='telephone' value={{$clientInfo["telephone"]}} />
						<button style="margin-left:40%" type=submit class="primary-btn">Continue</button>

						<div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="create-account" name = "checkbox" value = "true">
							</div>
						</div>
					</div>
					<!-- /Shipping Information -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
							@for($i = 0; $i < $clientInfo["total_item"];$i++)
							<div class="order-products">
								<div class="order-col">
									<input type='hidden' name='itemName[]' value="{{$clientInfo["item"]["name"][$i]}}" />
								<input type='hidden' name='itemPrice[]' value="{{$clientInfo["item"]["price"][$i]}}" />
								<input type='hidden' name='itemQnty[]' value="{{$clientInfo["item"]["qnty"][$i]}}" />
								<div>{{$clientInfo["item"]["name"][$i]}} * {{$clientInfo["item"]["qnty"][$i]}}</div>
								<div>{{$clientInfo["item"]["price"][$i]}}</div>

								</div>
							@endfor
							<input type='hidden' name='total_item' value="{{$clientInfo["total_item"]}}" />
							<input type='hidden' name='total' value="{{$clientInfo["total"]}}" />
							<input type='hidden' name='cart_id' value="{{$clientInfo["cart_id"]}}" />

						</div>


						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">${{$clientInfo["total"]}}</strong></div>
						</div>
					</div>
					<strong>PAYMENT METHOD</strong>
					<div class="payment-method">
						<div class="order-col">
						</div>
						<div class="input-radio">

							<input type="radio" name="payment_method" id="payment-1" value="Direct-Bank-Transfer">
							<label for="payment-1">
								<span></span>
								Direct Bank Transfer
							</label>
							<div class="caption">
								<p>Bancolombia-Ahorros: 42734372-3</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment_method" id="payment-2" value="Delivery-Against-Payment">
							<label for="payment-2">
								<span></span>
								Delivery Against Payment
							</label>
							<div class="caption">
								<p></p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment_method" id="payment-3" value="Paypal-System">
							<label for="payment-3">
								<span></span>
								Paypal System
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Order Details -->
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection
