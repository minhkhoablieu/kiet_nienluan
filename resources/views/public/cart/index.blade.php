@extends('public.layout.app')
@section('css')

@endsection
@section('content')
<!-- Cart -->
@include('public.shared.banner')
<div class="max-w-screen-xl mx-auto mt-5">
    <div class="bg-gray-100 shadow-lg rounded-lg">
        <div class="flex">
             <div class="w-full p-4 px-5 py-5">
                <h1 class="text-xl font-medium ">Giỏ hàng</h1>
                 @foreach($products as $product)
                <div class="flex justify-between items-center mt-6 pt-6">
                    <div class="flex items-center">
                        <img src="{{asset($product->model->thumbnail)}}" width="60" class="rounded-full ">
                        <div class="flex flex-col ml-3"> <span class="text-base	 font-medium">{{$product->name}}</span> <span class="text-xs font-light text-gray-400">#{{$product->id}}</span> </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="pr-8 flex ">
                            <input type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2" value=" {{Cart::get($product->id)->quantity}}">
                        </div>
                        <div class="pr-8 "> <span class="text-xs font-medium">{{Cart::get($product->id)->getPriceSum()}}</span> </div>
                        <div class="delete-confirm" href="{{route('cart.destroy', $product->id)}}" data-id="{{$product->id}}"> <i class="fas fa-times text-xs font-medium"></i> </div>
                    </div>
                </div>
                @endforeach
                 <div class="flex justify-between items-center mt-6 pt-6 border-t">
                        <div class="flex items-center"><a href="/products"> <i class="fa fa-arrow-left text-sm pr-2"></i> <span class="text-md font-medium text-blue-500">Tiếp tục mua sắm</span> </a></div>
                        <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1">Tổng cộng:</span> <span class="text-lg font-bold text-gray-800 "> {{Cart::getSubTotal()}}</span> </div>
                    </div>
             </div>
        </div>
    </div>
    <div class="flex justify-end mt-8">
        <div class="bg-gray-100 shadow-lg rounded-lg">
            <div class="w-full p-4 px-5 py-5">
                <p class="font-bold uppercase">Thông tin khách hàng</p>
                <form action="checkout"  method="POST">
                    @csrf
                    <div class="pt-2">
                        <p>Tên khách hàng</p>
                        <input type="text" required="required" name="name"  class="rounded w-full" />
                    </div>
                    <div class="pt-2">
                        <p>Số điện thoại</p>
                        <input type="text" required="required" name="phone"  class="rounded  w-full" />
                    </div>
                    <div class="pt-2">
                        <p>Email</p>
                        <input type="email" required="required" name="mail"  class="rounded w-full" />
                    </div>
                    <div class="pt-2">
                        <p>Địa nhận hàng</p>
                        <textarea  required="required" name="address"  class="rounded  w-full"></textarea>
                    </div>
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 p-4" id="order">Đặt hàng</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>




    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            const id = $(this).attr("data-id");
            Swal.fire({
                title: 'Bạn có chắc chắn',
                text: "Bạn không thể khôi phục hành động này",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: {'_method':'DELETE'},
                    }).done(function(){
                        Swal.fire(
                            'Xoá!',
                            'Sản phẩm đã xoá ra khỏi giỏ hàng.',
                            'success'
                        )
                        location.reload(true);
                    })

                }
            })
        });
    </script>
@endpush
