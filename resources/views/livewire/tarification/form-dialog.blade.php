<div class=" modal-dialog">
    		<div class="modal-content bg-default">
    			<div class="modal-header">
    				<h4 class="modal-title">Attention ! Action Irréversible !</h4>
    				<button type="button" class="close" data-dismiss="modal"
    					aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<p class="text-danger">Voulez vous vraiment rétirer le prix
    					<b>{{ $tarif->prix }} F </b> de la liste des prix</p>
    			</div>
    			<div class="modal-footer justify-content-between">
    				<button type="button" class="btn btn-primary"
    					data-dismiss="modal">Annuler</button>
    				<form method="POST" style="display: inline"
    					action="{{ route('tarifications.destroy', $tarif->id ) }}">
    					@csrf
    					@method('DELETE')
    					<button type="submit" class="btn btn-outline-danger">Je
    						Confirme</button>
    				</form>
    			</div>
    		</div>
    		<!-- /.modal-content -->
    	</div>
