@extends('layouts.index', ['home' => 'active'])

@section('title','home')

@section('content_header')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ trans('messages.home.home') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('messages.home.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('messages.home.home') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
    <p>{{ trans('messages.home.welcome_to_website') }}</p>
@endsection
