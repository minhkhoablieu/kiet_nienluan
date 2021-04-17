@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sponsor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.sponsors.create')}}" class="btn btn-info float-right"
                    type="button">
                Add
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Sponsor name</th>
                    <th>Image</th>
                    <th>Website</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sponsors as $sponsor)
                    <tr>
                        <td>{{$sponsor->name}}</td>
                        <td><img src="{{asset($sponsor->image)}}" alt="{{$sponsor->name}}" width="20%"></td>
                        <td>{{$sponsor->website}}</td>
                        <td>{{($sponsor->order)}}</td>
                        <td>{!! $sponsor->status !!}</td>
                        <td class="py-0 align-middle">
                            <a class="btn btn-info btn-sm" href="{{route('admin.sponsors.edit', $sponsor->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm delete-confirm"  href="{{route('admin.sponsors.destroy', $sponsor->id)}}" data-id="{{$sponsor->id}}">
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

