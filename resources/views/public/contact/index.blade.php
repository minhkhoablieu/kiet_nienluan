@extends('public.layout.app')
@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/header_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/footer_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">

@endsection
@section('content')

<!-- Contact Info -->

<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('images/contact_1.png')}}" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text">02923 3834 267</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('images/contact_2.png')}}" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div href="mailto:mis@ctu.edu.vn" class="contact_info_text">mis@ctu.edu.vn</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="{{asset('images/contact_3.png')}}" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text">Trường ĐHCT Khu 2 đường 3/2 Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Liên hệ chúng tôi</div>


                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" id="contact_form_name" name="name" class="contact_form_name input_field" placeholder="Tên của bạn" required="required" data-error="Name is required.">
                            <input type="text" id="contact_form_email" name="email" class="contact_form_email input_field" placeholder="Mail" required="required" data-error="Email is required.">
                            <input type="text" id="contact_form_phone" name="phone" class="contact_form_phone input_field" placeholder="Số điện thoại">
                        </div>
                        <div class="contact_form_text">
                            <textarea id="contact_form_message" name="content" class="text_field contact_form_message"  rows="4" placeholder="Nội dung..." required="required" data-error="Vui lòng soạn nội dung."></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" id="contact_submit" class="button contact_submit_button">Gửi</button>
                        </div>


                </div>
            </div>
        </div>
    </div>
    <div class="panel"><a> We are here! </a></div>
</div>

<!-- Map -->

<div class="contact_map">
    <div id="google_map" class="google_map">
        <div class="map_container">
            <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.0376867436744!2d105.76681311461577!3d10.030883692830004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2zS2hvYSBDw7RuZyBOZ2jhu4cgVGjDtG5nIFRpbiB2w6AgVHJ1eeG7gW4gVGjDtG5nIChDVFUp!5e1!3m2!1svi!2s!4v1596389140287!5m2!1svi!2s" width="1688" height="430" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
    <script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('js/contact_custom.js')}}"></script>
    <script>
        $('#contact_submit').click(function () {
            let name = $('#contact_form_name').val();
            let phone = $('#contact_form_phone').val();
            let email = $('#contact_form_email').val();
            let content = $('#contact_form_message').val();

            $.post('/contact',{
                name: name,
                phone: phone,
                email: email,
                content: content
            })
            .done(function(data){
                Swal.fire(
                    'Thành công!',
                    'Chúng tôi sẽ sớm liên hệ lại với bạn!',
                    'success'
                )
                $("input").val("");
                $('#contact_form_message').val('');
            })

        })

    </script>
@endsection
