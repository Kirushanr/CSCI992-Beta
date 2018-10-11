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
            // 监听 移除 按钮的点击事件
            $('.btn-remove').click(function () {
                // $(this) 可以获取到当前点击的 移除 按钮的 jQuery 对象
                // closest() 方法可以获取到匹配选择器的第一个祖先元素，在这里就是当前点击的 移除 按钮之上的 <tr> 标签
                // data('id') 方法可以获取到我们之前设置的 data-id 属性的值，也就是对应的 SKU id
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
                        // 用户点击 确定 按钮，willDelete 的值就会是 true，否则为 false
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