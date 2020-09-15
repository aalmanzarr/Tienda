@extends('layouts.master')
@section("title", "Alert")
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Deleted!</div>
                <div class="card-body">
                    <div class = "alert alert-danger">
                        Catalogue deleted!
                        <br><br>
                    </div>
                    <div class="text-center">
                      <a class="btn btn-primary" href="{{url('/catalogue/showCatalogues')}}">Catalogues</a>
                      <a class="btn btn-primary" href="{{url('/catalogue/create')}}">Create</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
