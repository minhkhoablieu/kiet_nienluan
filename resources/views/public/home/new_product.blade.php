<div class="max-w-screen-xl	mx-auto">
     <section id="product" class="my-8">
        <p class="text-center uppercase text-xl my-4">Sản phẩm mới</p>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($products as $product)
            <a href="{{route('product.show', $product->slug)}}">
                <div class="hover:shadow-lg">
                <div class="bg-gray-100">
                    <img src="{{$product->image}}" alt="">
                </div>
                <div class="m-2">
                    <span class="p-1 bg-blue-500 text-white text-xs">
                        NEW
                    </span>
                    <div class="my-1  text-sm">
                        {{$product->name}}
                    </div>

                   <div class="my-1 text-sm">
                       <div class="flex justify-between">
                            <div>{{$product->sale_convert}}</div>
                            <div class="line-through">{{$product->price_convert}}</div>

                        </div>
                    </div>
                </div>

            </div>
            </a>
            @endforeach


        </div>
    </section>
</div>
