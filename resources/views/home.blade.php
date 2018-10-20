@extends('layouts.master') 
@section('title') Welcome to BuynSell Beta
@endsection
 
@section('style')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection
 
@section('content')

<header class="jumbotron jumbotron-fluid" style="min-height: 100%!">
    <div class="container">
        <h1 class="display-4">Looking to buy/sell used items?</h1>
        <h3 class="display-6">Its never too late</h3>
        <div class="container">
            <form action="/search" method="GET">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Search for" name="query">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <!-- container-->

</header>
<!--Jumbotran-->
<div class="container">
    <div class="container">
        <h3 class="font-weight-light"> Explore BuynSell </h3>
    </div>
    <div class="row mt-2 justify-content-center py-2">

        <div class="col-md-3 mb-3 explore">
            <a href="{{route('search')}}?category=1">
                <div class="card">
                    <div class="card-header bg-dark text-white">Books</div>
                    <img class="card-img-top" src="{{asset('/images/books.jpeg')}}"
                        alt="Card image cap" style="height:100px;">
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-3 explore">
            <a href="{{route('search')}}?category=2">
                <div class="card">
                    <div class="card-header bg-dark text-white">Electronics</div>
                    <img class="card-img-top" src="{{asset('/images/electronics.jpeg')}}"
                        alt="Card image cap" style="height:100px;">
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-3 explore">
            <a href="{{route('search')}}?category=3">
                <div class="card">
                    <div class="card-header bg-dark text-white">Essentials</div>
                    <img class="card-img-top" src="{{asset('/images/essentials.jpeg')}}"
                        alt="Card image cap" style="height:100px;">
                </div>
            </a>
        </div>

    </div>
</div>
@endsection