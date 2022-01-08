@extends('layout.app')

@section('main')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste des Types d'articles</h3>

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

                                <form method="POST" action="{{ route('typeArticles.store')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- libelle --}}
                                                <div class="form-group">
                                                    <label for="libelle">Type d'article<span class="text-danger">*</span></label>
                                                    <input type="text" required
                                                        class="form-control @error('libelle') is-invalid @enderror"
                                                        value="{{ old('libelle') }}" name="libelle" id="libelle"
                                                        placeholder="ex:couvert,verre">
                                                </div>
                                                @error('libelle')
                                                <span class="text-danger"
                                                    style="margin-top: -1.25rem;display: block; font-size:80%"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- description --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ajouter une description</label>
                                                    <textarea
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        name="description" rows="3"
                                                        placeholder="Ecrivez ici..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="mb-2 col-md-6 col-sm-6">
                                                <button type="button" class="btn btn-outline-warning btn-block"
                                                    data-dismiss="modal">Retour
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">Enregistrer</button>
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
                    {{-- fin create type article --}}




                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom du Type</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeArticles as $typeArticle)

                                <tr>
                                    <td>{{ $typeArticle->code }}</td>
                                    <td class="text-uppercase">{{ substr($typeArticle->libelle,0,35) }}</td>
                                    <td>{{ substr($typeArticle->description,0,70) }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modal-update-{{$typeArticle->id}}"
                                            title="Modiffier" class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        {{-- boutton de suppresion --}}
                                        {{-- <button type="submit" class="btn btn-danger btn-md" data-toggle="modal"
                                            data-target="#modal-danger-{{$typeArticle->id}}">
                                        <i class="fa fa-trash"></i>
                                        </button> --}}
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-danger-{{$typeArticle->id}}"">
									<div class=" modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Attention ! Action Irréversible !</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger">Voulez vous vraiment supprimer le Type
                                                <b>{{ $typeArticle->libelle }}</b></p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Annuler</button>
                                            {{-- suppresion --}}
                                            {{-- <form method="POST" style="display: inline"
                                                action="{{ route('typeArticles.destroy', $typeArticle->id ) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Je
                                                Confirme</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                    {{-- update type article --}}
                    <div class="modal fade" id="modal-update-{{$typeArticle->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4>Modification</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('typeArticles.update', $typeArticle->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- libelle --}}
                                                <div class="form-group">
                                                    <label for="libelle">Type d'article<span class="text-danger">*</span></label>
                                                    <input type="text" required
                                                        class="form-control @error('libelle') is-invalid @enderror"
                                                        value="{{ $typeArticle->libelle }}" name="libelle" id="libelle">
                                                </div>
                                                @error('libelle')
                                                <span class="text-danger"
                                                    style="margin-top: -1.25rem;display: block; font-size:80%"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row">
                                            {{-- description --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ajouter une description à l'article</label>
                                                    <textarea
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        name="description" rows="3"
                                                        placeholder="Ecrivez ici...">{{ $typeArticle->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="mb-2 col-md-6 col-sm-6">
                                                <button type="button" class="btn btn-outline-warning btn-block"
                                                    data-dismiss="modal">Retour
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">Enregistrer</button>
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
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('styles')
{{-- important --}}
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


<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@endpush




@push('scripts')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
		$("#example1").DataTable({
		"responsive": true, "lengthChange": true, "autoWidth": false,
		"buttons": ["pdf", "print"],
        "pageLength": 15,
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "language":
        {
            "decimal":        ".",
            "emptyTable":     "Aucune donnée disponible",
            "info":           "Afficher  _START_ à _END_ sur _TOTAL_ lignes",
            "infoEmpty":      "Aucune information à afficher",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "thousands":      ".",
            "loadingRecords": "chargement...",
            "processing":     "Enregistrement...",
            "search":         "Recherche:",
            "zeroRecords":    "Aucun résultat trouvé",
            "paginate": {
                "first":      "Premier",
                "last":       "Dernier",
                "next":       "Suivant",
                "previous":   "Précedent"
            },
        },
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
@if (session('success'))
<script>
    $(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			'timerProgressBar':true,
			timer: 4000
		});

		$(function() {
			Toast.fire({
				icon: 'success',
				title: 'Action Effectuée!'
			})
		});
	});
</script>
@endif
@endpush
