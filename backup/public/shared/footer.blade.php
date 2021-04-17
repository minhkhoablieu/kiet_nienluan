<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2><span>MIS Shop CTU</span></h2>
                    <p>Không gian sáng chế, Đại học Cần Thơ</p>
                    <p>Địa chỉ: Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ</p>
                    <p>Số điện thoại: 02923 3834 267</p>
                    <p> E-mail: mis@ctu.edu.vn  </p>
                    <div class="footer-social">
                        <span href="https://www.facebook.com/MISCTU6789/" target="_blank"><i class="fa fa-facebook"></i></span>
                        <span href="#" target="_blank"><i class="fa fa-youtube"></i></span>                      
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Người dùng</h2>
                    <ul>
                        <li><a href="#">Tài khoản</a></li>
                        <li><a href="#">Lịch sử đơn hàng</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Danh mục</h2>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{$category->slug}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2020 All Rights Reserved. </p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->
