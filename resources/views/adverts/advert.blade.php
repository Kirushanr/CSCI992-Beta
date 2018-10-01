@extends('layouts.master')
@section('content')

<div class="container">
<form class="mt-5">
@include('adverts.partial.advert')
<hr>
<div class="alert alert-primary">Lets make your advert standout</div>
@includeWhen($type=='book','adverts.partial.book')
@includeWhen($type=='electronics','adverts.partial.electronics')

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