<?php $__env->startSection('main'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste des articles </h3>

                        <a href="<?php echo e(route('articles.create')); ?>" class="float-right btn btn-md bg-dark">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter
                        </a>
                    </div>




                    
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4>Nouveau</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="<?php echo e(route('articles.store')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body">

                                        <div class="col-md-12">

                                            
                                            <div class="form-group">
                                                <label for="libelle">Nom de l'article *</label>
                                                <input type="text" required
                                                    class="form-control <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e(old('libelle')); ?>" name="libelle" id="libelle"
                                                    placeholder="Entrer le nom de l'article">
                                            </div>
                                            <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"
                                                style="margin-top: -1.25rem;display: block; font-size:80%" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Type d'article *</label>
                                                <select required class="form-control select2" name="type_article_id"
                                                    style="width: 100%;">

                                                    <?php $__currentLoopData = $type_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($loop->first): ?> selected="selected" <?php endif; ?>
                                                        value="<?php echo e($type_article->id); ?>"> <?php echo e($type_article->libelle); ?>

                                                    </option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Catégorie d'article *</label>
                                                <select required class="form-control select2" style="width: 100%;"
                                                    name="categorie_id">

                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($loop->first): ?> selected="selected" <?php endif; ?>
                                                        value="<?php echo e($categorie->id); ?>"> <?php echo e($categorie->libelle); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ajouter une description à l'article</label>
                                                <textarea
                                                    class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="description" rows="3" placeholder="Ecrivez ici..."></textarea>
                                            </div>
                                        </div>


                                        
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

                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($article->id); ?></td>
                                    <td><?php echo e($article->code); ?></td>

                                    <td>
                                        <?php if($article->article_photo): ?>
                                        <img alt="Avatar" class="img-perso"
                                            src="<?php echo e(asset('storage/'.$article->article_photo)); ?>">
                                        <?php else: ?>
                                        <img alt="Avatar" class="img-perso"
                                            src="<?php echo e(asset('img/default_article100x100.png')); ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(ucwords($article->libelle)); ?></td>
                                    <td><?php echo e(format_money($article->prix_tarification)); ?></td>
                                    <td><?php echo e($article->type_article->libelle); ?></td>
                                    <td><?php echo e($article->categorie->libelle); ?></td>
                                    <td>
                                        
                                        
                                        <button data-toggle="modal" data-target="#modal-update-<?php echo e($article->id); ?>"
                                            title="Modiffier" class="btn btn-primary btn-md">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                        
                                        
                                    </td>
                                </tr>





                                
                                <div class="modal fade" id="modal-update-<?php echo e($article->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-default">
                                            <div class="modal-header">
                                                <h4>Modification</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="POST" action="<?php echo e(route('articles.update', $article->id)); ?>"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <div class="card-body">

                                                    <div class="col-md-12">

                                                        
                                                        <div class="form-group">
                                                            <label for="libelle">Nom de l'article</label>
                                                            <input type="text"
                                                                class="form-control <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                value="<?php echo e($article->libelle); ?>" name="libelle"
                                                                id="libelle">
                                                        </div>
                                                        <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"
                                                            style="margin-top: -1.25rem;display: block; font-size:80%"
                                                            role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>


                                                    <div class="col-md-12 col-xs-12">

                                                        
                                                        <div class="form-group">
                                                            <label for="prix_tarification">Prix</label>
                                                            <input type="text" class="form-control <?php $__errorArgs = ['prix_tarification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                value="<?php echo e($article->prix_tarification); ?>" name="prix_tarification" id="prix_tarification">
                                                        </div>
                                                        <?php $__errorArgs = ['prix_tarification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger" style="margin-top: -1.25rem;display: block; font-size:80%"
                                                            role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    
                                                    

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Type d'article</label>
                                                            <select class="form-control select2" name="type_article_id">

                                                                <option value="<?php echo e($article->type_article_id); ?>">
                                                                    <?php echo e($article->type_article->libelle); ?>

                                                                </option>

                                                                <?php $__currentLoopData = $type_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($type_article->id); ?>">
                                                                    <?php echo e($type_article->libelle); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>

                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Catégorie d'article</label>
                                                            <select class="form-control select2" style="width: 100%;"
                                                                name="categorie_id">

                                                                <option value="<?php echo e($article->categorie_id); ?>">
                                                                    <?php echo e($article->categorie->libelle); ?>

                                                                </option>

                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($categorie->id); ?>">
                                                                    <?php echo e($categorie->libelle); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ajouter une description à l'article</label>
                                                            <textarea
                                                                class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="description" rows="3"
                                                                placeholder="Ecrivez ici..."><?php echo e($article->description); ?></textarea>
                                                        </div>
                                                    </div>


                                                    
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
                                




                                
                                <div class="modal fade" id="modal-danger-<?php echo e($article->id); ?>">
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
                                                    <b><?php echo e(ucwords($article->libelle)); ?></b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Annuler</button>

                                                
                                                
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- /.modal-dialog -->
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">



<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>">

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">


<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">

<?php $__env->stopPush(); ?>




<?php $__env->startPush('scripts'); ?>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>



<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/parametrage/articles/index.blade.php ENDPATH**/ ?>