@extends('layouts.index', ['user' => 'active'])

@section('title','User')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ trans('messages.home.user')}}</h1>
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
<button type="button" class="btn btn-primary add">
    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.user.add') }} 
</button>
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>{{ trans('messages.register.username') }}</th>
                <th>{{ trans('messages.register.first_name') }}</th>
                <th>{{ trans('messages.register.last_name') }}</th>
                <th>Email</th>
                <th>{{ trans('messages.user.create_at') }}</th>
                <th>{{ trans('messages.home.admin') }}</th>
                <th>{{ trans('messages.user.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at}}</td>
                    <td>{{ $user->isAdmin ? 'admin' : 'user' }}</td>
                    <td>
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> {{ trans('messages.user.view') }}
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            {{ trans('messages.user.edit') }}
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            {{ trans('messages.user.delete') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
