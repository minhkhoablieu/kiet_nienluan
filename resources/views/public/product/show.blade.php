@extends('public.layout.app')
@section('css')

@endsection
@section('content')
    @include('public.shared.banner')
    <div class="max-w-screen-lg mx-auto mt-5">
        <section>
               <div class="flex">
                    <div class="w-1/2 p-8">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <img class="swiper-slide" src="{{$product->image}}"
                                    alt="">

                            </div>
                        </div>

                    </div>
                    <div class="w-1/2">
                        <span class="p-1 bg-black text-white text-xs">NEW</span>
                        <p class="my-4">
                            {{$product->name}}
                        </p>
                        <div class="border-b-2 my-4"></div>
                        <div class="bg-gray-800	p-5 text-center text-white"  id="cart_button_2">
                            <p>THÊM VÀO GIỎ HÀNG</p>
                        </div>
                        <div>
                            <ul class="font-sans py-4">
                                <li>FREESHIP</li>
                                <li>Miễn phí hoàn trả</li>
                                <li>Bảo hành 2 năm </li>
                            </ul>
                        </div>
                    </div>
               </div>
           </section>
           <section>
               <p>Thông tin chi tiết</p>
               <div  class="border-b-2 my-2"></div>
               <div class="flex flex-wrap">
                    <div class="w-1/2">
                        {!! $product->content !!}
                    </div>
                    <div class="w-1/2">
                         {!! $product->specifications !!}
                    </div>
               </div>


           </section>
        <div  class="border-b-2 my-2"></div>
    </div>

    @include('public.home.new_product')
@endsection
@push('js')
    {{-- <script src="{{asset('js/product_custom.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
 --}}

    <script>
        console.log('adsad')
        $( "#cart_button_2" ).click(function() {

            product = {{ $product->id }}
            quantity = $('#quantity_input').val();
            $.ajax({
                url: `/cart/${product}`,

                data:{
                    quantity: quantity
                },
                type: "POST",

            })

            .done((data) =>{
                console.log((data))
                $(".cart_count").text(data)
                Swal.fire(
                    `Bạn đã thêm sản phẩm vào giỏ `,
                    '',
                    'success'
                )

            })

        });



    </script>
@endpush
