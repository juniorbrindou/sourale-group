@foreach ($tarifs as $tarif)
<tr>
	<td>{{ $tarif->id}}</td>
	<td>{{ $tarif->prix}}</td>
	<td>{{$tarif->type_article->libelle}}</td>
	<td>{{$tarif->categorie_article->libelle}}</td>
	<td>
		{{--<a href="{{ route('tarifications.edit', $tarif->id) }}" title="Modiffier"
		class="btn btn-primary btn-md">
		<i class="fa fa-pen"></i>
		</a>--}}
		<button type="submit" class="btn btn-success btn-md" title="Modiffier" data-toggle="modal"
			data-target="#modal-update-{{$tarif->id}}">
			<i class="fa fa-pen"></i>
		</button>

	</td>
</tr>

<div class="modal fade" id="modal-update-{{$tarif->id}}">
	<div class="modal-dialog">
		<div class="modal-content bg-default">
			<div class="modal-header">
				Modifer le prix
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form wire:submit.prevent="update">
				<div class="modal-body">
					<div class="form-group">
						<input type="number" wire:model="prix" class="form-control @error('prix') is-invalid @enderror"
							placeholder="Modifier le prix">
					</div>
					@error('prix')
					<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror



				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>

					<button type="submit" class="btn btn-success">Je Confirme</button>
				</div>

			</form>

		</div>
		<!-- /.modal-content -->
	</div>
</div>

@endforeach