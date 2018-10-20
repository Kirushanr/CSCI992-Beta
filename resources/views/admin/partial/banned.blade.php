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
                    <th>Banned on</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banned as $report)
                <tr>
                    <td>{{$report->advert_id}}</td>
                    <td>{{$report->report_type}}</td>
                    <td>{{$report->description}}</td>
                    <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans()}}</td>
                    <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($report->updated_at))->diffForHumans()}}</td>
                  
               
                </tr>
                @empty
                <div class="col-md-12">
                    <p class="alert alert-danger font-weight-bold mt-2 text-center">No adverts were banned</p>
                </div>
                @endforelse
            </tbody>
        </table>
@endsection
   
