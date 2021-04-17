<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Danh mục</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        @foreach($categories as $category)
                        <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <a href="{{route('product.index', ['category' => $category->slug])}}">

                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">

                                        <div class="popular_category_image"><img src="{{asset($category->image)}}" alt=""></div>
                                        <div class="popular_category_text">{{$category->name}}</div>

                                    </div>

                                </a>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
