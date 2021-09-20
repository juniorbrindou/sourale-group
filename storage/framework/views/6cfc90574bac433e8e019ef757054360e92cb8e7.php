<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,addDeleteLigne,firstStepSubmit, secondStepSubmit, addArticle">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Retour de Location</h3>
        </div>
        <form wire:submit.prevent="submit">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="bs-stepper linear">

                            <!-- Stepper header-->
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step active" data-target="#location-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="location-part"
                                        id="location-part-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Les articles de la location</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Stepper header-->



                            <!-- Evenement -->
                            <div id="information-part" class="content active dstepper-block" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="libelle_event">Nom de l'evenement *</label>
                                            <input type="text" wire:model.defer="libelle_event"
                                                class="form-control <?php $__errorArgs = ['libelle_event'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="libelle_event" id="libelle_event"
                                                placeholder="Entrez le nom de l'évenement">
                                        </div>
                                        <?php $__errorArgs = ['libelle_event'];
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

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="nbr_personne">Invités</label>
                                            <input type="number" min="0" wire:model.defer="nbr_personne"
                                                class="form-control <?php $__errorArgs = ['nbr_personne'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="nbr_personne" id="nbr_personne">
                                        </div>
                                        <?php $__errorArgs = ['nbr_personne'];
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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lieuEvenement">Lieu</label>
                                            <input type="text" wire:model.defer="lieuEvenement"
                                                class="form-control <?php $__errorArgs = ['lieuEvenement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="lieuEvenement">
                                        </div>
                                        <?php $__errorArgs = ['lieuEvenement'];
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

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Type d'evenement</label>
                                            <select class="float-right select2 form-control"
                                                wire:model.defer="type_evenement_id">
                                                <?php $__currentLoopData = $type_evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option selected="selected"><?php echo e($type_evenement->libelle); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['type_evenement_id'];
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

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date début</label>
                                            <input type="datetime-local" required class="form-control"
                                                wire:model.defer="date_debut_evenement">
                                        </div>
                                        <?php $__errorArgs = ['date_debut_evenement'];
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input type="datetime-local" required class="form-control"
                                                wire:model.defer="date_fin_evenement">
                                        </div>
                                        <?php $__errorArgs = ['date_fin_evenement'];
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
                                </div>


                                <a class="btn btn-primary" wire:click="gotToBeforeStepSubmit">Precedant</a>
                                <a class="btn btn-primary" wire:click="secondStepSubmit">Suivant</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            

    </div>












    

    <div class="card bg-light">
        <div class="card-header">
            <h3 class="card-title">Location du <?php echo e(long_date()); ?> par <b>
                    <?php echo e(Auth::user()->nom); ?> </b>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Client
                            </h3>


                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <b><?php echo e($ligne['nom_client'] ?? 'Aucun Nom'); ?></b> <br>
                                    <b><?php echo e($ligne['contact1_client']?? 'Aucun Numéro'); ?></b><br>
                                    <b><?php echo e($ligne['adresse_client'] ?? 'Aucune Adresse'); ?></b>
                                </div>
                                <div class="text-center col-md-4">
                                    Cérémonie :<b>
                                        <?php echo e(($ligne['libelle_event'])??'Aucun Nom d\'évenement'); ?></b>
                                    <br>
                                    Nombre d'Invités : <b><?php echo e(($ligne['nbr_personne']) ?? 'Inconnu'); ?></b><br>
                                    Lieu : <b><?php echo e(($ligne['lieu_event']) ??'Inconnu'); ?> </b><br>
                                    Du : <b><?php echo e(long_date($ligne['date_debut_evenement']) ??''); ?> <br>
                                        au <?php echo e(long_date($ligne['date_fin_evenement']) ??''); ?>

                                    </b><br>
                                    Durée : <b><?php echo e($ligne['duree_evenement'] ?? ''); ?></b>
                                </div>
                                <div class="text-right col-md-4">
                                    Caution(20%) : <b><?php echo e(format_money($ligne['caution'])); ?>F FCA</b><br>
                                    TTC : <b><?php echo e(format_money($ligne['montant_total'])); ?>F FCA</b>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-0 card-body table-responsive" style="height:500px;">
                            <table class="table table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Article</th>
                                        <th>Catégorie</th>
                                        <th>Quantité</th>
                                        <th>Ation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $tabArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($item+1); ?></td>
                                        <td><b> <?php echo e($value['article']); ?> </b></td>
                                        <td><?php echo e($value['categorie']); ?></td>
                                        <td><?php echo e($value['qte_article']); ?>

                                        </td>
                                        <td><?php echo e(format_money($value['prix'])); ?></td>
                                        <td><b> <?php echo e(format_money($value['totalUneLigne'])); ?> </b></td>
                                        <td>
                                            <button wire:click="updateLigne(<?php echo e($item); ?>)" title="Modiffier"
                                                class="btn btn-primary btn-md">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn-md"
                                                wire:click="addDeleteLigne(<?php echo e($item); ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="9" class="text-center" style="background-color: darkgrey">Aucun
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
                <div class="col-md-6 col-sm-12">
                    <a href="<?php echo e(url('locations')); ?>" class="mb-2 btn btn-warning btn-block text-light">Retour
                        à la liste</a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <button type="submit" wire:click="addInBD()" class="btn btn-primary btn-block">Valider</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('livewire:load', function (event) {
    window.livewire.hook('afterDomUpdate', () => {
        $('.select2').select2();
      });
  });
</script>
</div>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/livewire/location/retour.blade.php ENDPATH**/ ?>