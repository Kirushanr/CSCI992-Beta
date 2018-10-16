@extends('layouts.master')
@section('content')
<div class="message mt-5 mx-auto">
    <div class="container text-center">
                <h3 class="text-primary">Follow our tips to make your buying experience more safe & secure </h3>
    
                <div class="tips text-center mt-4">
                        <p><span class="text-danger">Tip 1 :</span> Inspect the goods/product in person.</p>
                        <p><span class="text-danger">Tip 2 :</span> Always take a friend with you for inspection :) </p>
                        <p><span class="text-danger">Tip 3 :</span> Do not share your <span class="text-danger font-weight-bold">credit card/payment/account details </span> to the seller !!!</p>
                </div>
                <a class="btn btn-primary text-white mt-1 mb-3" href="{{route('message-create', $id)}}">Continue to message</a>
                       
    </div>
    </div>
    <div class="container">
        
    </div>
  
    </div>
    </div>
</div>

@endsection