@extends('account.dashboard')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    @if(session()->has('result') && session()->get('result') =='success' )
        <div class="alert alert-success mb-3 text-center">
            <a href="{{ URL::route('view-advert', session()->get('advert_id') ) }}" class="mt-2 font-weight-bold">Your advert is updated, click here to view it :)</a>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>Advert ID</th>
                    <th>Title</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adverts as $advert)
                <tr>
                    <td>{{$advert->id}}</td>
                    <td>{{$advert->title}}</td>
                    <td>{{$advert->created_at}}</td>
                    <td><a href="{{route('edit.show', $advert->id)}}" class="btn btn-primary">view</a></td>
                </tr>
                @empty
                <div class="col-md-12">
                    <p class="alert alert-danger font-weight-bold mt-2 text-center">You havent posted any adverts yet ...</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection