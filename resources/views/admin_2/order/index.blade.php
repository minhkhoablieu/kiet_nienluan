@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh sách đặt hàng</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">các đơn hàng chưa xử lý</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.order._table')
    </div>
</div>
<div class="card pt-1">
    <div class="card-header">
        <h3 class="card-title">các đơn hàng đã xử lý
        </h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        @include('admin.order._processed_table')
    </div>
</div>
@endsection
