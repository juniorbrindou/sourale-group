@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste des articles </h3>

                        <button data-toggle="modal" data-target="#modal-create" class="float-right btn btn-md bg-dark">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter
                        </button>
                    </div>




                    {{-- create type article --}}
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4>Nouveau</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('articles.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="col-md-12">

                                            {{-- libelle --}}
                                            <div class="form-group">
                                                <label for="libelle">Nom de l'article *</label>
                                                <input type="text" required
                                                    class="form-control @error('libelle') is-invalid @enderror"
                                                    value="{{ old('libelle') }}" name="libelle" id="libelle"
                                                    placeholder="Entrer le nom de l'article">
                                            </div>
                                            @error('libelle')
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Type d'article *</label>
                                                <select required class="form-control select2" name="type_article_id"
                                                    style="width: 100%;">

                                                    @foreach ($type_articles as $type_article)
                                                    <option @if ($loop->first) selected="selected" @endif
                                                        value="{{$type_article->id}}"> {{$type_article->libelle}}
                                                    </option> @endforeach

                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        {{-- categorie_id --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Catégorie d'article *</label>
                                                <select required class="form-control select2" style="width: 100%;"
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ajouter une description à l'article</label>
                                                <textarea
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    name="description" rows="3" placeholder="Ecrivez ici..."></textarea>
                                            </div>
                                        </div>


                                        {{-- article_photo --}}
                                        <div class="col-md-6 ">
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
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Annuler</button>

                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                    </div>

                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                        <!-- /.modal -->
                        {{-- fin create type article --}}


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Image</th>
                                    <th>Libéllé</th>
                                    <th>Prix</th>
                                    <th>Type</th>
                                    <th>Categorie</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->code}}</td>

                                    <td>
                                        @if($article->article_photo)
                                        <img alt="Avatar" class="img-perso"
                                            src="{{asset('storage/'.$article->article_photo)}}">
                                        @else
                                        <img alt="Avatar" class="img-perso"
                                            src="{{asset('img/default_article100x100.png')}}">
                                        @endif
                                    </td>
                                    <td>{{ ucwords($article->libelle)}}</td>
                                    <td>{{ format_money($article->prix_tarification)}}</td>
                                    <td>{{$article->type_article->libelle}}</td>
                                    <td>{{$article->categorie->libelle}}</td>
                                    <td>
                                        {{-- cacher le bouton pour voir un artcile --}}
                                        {{-- <a href="{{ route('articles.show', $article->id) }}"
                                        class="mr-1 btn btn-warning btn-md">
                                        <i class="fa fa-eye"></i>
                                        </a> --}}
                                        <button data-toggle="modal" data-target="#modal-update-{{$article->id}}"
                                            title="Modiffier" class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                        {{-- suppresion d'article --}}
                                        {{-- <button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
                                            data-target="#modal-danger-{{$article->id}}">
                                        <i class="fa fa-trash"></i>
                                        </button> --}}
                                    </td>
                                </tr>





                                {{-- update type article --}}
                                <div class="modal fade" id="modal-update-{{$article->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-default">
                                            <div class="modal-header">
                                                <h4>Modification</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="POST" action="{{ route('articles.update', $article->id)}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="card-body">

                                                    <div class="col-md-12">

                                                        {{-- libelle --}}
                                                        <div class="form-group">
                                                            <label for="libelle">Nom de l'article</label>
                                                            <input type="text"
                                                                class="form-control @error('libelle') is-invalid @enderror"
                                                                value="{{ $article->libelle }}" name="libelle"
                                                                id="libelle">
                                                        </div>
                                                        @error('libelle')
                                                        <span class="text-danger"
                                                            style="margin-top: -1.25rem;display: block; font-size:80%"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Type d'article</label>
                                                            <select class="form-control select2" name="type_article_id">

                                                                <option value="{{$article->type_article_id}}">
                                                                    {{$article->type_article->libelle}}
                                                                </option>

                                                                @foreach ($type_articles as $type_article)
                                                                <option value="{{$type_article->id}}">
                                                                    {{$type_article->libelle}}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>

                                                    {{-- categorie_id --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Catégorie d'article</label>
                                                            <select class="form-control select2" style="width: 100%;"
                                                                name="categorie_id">

                                                                <option value="{{$article->categorie_id}}">
                                                                    {{$article->categorie->libelle}}
                                                                </option>

                                                                @foreach ($categories as $categorie)
                                                                <option value="{{$categorie->id}}">
                                                                    {{$categorie->libelle}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- description --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ajouter une description à l'article</label>
                                                            <textarea
                                                                class="form-control @error('description') is-invalid @enderror"
                                                                name="description" rows="3"
                                                                placeholder="Ecrivez ici...">{{ $article->description }}</textarea>
                                                        </div>
                                                    </div>


                                                    {{-- article_photo --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">J'ai une photo de
                                                                l'article</label>
                                                            <div class="input-group">
                                                                <div>
                                                                    <input type="file"
                                                                        accept="image/gif, image/jpeg, image/png"
                                                                        name="article_photo" id="article_photo">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <div class="row">
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal">Annuler</button>

                                                                <button type="submit"
                                                                    class="btn btn-success">Enregistrer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                {{-- fin update type article --}}




                                {{-- suppression --}}
                                <div class="modal fade" id="modal-danger-{{$article->id}}">
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
                                                <p class="text-danger">Voulez vous vraiment supprimer l'article
                                                    <b>{{ ucwords($article->libelle) }}</b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Annuler</button>

                                                {{-- suppresion d'article --}}
                                                {{-- <form method="POST" style="display: inline"
                                                    action="{{ route('articles.destroy', $article->id ) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Je
                                                    Confirme</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- /.modal-dialog -->
                                {{-- fin suppression --}}
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection

@push('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">



<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
{{-- modal --}}
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@endpush




@push('scripts')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>



<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {

		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
		theme: 'bootstrap4'
		})


		$("input[data-bootstrap-switch]").each(function(){
	  	$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})
  	})

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
	url: "/target-url", // Set the url
	thumbnailWidth: 80,
	thumbnailHeight: 80,
	parallelUploads: 20,
	previewTemplate: previewTemplate,
	autoQueue: false, // Make sure the files aren't queued until manually added
	previewsContainer: "#previews", // Define the container to display the previews
	clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() {
			 myDropzone.enqueueFile(file)
			}
	})

  myDropzone.on("sending", function(file) {
	// Show the total progress bar when upload starts
	document.querySelector("#total-progress").style.opacity = "1"
	// And disable the start button
	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

</script>

<script>
    $(function () {
			$("#example1").DataTable({
			"responsive": true, "lengthChange": true, "autoWidth": false,
			"buttons": ["pdf", "print"],
            "order": [0,'desc']
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			});
		});
</script>
{{-- message flash enregistrement --}}
@endpush
