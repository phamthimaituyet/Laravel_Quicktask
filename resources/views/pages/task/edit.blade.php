@extends('layouts.index', ['task' => 'active'])

@section('title','Task')

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
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $task->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('messages.user.edit') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="editTitle">{{ trans('messages.tasks.title') }}</label>
                            <input type="text" id="editTitle" class="form-control" name="title" value="{{ $task->title }}" />
                        </div>
                        <div class="form-group">
                            <label for="editContent">{{ trans('messages.tasks.content') }}</label>
                            <textarea id="editContent" name="content" class="form-control" rows="4">{{ $task->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('messages.tasks.status') }}</label>
                            <select class="form-control select2" name="status">
                                <option value="0">{{ trans('messages.modal.unfinished') }}</option>
                                <option value="1">{{ trans('messages.modal.in_progress') }}</option>
                                <option value="2">{{ trans('messages.modal.finished') }}</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>{{ trans('messages.home.user') }}</label>
                            <select class="form-control select2" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select> 
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">{{ trans('messages.modal.cancel') }}</a>
                        <input type="submit" value="{{ trans('messages.user.edit') }}" class="btn btn-success float-right">
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
