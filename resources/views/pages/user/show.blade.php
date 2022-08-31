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
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
    <i class="fas fa-trash">
    </i>
    {{ trans('messages.user.delete') }}
</button>
<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('messages.user.delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete" />
                <div class="modal-body">
                    <div class="form-group">
                        <p>{{ trans('messages.modal.destroy') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.modal.cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('messages.user.delete') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>

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
