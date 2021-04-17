@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Chỉnh sửa danh mục</h1>
@stop

@section('content')
    <form action="{{route('admin.categories.update', [$category->id])}}" method="POST">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                <a href="{{ URL::previous() }}" class="btn btn-info float-right"
                   type="button">
                    Back list
                </a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Danh mục</label>
                    <div class="select2-purple">
                        <select class="select2" id="select2" required name="parent_id" data-placeholder="Choose category" data-dropdown-css-class="select2-purple" style="width: 100%;">

                            <option value=0 @if(empty($category->parent)) selected @endif>Không chọn cái này nếu thêm danh mục chính</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" @if(!empty($category->parent) && $category->parent->id == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <p>Lưu ý: nếu muốn thêm danh mục phụ thì chọn danh mục chính ở phía trên</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input name="name" id="name" class="form-control" value="{{$category->name}}">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label for="exampleInputFile">Chọn hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input id="thumbnail" class="form-control" type="text" name="image" value="{{$category->image}}">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="input-group-text">
                                        <i class="fa fa-picture-o"></i> Chọn hình ảnh
                                    </a>
                                 </span>
                            </div>
                        </div>
                        <p></p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="active"  name="active" @if($category->active) checked @endif>
                            <label class="form-check-label" for="active">Active</label>
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


