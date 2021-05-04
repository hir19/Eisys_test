<div class="modal fade" id="deleteModal{{$delete_id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fas fa-exclamation-triangle"></i>&ensp;削除確認
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="form-group">本当にこの商品を削除しますか？
                </h5>
            </div>
            <div class="modal-footer">
                {{ Form::button('<i class="fas fa-trash"></i>&ensp;削除する', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                        class="fas fa-times"></i>&ensp;閉じる</button>
            </div>
        </div>
    </div>
</div>