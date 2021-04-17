<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Thương hiệu</div>
                    <div class="deals_slider_container text-center">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                            @foreach($brands as $brand)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">

                                    <div class="deals_image"><img src="{{asset($brand->image)}}" alt=""></div>
                                    <div class="deals_content">

                                            <div class="deals_item_category "><a href="#">Tên thương hiệu</a></div>
                                            <div class="deals_item_name">{{$brand->name}}</div>



                                    </div>


                            </div>
                            @endforeach
                            <!-- Deals Item -->
{{--                            <div class="owl-item deals_item">--}}
{{--                                <div class="deals_image"><img src="{{asset('images/deals.png')}}" alt=""></div>--}}
{{--                                <div class="deals_content">--}}
{{--                                    <div class="deals_info_line d-flex flex-row justify-content-start">--}}
{{--                                        <div class="deals_item_category"><a href="#">Headphones</a></div>--}}
{{--                                        <div class="deals_item_price_a ml-auto">$300</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="deals_info_line d-flex flex-row justify-content-start">--}}
{{--                                        <div class="deals_item_name">Beoplay H7</div>--}}
{{--                                        <div class="deals_item_price ml-auto">$225</div>--}}
{{--                                    </div>--}}
{{--                                 </div>--}}
{{--                            </div>--}}

                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li>Sản Phẩm Mới</li>
                            </ul>
                            <div class="tabs_line"><span style="left: 0px; width: 119.85px;"></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @foreach($products as $product)

                                    <div class="featured_slider_item">
                                        <a href="{{route('product.show', $product->slug)}}">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($product->thumbnail)}}" alt="thumbnail"></div>
                                                <div class="product_content">
                                                    <div class="product_name content-custom"><div><a href="{{route('product.show', $product->slug)}}" tabindex="0">{{$product->name}}</a></div></div>
                                                    <div class="product_price discount">{{$product->price}}</div><p style="	color: #df3b3b;	display: inline;font-weight: bold;"> VND</p>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button" onclick="addcart({{$product->id}})" data-id="{{$product->id}}">Thêm vào giỏ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                            @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
