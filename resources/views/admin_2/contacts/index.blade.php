@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Liên hệ</h1>
@stop

@section('content')
    <p>Danh sách phản hồi</p>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Liên hệ</th>
                    <th>Hoạt động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{($contact->email)}}</td>
                        <td>{!! $contact->content !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.contacts.destroy', $contact->id)}}" data-id="{{$contact->id}}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

@stop

