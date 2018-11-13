@extends('layouts.master')
@section('content')
<div class="container">
<div class="row justify-content-center mt-5 text-center">
    <div class="col-md-6">
        <img src="data:image/png;base64,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" style="heigh:200px;width:200px">
        <h3 class="display-5" style="height:100px;">The advert you are trying to view, currently put <span class="text text-danger">on hold</span> by the seller.</h3>
     </div>
</div>
</div>
@endsection