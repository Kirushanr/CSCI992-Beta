@extends('layouts.master') 
@section('content')
<div class="search">
    <div class="container">
        <div class="search-form mt-5 text-center">
            <form method="GET" action="/search?query={{ app('request')->input('query') }}">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="float-left" data-toggle="modal" data-target="#exampleModalCenter">Sort</a>
                       
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" value="{{ app('request')->input('query') }}"
                            name="query">
                        <div class="input-group-append">
                            <select class="custom-select" name="category">
                                <option value="0" >All Categories</option>
                                <option value="1">Books</option>
                                <option value="2">Electronics</option>
                                <option value="3">Essentials</option>
                            </select>
                        </div>

                        <div class="input-group-append">
                            <input type="submit" class="btn btn-primary" value="search">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="results mt-5">
        <div class="container">
            <div class="row">
                @forelse ($adverts as $advert)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{URL::asset('storage/' . $advert->image_url_1)}}" alt="Card image cap" style="height: 150px; width: 100%; display: block;">
                        <div class="card-body">
                            <h5 class="card-title">{{$advert->title}}</h5>
                            <p class="card-text">{{ str_limit($advert->description, $limit = 150, $end = '...') }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ URL::route('view-advert', $advert->id ) }}"  class="btn btn-primary">View</a>
                                </div
                                <small class="card-title">${{$advert->price}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <p class="alert alert-danger font-weight-bold mt-2 text-center">No Results Found</p>
                </div>

                @endforelse
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sort</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                    <ul class="list-unstyled">

                        <li><a href="{{Request::fullUrlWithQuery(['sort' => 'newest'])}}">Newest</a></li>
                        <li><a href="{{Request::fullUrlWithQuery(['sort' => 'pricelowhigh'])}}">Price Low to High</a></li>
                        <li><a href="{{Request::fullUrlWithQuery(['sort' => 'pricehighlow'])}}">Price High to Low</a></li>
                        <li><a href="{{Request::fullUrlWithQuery(['sort' => 'name'])}}">Name</a></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection