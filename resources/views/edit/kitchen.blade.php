@extends('layouts.master')
@section('content')
    @include('shared._errors')
    <form class="form-horizontal" action="{{ route('createAd', 3) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="KitchenWare Name" value="{{ $advert->pluck('title') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Model</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="model" name="model" placeholder="model" value="{{ old('model') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Warranty</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="warranty" name="warranty" placeholder="warranty" value="{{ old('warranty') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Visibility</label>
            <div class="radio">
                <label>
                    <input type="radio" name="visibility" id="optionsRadios1" value="1" checked>Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="visibility" id="optionsRadios2" value="0">No
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputfile" class="sr-only">Image</label>
            <input type="file" id="inputfifle" name="uploadfile">
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="comment" value="{{ old('description') }}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Publish</button>
            </div>
        </div>
    </form>

@endsection