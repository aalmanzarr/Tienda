@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li ><a href="{{url('/index')}}">Home</a></li>
                <li><a href="{{url('/product/show/last')}}">Products</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                <li class="active" ><a href= "{{ url('/catalogue/showCatalogues')}}" >Catalogues</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create Catalogue</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form class ="text-center" method="POST" action="{{ route('catalogue.save') }}">
                    @csrf
                    <input class = "form" type="text" placeholder="Name" name="name" value= "{{ old('name') }}" />
                    <input class = "description" type="text"  style="heigth : 1000px" placeholder="Description" name="description" value="{{ old('description') }}" />
                    <button type="submit" class="btn btn-primary">Create</button>
                    <br><br>
                    <div class="text-center">
                      <a class="btn btn-primary" href="{{url('/index')}}">Back</a>

                        <a class="btn btn-primary" href= "{{ url('/catalogue/showCatalogues')}}" >Show Catalogues </a>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

