@extends('public.layout.app')
@section('css')



@endsection
@section('content')
<main>
@include('public.shared.banner')

<div class="max-w-screen-xl	mx-auto">
    <div class="max-w-screen-xl	mx-auto">
        <section id="search">
        <div class="relative mr-6 my-2 w-full">
            <form action="{{Request::fullUrl()}}" method="GET">


            <input type="search" name="search" class="bg-purple-white shadow rounded border-0 p-3 w-full" placeholder="Tìm kiếm sản phảm" value="{{Request::get('search')}}">
            <button type="submit" class="absolute pin-r pin-t mt-3 mr-4 text-purple-lighter top-0 right-0">
                <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                    <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
S32.459,40,21.983,40z" />

                </svg>

            </button>
            </form>
        </div>
            </section>
        </div>
     <section id="product" class="my-8 p-4">

        <div class="flex flex-col md:flex-row">
            <div class="w-full lg:w-1/4">
                <ul>
                    Tìm kiếm theo Danh mục
                    @foreach($categories as $category)
                    <li class="">
                        <div class="bg-gray-100 mt-4 ">
                            <div class="bg-blue-500 p-2 rounded-t-lg">
                                <p class="text-white uppercase">{{$category->name}}</p>
                            </div>
                            @if($category->children->isNotEmpty())
                            <div class="p-2">
                                @foreach($category->children as $subcategory)
                                <a  href="{{route('product.index', ['category' => $subcategory->slug])}}" class="block" ><p>{{$subcategory->name}}</p></a>
                                @endforeach

                            </div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                <ul class="mt-4 border-t-2">
                    Tìm kiếm theo giá
                    <li>
                        <a  href="{{route('product.index', ['price' => "0-500000"])}}">0 - 500.000đ</a>
                    </li>
                    <li>
                         <a href="{{route('product.index', ['price' => "500000-1000000"])}}">
                             500.000đ - 1.000.000đ
                         </a>
                    </li>
                    <li>
                         <a href="{{route('product.index', ['price' => "1000000-2000000"])}}">
                             1.000.000đ - 2.000.000đ
                         </a>
                    </li>
                    <li>
                         <a href="{{route('product.index', ['price' => "2000000-4000000"])}}">
                             2.000.000đ - 4.000.000đ
                         </a>
                    </li>
                    <li>
                         <a href="{{route('product.index', ['price' => "4000000-6000000"])}}">
                             4.000.000đ - 6.000.000đ
                         </a>
                    </li>
                </ul>
            </div>
            <div class=" w-full lg:w-3/4">
                 @if(Request::get('search'))
                    <p class="text-center uppercase text-xl my-4"> Tìm kiếm sản phẩm với từ khoá {{Request::get('search')}} </p>
                @else
                    <p class="text-center uppercase text-xl my-4">Tất cả sản phẩm
                        @if (Request::get('category'))
                            theo danh mục
                        @endif
                    </p>
                @endif
                <div class="grid grid-cols-3 gap-4">
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
                                <div class="my-1 text-sm">
                                    {{$product->name}}
                                </div>

                                <div class="flex justify-between">
                                    <div>{{$product->sale_convert}}</div>
                                    <div class="line-through">{{$product->price_convert}}</div>

                                </div>
                            </div>

                        </div>
                    </a>
                    @endforeach

                </div>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>


            </div>
        </div>

    </section>
</div>
</main>
@endsection
@section('js')

@endsection
