@extends('layout.app')

@section('main')

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12 ">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Nouvel Article</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form method="POST" action="{{ route('articles.store')}}">
						@csrf
						<div class="card-body">

							<div class="row">
								<div class="col-md-8 col-xs-12">

									{{-- name --}}
									<div class="form-group">
										<label for="name">Nom de l'article</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror"
											value="{{ old('name') }}" name="name" id="name"
											placeholder="Entrer le nom de l'article">
									</div>
									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								{{-- qte --}}
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label for="qte">Quantité</label>
										<input type="number" min="0"
											class="form-control @error('qte') is-invalid @enderror" name="qte" id="qte"
											placeholder="la quantité de l'article" value="{{ old('qte')}}">
									</div>
									@error('qte')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>






							<div class="row">

								{{-- caution --}}
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label for="caution">Caution de l'article</label>
										<input type="number" class="form-control @error('caution') is-invalid @enderror"
											name="caution" id="caution" placeholder="Entrer la caution de l'article"
											value="{{ old('caution')}}">
									</div>
									@error('caution')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								{{-- categorie_article_id --}}
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label>Catégorie de l'article</label>
										<select class="form-control" name="categorie_article_id">
											<option value="Luxe">Luxe</option>
											<option value="Gold">Gold</option>
											<option value="Argent">Argent</option>
											<option value="Bois">Bois</option>
											<option value="Plume">Plume</option>
											<option value="Plume">Aucun</option>
										</select>
									</div>
								</div>

								{{-- prix --}}
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label for="prix">Prix</label>
										<input type="number" min="0"
											class="form-control @error('prix') is-invalid @enderror"
											placeholder="le prix de location" value="{{ old('prix')}}" name="prix"
											id="prix">
									</div>
									@error('prix')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							{{-- description --}}
							<div class="form-group">
								<label>Ajouter une description à l'article</label>
								<textarea class="form-control @error('description') is-invalid @enderror"
									name="description" rows="3" placeholder="Ecrivez ici..."></textarea>
							</div>


							{{-- article_photo --}}
							<div class="form-group">
								<label for="exampleInputFile">J'ai une photo de l'article</label>
								<div class="input-group">
									<div>
										<input type="file" accept="image/gif, image/jpeg, image/png"
											name="article_photo" id="article_photo">
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
						</div>
					</form>
				</div>
				<!-- /.card -->

			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>

@endsection