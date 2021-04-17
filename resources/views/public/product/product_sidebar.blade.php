<div class="col-lg-3 d-none d-md-block">
    <!-- Shop Sidebar -->
    <div class="shop_sidebar">
        <div class="sidebar_section">
            <div class="sidebar_title">Danh mục</div>
            <ul class="sidebar_categories">
                @foreach($categories as $category)
                <li><a href="{{route('product.index', ['category' => $category->slug])}}" >{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="sidebar_section">
            <div class="sidebar_title">Thương hiệu</div>
            <ul class="brands_list">
                @foreach($brands as $brand)
                <li class="brand"><a href="{{route('product.index', ['brand' => $brand->slug])}}">{{$brand->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
