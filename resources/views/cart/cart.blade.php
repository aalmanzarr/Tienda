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
                <li><a href="{{url('/index')}}">Home</a></li>
                <li><a href="{{url('/product/show/last')}}">Products</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                <li><a href= "{{ url('/catalogue/showCatalogues')}}" >Catalogues</a></li>
                <li class="active"><a href="#">Cart</a></li>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->

<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">

        <!-- Order Details -->
        <div class="col-md-7 order-details" style="margin-left: 20%">
            <div>
                <form style="justify-content: space-between" action="{{ route('cart.removeCart') }}">
                    @csrf
                <button type="submit" class="add-to-cart-btn"><i class="fa fa-trash"></i> Delete Cart</button>
                </form>
            </div>

            <div class="order-summary">


                <div class="order-col">
                    <div><strong>PRODUCT</strong></div>
                    <div><strong>TOTAL</strong></div>

                </div>

                @foreach($data["products"] as $product)
                <li> <b> {{ $product->getName() }} </b> - Cantidad: {{ $data["cantidad"][$product->getId()] }} <br /><br /> Precio unitario: {{ $product->getPrice() }}
                </li>

                <div class="order-col">
                    <div><strong>TOTAL:</strong></div>
                    <div><strong class="order-total">${{$product->getPrice()* $data["cantidad"][$product->getId()] }}</strong></div>
                </div>

                @endforeach
                <br /><br />
                <div class="order-col">
                    <div><strong>TOTAL:</strong></div>
                    <div><strong class="order-total">${{$data["precio_total"]}}</strong></div>

                </div>

                </div>



            <form style="justify-content: space-between" action="{{ route('cart.buy') }}" method="POST">
                @csrf
                <button type="submit">Buy</button>
                <a class="red-btn" href="{{url('/index')}}" >Back</a

            </form>

            </div>
        </div>
        <!-- /Order Details -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection


