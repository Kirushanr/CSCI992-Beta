@extends('account.dashboard')
@section('content')

<main role="main" class="col-md-12  col-lg-12 col-sm-12  mt-5">
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
                    <th>Put advert on hold/release</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adverts as $advert)
                <tr>
                    <td>{{$advert->id}}</td>
                    <td>{{$advert->title}}</td>
                    <td>{{$advert->created_at}}</td>
                    <td>
                        @if($advert->visibility == true)
                        <a href="#" class="btn btn-warning" data-status="{{$advert->visibility}}" onclick="holdAdvert(this)" data-id="{{$advert->id}}">
                            Hold
                        </a>
                        @else 
                        <a href="#" class="btn btn-success" data-status="{{$advert->visibility}}" onclick="holdAdvert(this)" data-id="{{$advert->id}}">
                            Release
                        </a>
                        @endif
                    
                    <td><a href="{{route('edit.show', $advert->id)}}" class="btn btn-primary">Edit</a></td>
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

@section('script')
<script>
        function holdAdvert(element){
            var status= $(element).attr('data-status'); 
            var id=$(element).attr('data-id');
            var mode = (status==1)? 'off' : 'on';

            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                
                url: "/holdadvert",
                data: { id: id, status:mode}
            }).done(function( msg ) {
                console.log(msg);
                if(msg=='success'){
                    if(status==1){
                        alert("Advert is put on hold");
                    }
                    else{
                        alert("Advert is released");
                    }
                }
                location.reload();
            });
        }
</script>
@endsection