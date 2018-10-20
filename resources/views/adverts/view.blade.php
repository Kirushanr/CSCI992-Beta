@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div id="image" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#image" data-slide-to="0" class="active"></li>
                    <li data-target="#image" data-slide-to="1"></li>
                    <li data-target="#image" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{URL::asset('storage/' . $model->image_url_1)}}" alt="First slide">
                    </div>
                    @if($model->image_url_2!=='public/default.jpeg')
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::asset('storage/' . $model->image_url_2)}}" alt="Second slide">
                    </div>
                    @endif
                    @if($model->image_url_3!=='public/default.jpeg')
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::asset('storage/' . $model->image_url_2)}}" alt="Second slide">
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#image" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                <a class="carousel-control-next" href="#image" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
            </div>
        </div><!-- /col-md-6 -->
        <div class="col-md-6">
                <h2 class="display-5 text-dark">{{$model["title"]}}</h2>
                <h3 class="display-6 ">Price: <span class="text-danger font-weight-bold"> ${{$model["price"]}} </span></h3>
                <p>{{$model["description"]}}</p>
                @if(isset($books))
                    <p>Author: {{$books[0]["author"]}}</p>
                    <p>ISBN: {{$books[0]["ISBN"]}}</p>
                    @if(isset($books[0]["edition"]))
                    <p>Edition: {{$books[0]["edition"]}}</p>
                    @endif
                    @if(isset($books[0]["course_code"]))
                    <p>Course code: {{$books[0]["course_code"]}}</p>
                    @endif
                @endif
                @if(isset($electronics))
                    <p>Has warranty: {{$electronics[0]["has_warranty"] ==true ? 'Yes':'No' }}</p>
                    @if(isset($electronics[0]["type"]))
                    <p>Device type: {{$electronics[0]["type"]}}</p>
                    @endif
                    @if(isset($electronics[0]["model"]))
                    <p>Model: {{$electronics[0]["model"]}}</p>
                    @endif
                @endif

                <p class="">Posted on : <span class="font-weight-bold">{{$model["created_at"]}}</span> </p>
                <p class="">Posted by : <span class="text-capitalize"><a href="{{route('reviews.show', $model['user_id'])}}">{{$username}}</a></span> </p>
                <p><a href="{{route('message-create', $model['id'] )}}" class="btn btn-primary">Contact Seller</a>  </p>
                <p class=""><a class="btn btn-alert px-2 text-success font-weight-bold" href="#wishlist" id="wishlist" data-id="{{$model["id"]}}">Add to wishlist</a><a class="btn btn-alert px-2 text-danger font-weight-bold" href="{{route('report.store', $model['id'] )}}">Report Advert</a> </p>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("#wishlist").on("click", function(){
        var id= $(this).attr('data-id');

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            
            url: "/wishlist",
            data: { advert_id: id}
        }).done(function( msg ) {
            alert("Advert added to your wishlist")
        });
    })

</script>
@endsection