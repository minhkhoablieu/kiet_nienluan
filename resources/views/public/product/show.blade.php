@extends('public.layout.app')
@section('css')

@endsection
@section('content')
    @include('public.shared.banner')
    <div class="max-w-screen-xl mx-auto mt-5">
        <section class="p-4">
               <div class="flex flex-col md:flex-row">
                    <div class="w-full">
                        <div class="">
                            <div class="">
                                <img class="" src="{{$product->image}}"
                                    alt="">

                            </div>
                        </div>

                    </div>
                    <div class="w-full">
                        <span class="p-1 bg-blue-500 text-white text-xs">NEW</span>
                        <div class="flex justify-between">
                            <p class="my-2">
                                {{$product->name}}
                            </p>
                            <p class="my-2">
                                {{$product->price_convert}}
                            </p>
                        </div>

                        <div class="border-b-2 my-2"></div>
                        <div class="flex">
                            <div>
                                <p>
                                    Size
                                </p>
                                <ul class="flex">
                                    @foreach (explode(',',$product->size) as $size)
                                        <li class="bg-white p-3 text-black border-2 border-blue-500 hover:bg-blue-500 hover:text-white">{{$size}}</li>
                                    @endforeach

                                </ul>
                            </div>


                        </div>
                        <div class="bg-blue-500	p-5 text-center text-white mt-4"  id="cart_button_2">
                            <p>THÊM VÀO GIỎ HÀNG</p>
                        </div>
                        <div>
                            <ul class="font-sans py-4">
                                <li><i class="fas fa-caret-right"></i> FREESHIP</li>
                                <li><i class="fas fa-caret-right"></i> Miễn phí hoàn trả</li>
                                <li><i class="fas fa-caret-right"></i> Bảo hành 2 năm </li>
                            </ul>
                        </div>
                    </div>
               </div>
           </section>
           <section class="p-4">
               <p>Thông tin chi tiết</p>
               <div  class="border-b-2 my-2"></div>
               <div class="flex flex-col md:flex-row">
                    <div class="w-full">
                        {!! $product->content !!}
                    </div>
                    <div class="w-full">
                         {!! $product->specifications !!}
                    </div>
               </div>


           </section>
            <section class="p-4">
                <div class="fb-comments" data-href="http://thptbaclieucfs.com/" data-width="100%" data-numposts="5"></div>
        </section>
        <div  class="border-b-2 my-2"></div>
    </div>

    @include('public.home.new_product')
@endsection
@push('css')
    <style>
        .active{
            background:#3B82F6;
            color:white;
        }
    </style>
@endpush
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


    $('ul li').click(function(){
        $('li').removeClass("active");
        $(this).addClass("active");
    });
    </script>
@endpush
