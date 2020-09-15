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
					<li><a href="{{url('/index')}}">Home</a></li>
					<li><a href="{{ url('/catalogue/showCatalogues')}}">All Categories</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Headphones</a></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('util.message')
                    <div class="card">

                        <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form class ="text-center" method="POST" action="{{ route('product.save') }}">
                            @csrf
                            <div class="center">
                                <!-- Shipping Information -->
                                <div class="billing-details">
                                    <div class="section-title">
                                        <h3 class="title">Create Product</h3>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="name" placeholder="Name" value="{{ old('name') }}"required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="number" name="price" placeholder="Price" value="{{ old('price') }}" required>
                                    </div>
                                    <div class="order-notes">
                                        <textarea class="input" placeholder="Product Description" name="description" value="{{ old('description') }}"></textarea>
                                    </div>
                                    <div class="order-notes">
                                        <textarea class="input" placeholder="Product Details" name="details" value="{{ old('details') }}"></textarea>
                                    </div>
                                    <input type='hidden' name='catalogue_id' value='{{$catalogueId}}' />
                                </div>
                            </div>


                            <div class="text-center">
                            <a class="red-btn" href="{{url('/index')}}">Back</a>
                            <button type="submit">Create</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->


@endsection

