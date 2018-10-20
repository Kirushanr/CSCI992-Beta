@extends('layouts.master') 
@section('content')
<div class="reviews mt-2">
   
    <div class="container">
        @if(Auth::id()!=$id)
        <div class="row text-center">
            <div class="col-md-12">
            <div class="card text-center" style="border: none">
                <div class="card-body">
                    <h5 class="card-title">Write a review for {{$username}}</h5>
                    <p class="card-text"></p>
                    <a href="{{route('review.post', $id)}}" class="btn btn-primary">Review</a>
                </div>
            </div>
           </div>
        </div>
        @endif
        <div class="row">
            @forelse ($ratings as $rating)
            <div class="review card col-md-12">
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>{{$rating->review}}</p>
                        <footer class="blockquote-footer">Posted on {{\Carbon\Carbon::createFromTimeStamp(strtotime($rating->created_at))->diffForHumans()}} by <cite title="Source Title">{{$rating->reviewer}}</cite></footer>
                      </blockquote>
                    </div>
            </div>
            @empty
            <div class="review text-center col-md-12">
            <h3 class="text-center mt-2">{{$username}} has no reviews !!!</h3>
            </div>
            @endforelse
            
        </div>
    </div>
</div>
@endsection