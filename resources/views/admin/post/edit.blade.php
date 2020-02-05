@extends('layouts.main')

@section('content')

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('Cập nhật bài viết')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <br />

                        {!! Form::open(['method' => 'post']) !!}
                        @csrf
                        <div class="item form-group">
                            {!! Form::label('email', trans('Tiêu đề'), ['class' => 'col-form-label col-md-3 col-sm-3 label-align'])  !!}
                            <div class="col-md-6 col-sm-6 ">
                                {!! Form::text('post_title', $data->post_title, ['class' => 'form-control', 'required' => 'required', 'id' => 'post_title']) !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            {!! Form::label('email', trans('Danh mục'), ['class' => 'col-form-label col-md-3 col-sm-3 label-align']) !!}
                            <div class="col-md-6 col-sm-6 ">
                                {!! Form::select('category_id', $categoriesSelect, $data->category_id, ['class' => 'form-control', 'required' => 'required', 'id' => 'category_id']) !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            {!! Form::label('email', trans('Trạng thái'), ['class' => 'col-form-label col-md-3 col-sm-3 label-align']) !!}
                            <div class="col-md-6 col-sm-6 ">
                                {!! Form::select('post_status', $statusList, $data->post_status, ['class' => 'form-control', 'required' => 'required', 'id' => 'post_status']) !!}
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                {!! Form::button(trans('Xóa'), ['class' => 'btn btn-primary', 'type' => 'reset']) !!}
                                {!! Form::submit(trans('Cập nhật'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::open() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection