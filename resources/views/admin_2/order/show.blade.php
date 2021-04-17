@extends('adminlte::page')
@push('css')
    <!-- DataTables -->

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Đặt hàng #{{$order->id}}</h3>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-info float-right"
                type="button">
                Back list
            </a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->name}} </td>
                    <td>{{$order->mail}} </td>
                    <td>{{$order->phone}} </td>
                    <td>
                        @if($order->status->slug === 'chua-xu-ly')
                            <span class="badge bg-danger">{{$order->status->name}}</span>
                        @elseif($order->status->slug === 'dang-giao-hang')
                            <span class="badge bg-primary">{{$order->status->name}}</span>
                        @else
                            <span class="badge bg-success">{{$order->status->name}}</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td  class="table-info " ><b>Địa chỉ</b></td>
                    <td class="table-info" colspan="2"> {{$order->address}}, {{$order->city}}</td>
                    <td class="table-success" colspan="2"><b>Total</b></td>
                    <td class="table-success">{{$order->price}}<small> vnđ </small></td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- /.card-header -->

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Các sản phẩm</h3>
        </div>
        <div class="card-body table-responsive p-0">

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>số tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{asset($product->thumbnail)}}" ></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td><b>Total</b></td>
                    <td>{{$order->products->sum('pivot.quantity')}}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- /.card-header -->

    </div>
    <div class="card col-lg-4">
        <div class="card-header">
            <h3 class="card-title">Thay đổi chi tiết đơn hàng
            </h3>
        </div>
        <div class="card-body table-responsive">
            <div class="btn-group btn-group-toggle" >
                @foreach($statuses as $status)
                    <form action="{{route('admin.orders.update.status', $order->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{$status->id}}">
                        <button type="submit" class="btn btn-flat bg-olive mr-2"
                            @if($order->status->slug == $status->slug)
                                disabled
                            @endif
                        > {{$status->name}} </button>
                    </form>
                @endforeach
            </div>

        </div>
        <!-- /.card-body -->
    </div>

@endsection
@push('js')
    <!-- DataTables -->

    <script src="{{asset('js/admin/custom.js') }}"></script>

@endpush
