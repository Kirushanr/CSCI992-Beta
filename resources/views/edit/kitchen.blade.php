@extends('layouts.master')
@section('content')
    @include('shared._errors')
    <form class="form-horizontal" action="{{ route('updateAd', $advert->pluck('id')[0]) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="KitchenWare Name" value="{{ $advert->pluck('title')[0] }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Model</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="model" name="model" placeholder="model" value="{{ $categories->pluck('model')[0] }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Warranty</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="warranty" name="warranty" placeholder="warranty" value="{{ $categories->pluck('warranty')[0] }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ $advert->pluck('price')[0] }}">
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
            <label class="col-sm-2 control-label">Image</label><br />
            <!-- image upload and display -->
            <input style="padding:10px;background:#2d2d2d;margin-left: 15px;" type='file' onchange="readURL(this);" id="uploadfile" name="uploadfile"/><br/><br/>
            <img style="max-width:180px;margin-left: 15px;" id="blah" src="/uploads/20180917/{{ $advert->pluck('image')[0] }}" alt="your image" />
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="comment" value="{{ $advert->pluck('description')[0] }}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Publish</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection