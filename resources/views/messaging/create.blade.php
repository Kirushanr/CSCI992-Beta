@extends('layouts.master') 
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Send message') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('message-store', $id) }}" aria-label="{{ __('message') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="subject" class="col-sm-4 col-form-label text-md-right">{{ __('Subject') }}</label>
    
                                <div class="col-md-6">
                                    <input id="subject" type="text" name="subject" value="" required autofocus class='form-control'>
    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="message" required class="form-control" name="message"></textarea>
                                
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection