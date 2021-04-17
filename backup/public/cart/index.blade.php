@extends('public.layout.app')
@section('content')


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class=col-sm>
            <div class="link-page">
                <div class="{{request()->routeIs('home.index') ? 'active' : ''}}" ><a href="{{route('home.index')}}">Trang chủ</a>
                    <a> &#62;</a>
                    <a> Giỏ hàng </a>
                </div>
            </div>
        </div>
        <div class="row">
            @include('public.shared.suggestion')
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="#">×</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/product-thumb-2.jpg"></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="single-product.html">Ship Your Idea</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">£15.00</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" class="minus" value="-">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="1" step="1">
                                                <input type="button" class="plus" value="+">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">£15.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  colspan="9">
                                            <input type="submit" value="Làm mới giỏ hàng" name="update_cart" class="button">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
			<div class="col-md-4">
				<div class="cart_totals ">
                    <h2 margin="10px">Xác nhận đơn hàng</h2>
					<p><label class="cart-name">Họ và tên<abbr title="required" class="required">*</abbr></label></p>
					<p><input type="text" value="" placeholder="" class="cart-input"></p>
					<p><label class="cart-phone">Số điện thoại<abbr title="required" class="required">*</abbr></label></p>
					<p><input type="text" value="" placeholder="" class="cart-input"></p>
                    <p><label class="cart-address">Địa chỉ nhận<abbr title="required" class="required">*</abbr></label></p>
                    <p><textarea row="5" col="20" name="address" class="cart-input"></textarea></p>
                    <div class="btn-box">
                        <button type="submit">Xác nhận đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
