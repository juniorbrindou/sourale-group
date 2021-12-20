@extends('layout.app')

@section('main')

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12 ">
				<!-- general form elements -->
				<div class="card card-primary box-perso">
					<div class="card-header">
						<h3 class="card-title">Nouvel Article</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form method="POST" action="{{ route('articles.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="card-body">

							<div class="row">
								<div class="col-md-9 col-xs-12">

									{{-- libelle --}}
									<div class="form-group">
										<label for="libelle">Nom de l'article</label>
										<input type="text" class="form-control @error('libelle') is-invalid @enderror"
											value="{{ old('libelle') }}" name="libelle" id="libelle"
											placeholder="Entrer le nom de l'article">
									</div>
									@error('libelle')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>


                                <div class="col-md-3 col-xs-6">

									{{-- prix_tarification --}}
									<div class="form-group">
										<label for="prix_tarification">Prix</label>
										<input type="number" class="form-control @error('prix_tarification') is-invalid @enderror"
											value="{{ old('prix_tarification') }}" name="prix_tarification" id="prix_tarification"
											placeholder="Entrer le nom de l'article">
									</div>
									@error('prix_tarification')
									<span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
										role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>



							<div class="row">
								<div class="col-md-3 ">
									<div class="form-group">
										<label>Type d'article</label>
										<select class="form-control select2" name="type_article_id"
											style="width: 100%;">

											@foreach ($type_articles as $type_article)
											<option @if ($loop->first) selected="selected" @endif
												value="{{$type_article->id}}"> {{$type_article->libelle}}
											</option> @endforeach

										</select>
									</div>
									<!-- /.form-group -->
								</div>



								{{-- categorie_article_id --}}
								<div class="col-md-3 ">
									<div class="form-group">
										<label>Catégorie d'article</label>
										<select class="form-control select2" style="width: 100%;"
											name="categorie_id">

											@foreach ($categories as $categorie)
											<option @if ($loop->first) selected="selected" @endif
												value="{{$categorie->id}}"> {{$categorie->libelle}}
											</option>
											@endforeach

										</select>
									</div>
								</div>



								{{-- description --}}
								<div class="col-md-6 ">
									<div class="form-group">
										<label>Ajouter une description à l'article</label>
										<textarea class="form-control @error('description') is-invalid @enderror"
											name="description" rows="3" placeholder="Ecrivez ici..."></textarea>
									</div>
								</div>


								{{-- article_photo --}}
								<div class="col-md-3 ">
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
								<div class="col-md-3 offset-md-3">
									{{-- libelle --}}
									<div class="mt-3 form-group">
										<label for="switch">Enregistrer Encore</label>
										<input type="checkbox" name="encore" checked data-bootstrap-switch
											data-off-color="danger" data-on-color="success">
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
			<!-- /.col -->


		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>

@endsection

@push('styles')
<!-- important -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
@endpush


@push('scripts')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
	$(function () {
	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
	  theme: 'bootstrap4'
	})

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
	//Money Euro
	$('[data-mask]').inputmask()

	//Date picker
	$('#reservationdate').datetimepicker({
		format: 'L'
	});

	//Date and time picker
	$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

	//Date range picker
	$('#reservation').daterangepicker()
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({
	  timePicker: true,
	  timePickerIncrement: 30,
	  locale: {
		format: 'MM/DD/YYYY hh:mm A'
	  }
	})
	//Date range as a button
	$('#daterange-btn').daterangepicker(
	  {
		ranges   : {
		  'Today'       : [moment(), moment()],
		  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
		  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
		  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		startDate: moment().subtract(29, 'days'),
		endDate  : moment()
	  },
	  function (start, end) {
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	  }
	)

	//Timepicker
	$('#timepicker').datetimepicker({
	  format: 'LT'
	})

	//Bootstrap Duallistbox
	$('.duallistbox').bootstrapDualListbox()

	$("input[data-bootstrap-switch]").each(function(){
	  $(this).bootstrapSwitch('state', $(this).prop('checked'));
	})

  })
</script>
@endpush
