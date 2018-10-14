@extends('layouts.master')

@section('content')
    <div class="products-show-page">
        <div class="col-lg-10 col-lg-offset-1" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-body product-info">
                    <div class="row">
                        <div class="col-sm-5">
                            <img class="cover" src="/uploads/20180917/{{ $advert->pluck('image')[0] }}" alt="">
                        </div>
                        <div class="col-sm-7">
                            <div class="title">{{ $advert->pluck('title')[0] }}</div>
                            <div class="price"><label>price</label><span>{{ $advert->pluck('price')[0] }}</span></div>
                            @if($type == '1')
                                <div class="isbn" style="margin-top: 10px;">
                                    <label>isbn</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('isbn')[0] }}">
                                </div>
                                <div class="courseCode" style="margin-top: 10px;">
                                    <label>courseCode</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('courseCode')[0] }}">
                                </div>
                                <div class="author" style="margin-top: 10px;">
                                    <label>author</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('author')[0] }}">
                                </div>
                                <div class="edition" style="margin-top: 10px;">
                                    <label>edition</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('edition')[0] }}">
                                </div>
                            @else
                                <div class="model" style="margin-top: 10px;">
                                    <label>model</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('model')[0] }}">
                                </div>
                                <div class="warranty" style="margin-top: 10px;">
                                    <label>warranty</label>
                                    <input type="text" class="form-control input-sm" value="{{ $categories->pluck('warranty')[0] }}">
                                </div>
                            @endif
                            <div class="buttons">
                                @if($favored)
                                    <button class="btn btn-danger btn-disfavor">Disfavor</button>
                                @else
                                    <button class="btn btn-success btn-favor">Favorite</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#product-detail-tab" aria-controls="product-detail-tab" role="tab" data-toggle="tab">Description</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="product-detail-tab">
                                {!! $advert->pluck('description')[0] !!}
                            </div>
                            <div role="tabpanel" class="tab-pane" id="product-reviews-tab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // favor
            $('.btn-favor').click(function () {
                // post ajax
                axios.post('{{ route('ad.favor', ['ad' => $advert->pluck('id')[0]]) }}')
                    .then(function () { // success
                        swal('This item is in your wish list now!', '', 'success')
                            .then(function() {
                                location.reload();
                            });
                    }, function(error) { // error
                        // 401: without login
                        if (error.response && error.response.status === 401) {
                            swal('Please login first', '', 'error');
                        } else if (error.response && error.response.data.msg) {
                            // supply error msg
                            swal(error.response.data.msg, '', 'error');
                        }  else {
                            // other errors
                            swal('system error', '', 'error');
                        }
                    });
            });

            // disfavor
            $('.btn-disfavor').click(function () {
                axios.delete('{{ route('ad.disfavor', ['ad' => $advert->pluck('id')[0]]) }}')
                    .then(function () {
                        swal('Delete this item from your wish list successful!', '', 'success')
                            .then(function () {
                                location.reload();
                            });
                    });
            });
        });
    </script>
@endsection