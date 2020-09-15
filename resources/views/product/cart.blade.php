@extends('layouts.master')

@section('content')


<div class="row" style="margin-left: 20px; margin-bottom:20px;margin-top: 20px" >
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12" >
                <ul id="errors">
                    @foreach($data["products"] as $product)
                    <li>Nombre: {{ $product->getName() }} - Precio: {{ $product->getPrice() }}
                        - Cantidad: {{ $data["cantidad"][$product->getId()] }}</li>
                    @endforeach
                    <br /><br />
                    Total: {{$data["precio_total"]}}
                    <form action="{{ route('product.buy') }}" method="POST">
                        @csrf
                        <button type="submit">Buy</button>
                    </form>
                    <form action="{{ route('pages.index') }}">
                        <a class="red-btn" href="{{url('/index')}}">Back</a>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
