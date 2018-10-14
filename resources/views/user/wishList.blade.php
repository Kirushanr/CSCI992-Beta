@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="wishList">
            <div class="panel panel-default">
                <div class="panel-heading">My wish list</div>
                <div class="panel-body">
                    <ul>
                        @foreach($ads as $ad)
                            <li><a href="{{ route('showAd', $ad->id) }}">{!! $ad->title !!}</a></li>
                        @endforeach
                    </ul>
                    <div class="pull-right">{!! $ads->render() !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection