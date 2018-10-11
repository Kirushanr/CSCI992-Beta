@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="http://placehold.it/350x250/612b65/fff&amp;text=Product+Image+5" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://placehold.it/350x250/612b65/fff&amp;text=Product+Image+5" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://placehold.it/350x250/612b65/fff&amp;text=Product+Image+5" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
            </div>
        </div><!-- /col-md-6 -->
        <div class="col-md-6">
                <h2 class="display-5 text-dark">{{$model["title"]}}</h2>
                <h3 class="display-6 ">Price: <span class="text-danger font-weight-bold"> ${{$model["price"]}} </span></h3>
                <p>{{$model["description"]}}</p>
                <p class="">Posted on : <span class="font-weight-bold">{{$model["created_at"]}}</span> </p>
                <p class="">Posted by : <span class="text-capitalize">{{$username}}</span> </p>
                <p><button class="btn btn-primary">Contact Seller</button>  </p>
                <p class=""><a class="btn btn-alert px-2 text-success font-weight-bold" href="">Add to wishlist</a><a class="btn btn-alert px-2 text-danger font-weight-bold" href="">Report Advert</a> </p>
        </div>
    </div>
</div>
@endsection