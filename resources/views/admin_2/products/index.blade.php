@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh sách sản phẩm </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.products.create')}}" class="btn btn-info float-right"
                    type="button">
                Thêm
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    {{-- <th>New Product</th> --}}
                    <th>Trạng thái</th>
                    <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>
                            @foreach($product->categories as $category)
                                {{$category->name}} <br>
                            @endforeach
                        </td>
                        <td>
                            {{-- @if($product->brand != null) --}}

                           {{$product->brand->name}}
                           {{-- @endif --}}
                        </td>
                        <td><img src="{{asset($product->image)}}" alt="{{$product->image}}" width="20%"></td>
                        <td>{{($product->price)}}</td>
                        {{-- <td>{!! $product->is_new !!}</td> --}}
                        <td>{!! $product->status !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-info btn-sm" href="{{route('admin.products.edit', $product->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.products.destroy', $product->id)}}" data-id="{{$product->id}}">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

