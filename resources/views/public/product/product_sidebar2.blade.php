{{-- <div class="d-lg-block"> --}}
    <div class="col-xs-6 d-md-none" style="padding-left: 10%";>
        <!-- Shop Sidebar -->
        <div class="shop_sidebar">
            <div class="sidebar_section">
                <div class="sidebar_title">Danh mục</div>
                <ul class="sidebar_categories">
                    @foreach($categories as $category)
                    <li><a href="#">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-6 pl-5 d-md-none">
        <div class="shop_sidebar">
            <div class="sidebar_section">
                <div class="sidebar_title">Thương hiệu</div>
                <ul class="brands_list">
                    @foreach($brands as $brand)
                    <li class="brand"><a href="#">{{$brand->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

{{-- </div> --}}
