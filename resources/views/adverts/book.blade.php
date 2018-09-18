@extends('layouts.master')
@section('content')
    @include('shared._errors')
    <form class="form-horizontal" action="{{ route('createAd', 1) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Book Name" value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN No." value="{{ old('isbn') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Course Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code" placeholder="Course Code" value="{{ old('code') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="{{ old('author') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Edition</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edition" name="edition" placeholder="Edition" value="{{ old('edition') }}">
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
            <label class="sr-only">Image</label>
            <input type="file" id="uploadfile" name="uploadfile">
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