@extends('layouts.index', ['task' => 'active'])

@section('title','List Task')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ trans('messages.tasks.list_task')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('messages.home.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('messages.home.tasks') }}</li>
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
    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.user.add') }}
    </button>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ trans('messages.tasks.title') }}</th>
                    <th class="task-content">{{ trans('messages.tasks.content') }}</th>
                    <th>{{ trans('messages.tasks.status') }}</th>
                    <th>{{ trans('messages.home.user') }}</th>
                    <th>{{ trans('messages.user.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->username }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> {{ trans('messages.user.view') }}
                        </a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                            data-id="{{ $task->id }}">
                            <i class="fas fa-trash">
                            </i>
                            {{ trans('messages.user.delete') }}
                        </button>
                        @include('element.task.modal_delete', ['task_id' => $task->id])
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i> {{ trans('messages.user.edit') }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@include('element.task.modal_add')

@section('script')
    <script src="{{ mix('/js/task.js') }}"></script>
@endsection
