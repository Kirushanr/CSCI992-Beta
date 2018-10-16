@extends('account.dashboard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    @include('messaging.partial.flash')
    @each('messaging.partial.thread', $threads, 'thread', 'messaging.partial.no-threads')
</main>
@endsection
