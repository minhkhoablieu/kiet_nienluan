<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo">
                    <h1><a class="{{request()->routeIs('home.index') ? 'active' : ''}}" ><a href="{{route('home.index')}}"><img src="img/logo.png"></a></h1>
                </div>
            </div>
       </div>
    </div>
</div>
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li  class="{{request()->routeIs('home.index') ? 'active' : ''}}" ><a href="{{route('home.index')}}">Trang chủ</a></li>
                    <li class="dropdown {{request()->routeIs('category.show') ? 'active' : ''}}">
                        <a class="dropbtn">Danh mục</a>
                        <div class="dropdown-content">
                            @foreach($categories as $category)
                            <span href="{{$category->slug}}">{{$category->name}}</span>
                            @endforeach
                        </div>
                    </li>
                    <li  class="{{request()->routeIs('product.index') ? 'active' : ''}}" ><a href="{{route('product.index')}}">Sản phẩm</a></li>
                    <li class="{{request()->routeIs('contact.index') ? 'active' : ''}}" ><a href="{{route('contact.index')}}">Liên hệ chúng tôi</a></li>
                </ul>

            <span class="shopping-item">
                <a href="{{route('cart.index')}}" class="{{request()->routeIs('cart.index') ? 'active' : ''}}" ><span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
            </span>

        </div>
        </div>
    </div>
</div>



<!-- End mainmenu area -->
