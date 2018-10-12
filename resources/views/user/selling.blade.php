@extends('layouts.master')

@section('title', 'my sellings')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">my sellings({{Auth::user()->name}})</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>product</th>
                            <th>price</th>
                            <th>publish date</th>
                            <th>operation</th>
                        </tr>
                        </thead>
                        <tbody class="product_list">
                        @if(count($ads) > 0)
                        @foreach($ads as $ad)
                            <tr data-id="{{ $ad->id }}">
                                <td class="product_info">
                                    <div class="preview">
                                        <a target="_blank" href="#">
                                            <img src="/uploads/20180917/{{ $ad->image }}">
                                        </a>
                                    </div>
                                    <div class="product_text">
                                        <span class="product_title">
                                            <a target="_blank" href="#">{{ $ad->title }}</a>
                                        </span>
                                        <span class="description">{{ $ad->description }}</span>
                                    </div>
                                </td>
                                <td><span class="price">{{ $ad->price }}</span></td>
                                <td>
                                    <span class="created_at">{{ $ad->created_at }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-danger btn-remove">Delete</button>
                                    <button class="btn btn-xs btn-danger btn-edit">Edit</button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        {!! $ads->render() !!}
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-remove').click(function () {

                // closest() will get the ancestor node, it is the tr node here
                // data('id') method will get the value of data-id
                var id = $(this).closest('tr').data('id');
                swal({
                    title: "Are you sure about remove your ad？",
                    icon: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText:
                        'Yes',
                    cancelButtonText:
                        'No',
                    dangerMode: true,
                })
                    .then(function(willDelete) {
                        // User click Yes: willDelete true(vice versa)
                        if (!willDelete) {
                            return;
                        }
                        axios.delete('/post/ad/' + id)
                            .then(function () {
                                location.reload();
                            })
                    });
            });

            $('.btn-edit').click(function() {
                var id = $(this).closest('tr').data('id');
                location.href = '/post/ad/' + id + '/edit'
            })
        });
    </script>
@endsection