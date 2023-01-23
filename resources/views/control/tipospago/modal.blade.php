{!! Form::open(['route'=>['control.tipospago.destroy',$mpago->id],'method'=>'delete']) !!}
<div class="modal fade" id="modal-delete-{{ $mpago->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">
                <i class="fas fa-exclamation-triangle"></i>
                Confirmar Accion
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Esta seguro de que desea eliminar el tipo de pago?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="far fa-times-circle"></i> No
        </button>
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> Si
        </button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}