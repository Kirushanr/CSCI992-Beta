@extends('layouts.master')
@section('title')
Welcome to BuynSell Beta
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
                                    <input type="text" class="form-control form-control-lg" placeholder="Search for">
                                    <div class="input-group-append">
                                      <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                                    </div>
                            </div>
                    </div>

                </div>
            </form>
        </div>
                 
    </div> <!-- container-->

</header><!--Jumbotran-->  
<section>
    <div class="container">
        <div class="container">
            <h3 class="font-weight-light"> Explore BuynSell </h1>
        </div>
        <div class="row mt-3 justify-content-around py-4">
            
        <div class="col-md-4 mb-3">
                <div class="card">
                        <img class="card-img-top" src="https://images.pexels.com/photos/325153/pexels-photo-325153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and 
                              make up the bulk of the cards content.</p>
                        </div>
                </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                    <div class="card-header bg-dark text-white">Header</div>
                    <img class="card-img-top" src="https://images.pexels.com/photos/325153/pexels-photo-325153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Card image cap">
            </div>
    </div>

        <div class="col-md-4 mb-3">
                    <div class="card">
                            <img class="card-img-top" src="https://images.pexels.com/photos/325153/pexels-photo-325153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Card image cap">
                            <div class="card-body">
                              <p class="card-text">Some quick example text to build on the card title and 
                                  make up the bulk of the cards content.</p>
                            </div>
                    </div>
            </div>
            
           
        </div>
   </div>
</container>

</section> 


@endsection 