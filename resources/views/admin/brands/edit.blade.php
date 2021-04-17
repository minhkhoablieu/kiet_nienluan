@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Chỉnh sửa thương hiệu</h1>
@stop

@section('content')
    <form action="{{route('admin.brands.update', [$brand->id])}}" method="POST">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                <a href="{{ URL::previous() }}" class="btn btn-info float-right"
                   type="button">
                    Back list
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên thương hiệu</label>
                            <input name="name" id="name" class="form-control" value="{{$brand->name}}">
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputFile">Chọn hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input id="thumbnail" class="form-control" type="text" name="image" value="{{$brand->image}}">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="input-group-text">
                                    <i class="fa fa-picture-o"></i> chọn hình ảnh
                                </a>
                             </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input name="website" id="redirect_to" class="form-control" value="{{$brand->website}}">
                            <small id="url" class="form-text text-muted">Liên kết sẽ chuyển hướng khi nhấp vào hình ảnh</small>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="order">Hiển thị đơn hàng</label>
                            <input type="number" min="1" name="order" class="form-control" value="{{$brand->order}}">
                        </div>
                        <p></p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="active"  name="active" @if($brand->active) checked @endif>
                            <label class="form-check-label" for="active">Hoạt động</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@stop

