@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Banner</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.banners.create')}}" class="btn btn-info float-right"
                    type="button">
                Add
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>URL</th>
                    <th>Sắp xếp</th>
                    <th>Trạng thái</th>
                    <th>hoạt động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td><img src="{{asset($banner->image)}}" alt="{{$banner->title}}" width="200px"></td>
                        <td>{{asset($banner->url)}}</td>
                        <td>{{($banner->order)}}</td>
                        <td>{!! $banner->status !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-info btn-sm" href="{{route('admin.banners.edit', $banner->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.banners.destroy', $banner->id)}}" data-id="{{$banner->id}}">
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

