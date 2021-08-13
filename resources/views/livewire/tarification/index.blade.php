@foreach ($tarifs as $tarif)
    <tr>
    	<td>{{ $tarif->id}}</td>
    	<td>{{ $tarif->prix}}</td>
    	<td>{{$tarif->type_article->libelle}}</td>
    	<td>{{$tarif->categorie_article->libelle}}</td>
    	<td>
    		<a href="{{ route('tarifications.edit', $tarif->id) }}" title="Modiffier"
    			class="btn btn-primary btn-md">
    			<i class="fa fa-pen"></i>
    		</a>
    		<button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
    			data-target="#modal-danger-{{$tarif->id}}">
    			<i class="fa fa-trash"></i>
    		</button>
    	</td>
    </tr>
    <div class="modal fade" id="modal-danger-{{$tarif->id}}">
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
    	<!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
