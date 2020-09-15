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
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Hot Deals</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Laptops</a></li>
				<li><a href="#">Smartphones</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">Accessories</a></li>
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

		<!-- Order Details -->
		<div class="col-md-7 order-details" style="margin-left: 20%">
			<div class="section-title form-center" style=" text-align: center">
			<h3 class="title">Your Order Cart id = {{$data["cart_id"]}}</h3>
			</div>

            <div class="order-summary">
				<div class="order-col">
					<div><strong>PRODUCT</strong></div>
					<div><strong>TOTAL</strong></div>
				</div>
					@for($i = 0; $i < $data["total_item"];$i++)
                <div class="order-products">
						<div class="order-col">
						<div>{{$data["item"]["name"][$i]}} * {{$data["item"]["qnty"][$i]}}</div>
						<div>{{$data["item"]["price"][$i]}}</div>
						</div>
					@endfor
                </div>
				<div class="order-col">
					<div><strong>Shiping</strong></div>
					<div><strong>FREE</strong></div>
				</div>
				<div class="order-col">
					<div><strong>TOTAL</strong></div>
					<div><strong class="order-total">${{$data["total"]}}</strong></div>
				</div>
				<div class="order-products">
					<div class="order-col">
						<div></div>
						<div></div>
					</div>
					<div class="order-col">
						<div><strong>Shipping Info</strong></div>
						<div><strong>Your Info</strong></div>
					</div>
					<div class="order-col">
						<div>First Name</div>
						<div>{{$data["first_name"]}}</div>
					</div>
					<div class="order-col">
						<div>Last Name</div>
						<div>{{$data["last_name"]}}</div>
					</div>
					<div class="order-col">
						<div>Email</div>
						<div>{{$data["email"]}}</div>
					</div>
					<div class="order-col">
						<div>Telephone</div>
						<div>{{$data["telephone"]}}</div>
					</div>
					<div class="order-col">
						<div>Country</div>
						<div>{{$data["country"]}}</div>
					</div>
					<div class="order-col">
						<div>State</div>
						<div>{{$data["state"]}} required</div>
					</div>
					<div class="order-col">
						<div>City</div>
						<div>{{$data["city"]}}</div>
					</div>
					<div class="order-col">
						<div>Zip Code</div>
						<div>{{$data["zip_code"]}}</div>
					</div>
					<div class="order-col">
						<div>Order Details</div>
						<div>{{$data["details"]}}</div>
					</div>
					<div class="order-col">
						<div>Paymenth Method</div>
						<div>{{$data["payment_method"]}}</div>
					</div>
				</div>
				<form method="POST" id="form1" action="{{ route('checkout.order.save') }}">
					@csrf

						<input type='hidden' name='client_id' value={{$data["client_id"]}} />
						<input type='hidden' name='shipping_id' value={{$data["shipping_id"]}} />
						<input type='hidden' name='payment_method' value={{$data["payment_method"]}} />
						<input type='hidden' name='cart_id' value="{{$data["cart_id"]}}" />

					<button style="margin-left:40%" type=submit class="primary-btn">Finish Order</button>
				</form>
			</div>
		</div>
		<!-- /Order Details -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection
