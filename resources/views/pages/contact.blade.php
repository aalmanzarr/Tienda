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
                <li><a href="{{url('/product/show/last')}}">Products</a></li>
                <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
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

<div class="container" style = "margin-top: 30px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="col-md-12">
                        <h3 class="breadcrumb-header">Contact</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                    <div class="col-md-12" style = "margin-top: 39px">
                        <ul>Ricardo Avendaño Peña</ul>
                        <ul>raavendanp@eafit.edu.co</ul>
                        <div class="text-center">
                            <a class="red-btn" href="{{url('/index')}}">Back</a>

                          </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
