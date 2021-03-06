@extends('account.dashboard')
@section('content')
<main role="main" class="col-md-12  col-lg-12 col-sm-12  mt-5">
    <div class="table-responsive"> 
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class='text-center'>
                @forelse ($adverts as $advert)
                <tr>
                    <td>{{$advert->title}}</td>
                    <td><a class="btn btn-primary" href="{{ URL::route('view-advert', $advert->id ) }}"> view</button></td>
                </tr>
                @empty
                <div class="col-md-12">
                    <p class="alert alert-danger font-weight-bold mt-2 text-center">You havent added any adverts to wishlist ...</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection