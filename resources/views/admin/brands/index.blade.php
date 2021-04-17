@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Thương hiệu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.brands.create')}}" class="btn btn-info float-right"
                    type="button">
                thêm
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Tên thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>Website</th>
                    <th>Sắp xếp</th>
                    <th>Trạng thái</th>
                    <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->name}}</td>
                        <td><img src="{{asset($brand->image)}}" alt="{{$brand->name}}" width="20%"></td>
                        <td>{{$brand->website}}</td>
                        <td>{{($brand->order)}}</td>
                        <td>{!! $brand->status !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-info btn-sm" href="{{route('admin.brands.edit', $brand->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.brands.destroy', $brand->id)}}" data-id="{{$brand->id}}">
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

