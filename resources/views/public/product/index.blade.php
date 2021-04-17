@extends('public.layout.app')
@section('css')



@endsection
@section('content')
<main>
@include('public.shared.banner')

<div class="max-w-screen-lg	mx-auto">
    <div class="max-w-screen-lg	mx-auto">
        <section id="search">
        <div class="relative mr-6 my-2 w-full">
            <form action="{{route('product.index')}}" method="GET">


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
     <section id="product" class="my-8">
         @if(Request::get('search'))
<p class="text-center uppercase text-xl my-4"> Tìm kiếm sản phẩm với từ khoá {{Request::get('search')}} </p>
        @else
        <p class="text-center uppercase text-xl my-4">Tất cả sản phẩm

            @if (Request::get('category'))
                theo danh mục
            @endif
        </p>
        @endif
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
                        {{$product->price}}
                    </div>
                </div>

            </div>
            </a>
            @endforeach


        </div>
    </section>
</div>
</main>
@endsection
@section('js')

@endsection
