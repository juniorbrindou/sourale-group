<div>
    <div class="card card-success box-perso">
        <div class="card-header">
            <h3 class="card-title">Entrée de Stock</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->






        <form wire:submit.prevent="submit">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Article Concerné *</label>
                            <select class="form-control <?php $__errorArgs = ['article'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="article_id"
                                wire:model="article" style="width: 100%;">
                                <option selected value="">Selectionner un article</option>

                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($article->id); ?>"> <?php echo e($article->libelle); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__errorArgs = ['article'];
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

                    
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="qte">Quantité *</label>
                            <input type="number" min="0" wire:model="qte"
                                class="form-control <?php $__errorArgs = ['qte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="qte" id="qte"
                                placeholder="Entrer la quantité d'article">
                        </div>
                        <?php $__errorArgs = ['qte'];
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3 offset-md-3 col-sm-6">
                            <button type="reset" class="mb-2 btn btn-warning btn-block text-light">Effacer</button>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <button type="submit" wire:click="addLigne"
                                class="btn btn-primary btn-block">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>













    <div class="card bg-light">
        <div class="card-header">
            <h3 class="card-title">Approvisionnement du <?php echo e(date('Y-m-d H:i')); ?></h3>
        </div>
        <div class="card-body">
            <div wire:loading.delay wire:target="submit, addDeleteLigne, resetLigne, addInBD">
                <div class="custom-loading-spinner">
                    Patientez...
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Auteur : <?php echo e(Auth::user()->nom); ?></h3>

                            <div class="card-tools">
                                <div class="float-right input-group input-group-sm" style="width: 150px;">
                                    <b>Code: <?php echo e($code); ?></b>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-0 card-body table-responsive" style="height:500px;">

                            <table class="table table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Article</th>
                                        <th>Quantité</th>
                                        <th>Catégorie</th>
                                        <th>Prix</th>
                                        <th>Ation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $ligne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($item+1); ?></td>
                                        <td><?php echo e($value['code']); ?></td>
                                        <td><?php echo e($value['article']); ?></td>
                                        <td><?php echo e($value['qte']); ?></td>
                                        <td><?php echo e($value['categorie']); ?></td>
                                        <td><?php echo e(format_money($value['prix'])); ?></td>
                                        <td>
                                            
                                            
                                            
                                            <button class="btn btn-danger btn-md"
                                                wire:click="addDeleteLigne(<?php echo e($item); ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="text-center" style="background-color: darkgrey">Aucun
                                            enregistrement</td>
                                    </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="<?php echo e(route('approvisionnement.index')); ?>"
                        class="mb-2 btn btn-warning btn-block text-light">Retour à la liste</a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button wire:click="resetLigne" class="mb-2 btn btn-dark btn-block text-light">Tout Effacer</button>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" wire:click="addInBD()" class="btn btn-primary btn-block">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/livewire/approvisionnement/create.blade.php ENDPATH**/ ?>