@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Chỉnh sửa sản phẩm</h1>
@stop

@section("content")
    <div class="card card-warning">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.products.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group">
                    <label for="select2">Danh mục</label>
                    <div class="select2-purple">
                        <select class="select2" id="select2" required name="categories[]" multiple="multiple" data-placeholder="Choose category" data-dropdown-css-class="select2-purple" style="width: 100%;">

                            @foreach($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ (in_array($item->id, $product->categories->pluck('id')->toArray())) ? 'selected' : '' }}
                                >{{$item->name}}
                                    @foreach($item->children as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ (in_array($subcategory->id, $product->categories->pluck('id')->toArray())) ? 'selected' : '' }}
                                        > |-- {{$subcategory->name}}
                                    @endforeach
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2">thương hiệu</label>
                    <div class="select2-purple">
                        <select class="select2" id="select2" required name="brand"  data-placeholder="Choose category" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value=-1 selected >không có thương hiệu</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @if($brand->id == $product->brand->id) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input name="user_id" type="hidden" value="{{Auth::id()}}">
                <div class="form-group">
                    <label for="name">tên sản phẩm</label>
                    <input required=”required” type="text" name="name" class="form-control" id="name" placeholder="" value="{{$product->name}}">
                </div>

                <div class="form-group col-12">
                    <label for="exampleInputFile">Chọn hình ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input required=”required” id="image" class="form-control" type="text" name="image" value="{{$product->image}}">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="image" data-preview="holder" class="input-group-text">
                                    <i class="fa fa-picture-o"></i> Chọn hình ảnh
                                </a>
                             </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label for="exampleInputFile">Choose thumbnail</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input required=”required” id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$product->thumbnail}}">
                            <span class="input-group-btn">
                                <a id="thumbnail_input" data-input="thumbnail" data-preview="holder" class="input-group-text">
                                    <i class="fa fa-picture-o"></i> Chọn hình ảnh
                                </a>
                             </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input required=”required” type="text" name="price" class="form-control" id="price" placeholder="100000" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="amount">Số lượng còn lại</label>
                    <input required=”required” type="number" name="amount" class="form-control" id="amount" placeholder="1" min="0" value="{{$product->amount}}" required>
                </div>

                <div class="form-group">
                    <label for="content">Miêu tả</label>
                    <textarea id="content" name="content">{{$product->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="specifications">Thông số kỹ thuật</label>
                    <textarea id="specifications" name="specifications" >{{$product->specifications}}</textarea>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="active"  name="active" @if($product->active) checked @endif>
                    <label class="form-check-label" for="active">Hoạt động</label>
                </div>

                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_new" name="is_new" @if($product->is_new) checked @endif>
                    <label class="form-check-label" for="is_new">New Product</label>
                </div> --}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
