@extends('layouts.main')

@section('content')
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('Bài viết')}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{route('cms/post/add')}}"><i class="fa fa-chevron-up"></i> {{trans('Thêm mới')}}</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">{{trans('Hình')}}</th>
                                <th class="column-title">{{trans('Tên bài viết')}}</th>
                                <th class="column-title">{{trans('Danh mục')}}</th>
                                <th class="column-title">{{trans('Trạng thái')}}</th>
                                <th class="column-title no-link last"><span class="nobr">{{trans('Thao tác')}}</span>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $row)
                                <tr class="even pointer">
                                    <td class=" ">@if ($row->post_picture != null) {{$row->post_picture}} @endif</td>
                                    <td class=" ">{{ $row->post_title }}</td>
                                    <td class=" ">{{ $row->category_name }}</td>
                                    <td class=" ">{{ $row->post_status }}</td>
                                    <td class=" last">
                                        <a href="{{route('cms/post/edit', ['id' => $row->post_id])}}">{{trans('Cập nhật')}}</a>
                                        &nbsp;|&nbsp;
                                        <a href="{{route('cms/post/delete', ['id' => $row->post_id])}}"
                                                 onclick="if (confirm('Bạn có muốn xóa')) { return true;} else {return false;}">{{trans('Xóa')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection