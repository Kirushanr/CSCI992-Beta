@extends('layouts.master')
@section('content')
@if(session()->has('result') && session()->get('result') =='success' )
    <div class="alert alert-warning mb-3 text-center">
        <p class="mt-2 font-weight-bold">Thank you for reporting, you have helped us keep BuynSell community safe
        .If we take any further actions, we will let you know</p>
    </div>
@endif
<div class="container">
        <h5 class="text-center mt-4 text-capitalize">Report violations</h5>
        <div class="row justify-content-center">
            <div class="col-md-6 align-self-center">
                    <form class="mt-5"  method="POST" action="">
                            @csrf
                            <input type="hidden" value="{{$id}}" name="advert">
                            <div class="form-group">
                                    <label for="review">What is wrong with this advert ?<span class="text text-danger"> *</span></label>
                                    <select class="custom-select" id="inputGroupSelect01" name="reason">
                                            <option value="Not interested" selected>I'm not interested in this advert</option>
                                            <option value="spam or suspicious">It’s suspicious or spam</option>
                                            <option value="abusive or harmful">It's abusive or harmful</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="description">Further description of the problem<span class="text text-danger"></span></label>
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="2" name="description" required>{{old('description')}}</textarea>
                                
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('description') }}</strong>
                                    </span> 
                                  @endif
                            </div>
                            
                            <input type="submit" value="Submit" class="btn btn-primary"
                            </div>
                        </form>
            </div>
        </div>
     
@endsection
