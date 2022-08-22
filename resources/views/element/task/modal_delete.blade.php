<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('messages.user.delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('tasks.destroy', ['task' => $task_id]) }}" method="post">
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
