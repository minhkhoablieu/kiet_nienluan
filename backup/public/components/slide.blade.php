<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            @foreach($banners as $banner)
            <li>
            
            <a  href="{{$banner->url}}"><img src="{{asset($banner->image)}}" alt="Slide"></a>
{{--                <div class="caption-group">--}}
{{--                    <h2 class="caption title">--}}
{{--                         <span class="primary">{{$banner->title}}</span>--}}
{{--                    </h2>--}}
{{--                    <h4 class="caption subtitle">{{$banner->subtitle}}</h4>--}}
{{--                    <a class="caption button-radius" href="{{$banner->url}}"><span class="icon"></span>Shop now</a>--}}
{{--                </div>--}}
            </li>
            @endforeach

        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->
