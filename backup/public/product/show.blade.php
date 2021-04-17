@extends('public.layout.app')
@section('content')
@include('public.components.big-title-area');

<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @include('public.shared.suggestion')
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Trang chủ</a>
                            <a href="">Tên danh mục</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{asset($product->thumbnail)}}" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{$product->price}}</ins>
                                    </div>

                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Thêm vào giỏ hàng</button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>
                                            Danh mục:
                                            @foreach($product->categories as $category)
                                                <a href="">{{$category->name}}</a>
                                            @endforeach
                                        </p>
                                    </div>


                                    </div>

                            </div>
								<div class="col-sm-12">

                                        <div class="product-show-description">
                                            <div>
                                                <h2>Thông tin sản phẩm</h2>
                                                {!! $product->content !!}
                                            </div>

                                        </div>
							    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
