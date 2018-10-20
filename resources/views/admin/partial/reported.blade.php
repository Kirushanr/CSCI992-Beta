@extends('admin.dashboard')
@section('content')
<div class="table-responsive-md mt-5">
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>Advert ID</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Reported on</th>
                    <th>View advert</th>
                    <th>Ban Advert</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                <tr>
                    <td>{{$report->advert_id}}</td>
                    <td>{{$report->report_type}}</td>
                    <td>{{$report->description}}</td>
                    <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans()}}</td>
                    <td><a href="{{route('view-advert', $report->advert_id)}}" class="btn btn-primary" target="_blank">view</a></td>
                    <td><a href="#" data-id="{{$report->advert_id}}" class="btn btn-danger" onclick="banAdvert(this)">Ban</a></td>
               
                </tr>
                @empty
                <div class="col-md-12">
                    <p class="alert alert-danger font-weight-bold mt-2 text-center">No adverts were reported</p>
                </div>
                @endforelse
            </tbody>
        </table>
@endsection

@section('script')
<script>
    function banAdvert(element){
        var a_id= $(element).attr('data-id');
        alert(a_id);
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            },
            
            url: "/ban",
            data: { id: a_id}
        }).done(function( msg ) {
            alert("Advert is banned");
            location.reload();
        });
    }
</script>
@endsection    
