@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header">
{{--        <h3 class="card-title"><?= $title ?></h3>--}}
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="select2">Danh mục</label>
                <div class="select2-purple">
                    <select class="select2" id="select2" required name="categories[]" multiple="multiple" data-placeholder="Choose category" data-dropdown-css-class="select2-purple" style="width: 100%;">

                        @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                            @foreach($item->children as $subcategory)
                                <option value="{{ $subcategory->id }}"> -- {{$subcategory->name}}</option>
                            @endforeach
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="select2">Brand</label>
                <div class="select2-purple">
                    <select class="select2" id="select2" required name="brand"  data-placeholder="Choose category" data-dropdown-css-class="select2-purple" style="width: 100%;">

                        <option value=-1 >No brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{$brand->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <input name="user_id" type="hidden" value="{{Auth::id()}}">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input required=”required” type="text" name="name" class="form-control" id="name" placeholder="" value="<?= old('name') ?>">
            </div>

            <div class="form-group col-12">
                <label for="exampleInputFile">Choose images</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input required=”required” id="image" class="form-control" type="text" name="image" value="{{old('image')}}">
                        <span class="input-group-btn">
                                <a id="lfm" data-input="image" data-preview="holder" class="input-group-text">
                                    <i class="fa fa-picture-o"></i> Choose images
                                </a>
                             </span>
                    </div>
                </div>
            </div>

            <div class="form-group col-12">
                <label for="exampleInputFile">Choose thumbnail</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input required=”required” id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{old('thumbnail')}}">
                        <span class="input-group-btn">
                                <a id="thumbnail_input" data-input="thumbnail" data-preview="holder" class="input-group-text">
                                    <i class="fa fa-picture-o"></i> Choose images
                                </a>
                             </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input min=0 required type="number" name="price" class="form-control" id="price" placeholder="100000" value="<?= old('price') ?>">
            </div>
            <div class="form-group">
                <label for="amount">The remaining amount</label>
                <input min=0 required type="number" name="amount" class="form-control" id="amount" placeholder="1" value="<?= old('amount') ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Description</label>
                <textarea id="content" name="content"></textarea>
            </div>

            <div class="form-group">
                <label for="specifications">Specifications</label>
                <textarea id="specifications" name="specifications"></textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active"  name="active">
                <label class="form-check-label" for="active">Active</label>
            </div>

            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_new"  name="is_new">
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
