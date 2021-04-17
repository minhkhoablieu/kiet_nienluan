 <section id="banner">
      <div class="swiper-container-banner">
    <div class="swiper-wrapper">
        @foreach ($banners as  $banner)
            <img  class="swiper-slide" src="{{$banner->image}}" class="w-full" alt="">
        @endforeach
    </div>
     <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
    <div class="flex bg-gray-100 p-4">
        <div class="flex-1 text-center text-sm uppercase">Freeship</div>
        <div class="flex-1 text-center text-sm uppercase">Hoàn trả miễn phí</div>
        <div class="flex-1 text-center text-sm uppercase"><i class="fas fa-watch"></i>Bảo hành 2 năm</div>
    </div>
</section>
@push('js')
<script>
 var swiper = new Swiper('.swiper-container-banner', {
      spaceBetween: 30,
      loop: true,
      centeredSlides: true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
     pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>
@endpush
