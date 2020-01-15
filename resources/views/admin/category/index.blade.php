@extends('layouts.main')

@section('content')
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('Danh mục')}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{route('cms/category/add')}}"><i class="fa fa-chevron-up"></i> {{trans('Thêm mới')}}</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">{{trans('Tên danh mục')}}</th>
                                <th class="column-title no-link last"><span class="nobr">{{trans('Thao tác')}}</span>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $row)
                                <tr class="even pointer">
                                    <td class=" ">{{ StrRepeat("__", $row->category_level) }} {{ $row->category_name }}</td>
                                    <td class=" last">
                                        <a href="{{route('cms/category/edit', ['id' => $row->category_id])}}">{{trans('Cập nhật')}}</a>
                                        &nbsp;|&nbsp;
                                        <a href="{{route('cms/category/delete', ['id' => $row->category_id])}}"
                                                 onclick="if (confirm('Bạn có muốn xóa')) { return true;} else {return false;}">{{trans('Xóa')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection