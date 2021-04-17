@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Quản lý file</h1>
@stop

@section('content')
    <iframe src="/admin/laravel-file-manager?type=Images" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>

@stop
