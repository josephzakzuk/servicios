<!-- Modal -->
<div class="modal_replace modal fade" id="{{$id_modal}}" style="z-index:9999" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog {{empty($modal_size)?'':'modal-'.$modal_size}}" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$titulo_modal}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
			@yield('contenido_modal')
	   
      </div>
      <div class="modal-footer">
	    @if(empty($no_accept_button))
		<button type="button" id="modal_boton_aceptar" class="modal_boton_aceptar btn btn-primary">{{empty($text_aceptar)?'Aceptar':$text_aceptar}}</button>
        @endif
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>