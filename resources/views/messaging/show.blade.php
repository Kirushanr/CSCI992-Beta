@extends('account.dashboard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="">
        <h4 class="text-primary">{{ $thread->subject }}</h4>
        @each('messaging.partial.messages', $thread->messages, 'message')

        @include('messaging.partial.form-message')
    </div>
</main>
@stop
