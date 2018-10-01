@extends('layouts.master')
@section('content')

<section>
    <div class="container">
        <div class="container mt-5 text-left">
            <h3 class="font-weight-light mb-4" >What do you want to sell ?</h1>
        </div>
        <div class="container">
            <div class="row  justify-content-center advert-type">
            
                <div class="col-lg-4">
                    <a href="{{route('post-ad-type.show', ['type' => 'book'])}}">
                    <img src="{{asset('images/books.svg')}}" alt="..." class="rounded-0" style="height:140;width:140">
                    <h3 class="">Books</h3>
                    </a>
                </div>
                <div class="col-lg-4">
                   <a href="{{route('post-ad-type.show', ['type' => 'electronics'])}}">
                   <img src="{{asset('images/electronics.svg')}}" alt="..." class="rounded-0 " style="height:140;width:140">
                    <h3 class="">Electronics</h3>
                   </a>
                </div>
                <div class="col-lg-4">
                <a href="{{route('post-ad-type.show', ['type' => 'essentials'])}}">   
                    <img src="{{asset('images/essentials.svg')}}" alt="..." class="rounded-0" style="height:140;width:140">
                    <h3 class="">Essentials</h3>
                </a>
                </div>
                </div>
        </div>
        
   </div>
</container>

</section> 


@endsection