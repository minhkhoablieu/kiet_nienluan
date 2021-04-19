<div class="max-w-screen-lg	mx-auto">
     <section id="product" class="my-8">
        <p class="text-center uppercase text-xl my-4">Sản phẩm bán chạy</p>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($products as $product)
            <a href="{{route('product.show', $product->slug)}}">
                <div class="hover:shadow-lg">
                    <div class="bg-gray-100">
                        <img src="{{$product->image}}" alt="">
                    </div>
                    <div class="m-2">
                        <span class="p-1 bg-black text-white text-xs">
                            NEW
                        </span>
                        <div class="my-1  text-sm">
                            {{$product->name}}
                        </div>

                        <div class="my-1 text-sm">
                            {{$product->price_convert}}
                        </div>
                    </div>

             </div>
            </a>
            @endforeach


        </div>
    </section>
</div>
