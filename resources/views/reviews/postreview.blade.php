@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


@endsection
@section('content')
<div class="container">
        <form class="mt-5"  method="POST" action="{{ route('review.store', $id) }}">
        @csrf
            <input type="hidden" value="{{$id}}" name="user">
            <div class="form-group">
                    <label for="review">Enter your review<span class="text text-danger"> *</span></label>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="review" rows="2" name="review" required>"{{old('review')}}</textarea>
                
                    @if ($errors->has('review'))
                    <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('review') }}</strong>
                    </span> 
                  @endif
            </div>
            <div class="form-group">
                    <label for="rating">Enter your review<span class="text text-danger"> *</span></label>
                    <div class="star-rating">
                            <span class="far fa-star" data-rating="1"></span>
                            <span class="far fa-star" data-rating="2"></span>
                            <span class="far fa-star" data-rating="3"></span>
                            <span class="far fa-star" data-rating="4"></span>
                            <span class="far fa-star" data-rating="5"></span>
                            <input type="hidden" name="rating" class="rating-value" value="0" id="rating">
                    </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary"
            </div>
        </form>
@endsection
@section('script')
<script src="{{ asset('js/bootstrap-rating.js') }}"></script>

@endsection