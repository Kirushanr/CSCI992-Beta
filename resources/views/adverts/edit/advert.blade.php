@extends('layouts.master')
@section('content')
@if(session()->has('result') && session()->get('result') =='success' )
    <div class="alert alert-success mb-3 text-center">
        <a href="{{ URL::route('view-advert', session()->get('advert_id') ) }}" class="mt-2 font-weight-bold">Your advert is live !!!, click here to view it :)</a>
    </div>
@endif
<div class="container">
<form class="mt-5"  method="POST" action="{{ route('update.ad', $advert->id) }}" enctype="multipart/form-data">
@csrf
<input type="hidden" value="{{$type}}" name="type">

@include('adverts.edit.partial.advert')
<hr>
<div class="alert alert-primary">Lets make your advert standout</div>

@includeWhen($type=="book",'adverts.edit.partial.book', ['book'=>$book])
@includeWhen($type=="electronics",'adverts.edit.partial.electronics', ['electronics'=>$electronics])

<button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
</div>
@section('script')
<script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
</script>
@endsection
@endsection