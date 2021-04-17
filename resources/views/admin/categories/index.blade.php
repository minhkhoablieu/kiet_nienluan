@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh mục</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.categories.create')}}" class="btn btn-info float-right"
               type="button">
                Add
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Đường dẫn</th>
                    <th>Trạng Thái</th>
                    <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><img src="{{asset($category->image)}}" alt="{{$category->name}}" width="20%"></td>
                        <td>{{$category->slug}}</td>
                        <td>{!! $category->status !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-info btn-sm" href="{{route('admin.categories.edit', $category->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.categories.destroy', $category->id)}}" data-id="{{$category->id}}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

@stop
