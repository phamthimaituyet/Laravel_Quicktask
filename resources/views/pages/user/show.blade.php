@extends('layouts.index', ['user' => 'active'])

@section('title','User')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $user->username }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('messages.home.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('messages.home.user') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>{{ trans('messages.tasks.title')}}</th>
                <th>{{ trans('messages.tasks.content') }}</th>
                <th>{{ trans('messages.tasks.status') }}</th>
                <th>{{ trans('messages.user.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->tasks as $task)
                <tr>
                    <td>{{ $task->title}}</td>
                    <td>{{ $task->content}}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> {{ trans('messages.user.view') }}
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            {{ trans('messages.user.edit')}}
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            {{ trans('messages.user.delete')}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
