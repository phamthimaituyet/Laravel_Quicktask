<!-- Modal content-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('messages.user.add') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputTitle">{{ trans('messages.tasks.title') }}</label>
                        <input type="text" id="inputTitle" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label for="inputContent">{{ trans('messages.tasks.content') }}</label>
                        <textarea id="inputContent" name="content" class="form-control" rows="4"></textarea>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.modal.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('messages.user.add') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>
