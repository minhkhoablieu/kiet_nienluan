@extends('public.layout.app')
@section('content')
<div class="single-product-area">
    <div class="container">
        <div class=col-sm-4>
            <div class="row link-page">
                <div class="{{request()->routeIs('home.index') ? 'active' : ''}}" ><a href="{{route('home.index')}}">Trang chủ</a>
                    <a>&#62;</a>
                    <a> Danh mục </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row category-row">
            <div class="category-label">ARDUINO</div>
            <div class="category-item active">Aruino Shields</div>
            <div class="category-item">Aruino Boards</div>
            <div class="category-item">Phụ Kiện Aruino</div>
        </div>
        <div class="row category-row">
            <div class="category-label">CẢM BIẾN</div>
            <div class="category-item">Khí & ga</div>
            <div class="category-item ">Chuyển động & Rung</div>
            <div class="category-item">Sinh học</div>
            <div class="category-item">Sò nóng lạnh Peltier</div>
        </div>
        <div class="row category-row">
            <div class="category-label">ROBOT-ĐIỂU KHIỂN</div>
            <div class="category-item">Khung Robot</div>
            <div class="category-item ">Phụ kiện Robot</div>
            <div class="category-item">Bánh xe</div>
            <div class="category-item">Pin & Sạc</div>
        </div>
        <div class="row category-row">
            <div class="category-label">MODULE-MẠCH ĐIỆN</div>
            <div class="category-item">RF</div>
            <div class="category-item ">GSM</div>
            <div class="category-item">Bluetooth</div>
            <div class="category-item">Wifi</div>
        </div>
        <div class="row category-row">
            <div class="category-label">SIGN BOARDS COMPUTER</div>
            <div class="category-item">Raspberry Pi</div>
            <div class="category-item ">Raspberry Pi HAT</div>
            <div class="category-item">Modules</div>
            <div class="category-item">Phụ kiện Raspberry Pi</div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 five-in-a-row">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{asset($product->thumbnail)}}" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="{{route('product.show', $product->slug)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            <h2><a href="{{route('product.show', $product->slug)}}">{{$product->name}}</a></h2>
                            <div class="product-carousel-price">
                                <ins>{{$product->price}}</ins>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


