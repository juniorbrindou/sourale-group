<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,deleteligne,firstStepSubmit, secondStepSubmit, addArticle">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Enregistrement de location</h3>
        </div>
        <form wire:submit.prevent="addArticle()">
            <?php echo csrf_field(); ?>
            <div class="<?php echo e($currentStep == 3 ? 'd-none' : ''); ?>">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="bs-stepper linear">

                                <!-- Stepper header-->
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- Step client-->

                                    <!-- Step evenement-->
                                    <div class="step <?php echo e($currentStep == 2 ? 'active' : ''); ?>"
                                        data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Informations sur l'évènement</span>
                                        </button>
                                    </div>

                                    <div class="line"></div>
                                    <!-- Step evenement-->
                                    <div class="step <?php echo e($currentStep == 3 ? 'active' : ''); ?>"
                                        data-target="#location-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="location-part" id="location-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Les articles de la location</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- Stepper header-->

                                <!-- Client -->
                                <!-- fin Client -->

                                <!-- Evenement -->
                                <div id="information-part"
                                    class="content <?php echo e($currentStep == 2 ? 'active dstepper-block' : ''); ?>"
                                    role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="evenement_libelle">Nom de l'evenement *</label>
                                                <input type="text" wire:model.defer="evenement_libelle"
                                                    class="form-control <?php $__errorArgs = ['evenement_libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="evenement_libelle" id="evenement_libelle"
                                                    placeholder="Entrez le nom de l'évenement">
                                            </div>
                                            <?php $__errorArgs = ['evenement_libelle'];
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
                                                <label for="evenement_nbr_personne">Invités</label>
                                                <input type="number" min="0" wire:model.defer="evenement_nbr_personne"
                                                    class="form-control <?php $__errorArgs = ['evenement_nbr_personne'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="evenement_nbr_personne" id="evenement_nbr_personne">
                                            </div>
                                            <?php $__errorArgs = ['evenement_nbr_personne'];
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
                                                <label for="evenement_lieu">Lieu</label>
                                                <input type="text" wire:model.defer="evenement_lieu"
                                                    class="form-control <?php $__errorArgs = ['evenement_lieu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="evenement_lieu">
                                            </div>
                                            <?php $__errorArgs = ['evenement_lieu'];
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
                                                <label for="type_evenement_libelle">Type d'evenement</label>
                                                <select class="float-right form-control"
                                                    wire:model.defer="type_evenement_id">

                                                    <option selected="selected"><?php echo e($type_evenement_libelle); ?></option>
                                                    <?php $__currentLoopData = $type_evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option><?php echo e($type_evenement->libelle); ?></option>
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
                                                <label for="evenement_date_debut_evenement">Date début</label>
                                                <input type="datetime-local" required class="form-control"
                                                    wire:model.defer="evenement_date_debut_evenement"
                                                    name="evenement_date_debut_evenement">
                                            </div>
                                            <?php $__errorArgs = ['evenement_date_debut_evenement'];
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
                                                <label for="evenement_date_fin_evenement">Date fin</label>
                                                <input type="datetime-local" required class="form-control"
                                                    wire:model.defer="evenement_date_fin_evenement"
                                                    name="evenement_date_fin_evenement" value="">
                                            </div>
                                            <?php $__errorArgs = ['evenement_date_fin_evenement'];
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


                                    <a class="btn btn-primary" wire:click="secondStepSubmit">Suivant</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                

            </div>







            <div class="<?php echo e($currentStep == 3 ? '' : 'd-none'); ?>">
                <div class="card-body">

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="article_libelle">Article Concerné *</label>
                                <select class="form-control  <?php $__errorArgs = ['article_libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    wire:model.defer="article_libelle" style="width: 100%;" id="article_libelle">
                                    <option selected value="">Selectionner un article</option>

                                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($article->libelle); ?>"> <?php echo e($article->libelle); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['article_libelle'];
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
                                <label for="article_qte">Quantité *</label>
                                <input type="number" min="1" wire:model.defer="article_qte"
                                    class="form-control <?php $__errorArgs = ['article_qte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="article_qte"
                                    placeholder="Entrez la quantité d'article">
                            </div>
                            <?php $__errorArgs = ['article_qte'];
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
                                <label for="nbr_jours">Jours</label>
                                <input type="number" min="1" wire:model.defer="nbr_jours"
                                    class="form-control <?php $__errorArgs = ['nbr_jours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nbr_jours"
                                    placeholder="Entrez le nombre de jours">
                            </div>
                            <?php $__errorArgs = ['nbr_jours'];
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
                                <button type="submit" wire:click="addArticle()"
                                    class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>













                

                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Location du <?php echo e(long_date($evenement->created_at)); ?> par <b>
                                <?php echo e($user->nom); ?>

                                <?php echo e($user->prenoms); ?></b>
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
                                                <b><?php echo e($client->nom ?? 'Aucun Nom'); ?></b> <br>
                                                <b><?php echo e($client->contact1?? 'Aucun Numéro'); ?></b><br>
                                                <b><?php echo e($client->adresse ?? 'Aucune Adresse'); ?></b>
                                            </div>
                                            <div class="text-center col-md-4">
                                                Cérémonie :<b>
                                                    <?php echo e($tab_evenement['libelle'] ??'Aucun Nom d\'évenement'); ?></b>
                                                <br>
                                                Nombre d'Invités :
                                                <b><?php echo e($tab_evenement['nbr_personne'] ?? 'Inconnu'); ?></b><br>
                                                Lieu : <b><?php echo e($tab_evenement['lieu'] ??'Inconnu'); ?> </b><br>
                                                Du : <b><?php echo e($tab_evenement['date_debut']??''); ?> <br>
                                                    au <?php echo e($tab_evenement['date_fin'] ??''); ?>

                                                </b><br>
                                                Durée : <b><?php echo e($tab_evenement['duree_evenement'] ?? ''); ?> jour(s)</b>
                                            </div>
                                            <div class="text-right col-md-4">
                                                Caution(20%) : <b> <?php echo e($tab_evenement['caution'] ?? ''); ?> F FCA</b><br>
                                                TTC : <b><?php echo e($tab_evenement['montant_total'] ?? ''); ?> F FCA</b>
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
                                                    <th>jours</th>
                                                    <th>Prix U</th>
                                                    <th>Total</th>
                                                    <th>Ation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $ligne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($item+1); ?></td>
                                                    <td><?php echo e($location['article']['libelle']); ?></td>
                                                    <td><?php echo e($location['article_categorie']['libelle']); ?></td>
                                                    <td><?php echo e($location['qte_loue']); ?></td>
                                                    <td><?php echo e($location['nbr_jour']); ?></td>
                                                    <td><?php echo e($location['article']['prix_tarification']); ?>

                                                    </td>
                                                    <td><?php echo e($location['total_une_ligne']); ?></td>
                                                    <td>
                                                        <button wire:click="updateLigne(<?php echo e($item); ?>)" title="Modiffier"
                                                            class="btn btn-primary btn-md">
                                                            <i class="fa fa-pen"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-md"
                                                            wire:click="deleteLigne(<?php echo e($item); ?>)" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="9" class="text-center"
                                                        style="background-color: darkgrey">Aucun
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

                            <div class="col-md-6 col-sm-12">
                                <button type="submit" wire:click="addInBD()"
                                    class="btn btn-primary btn-block">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
    </div>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\Sourale-group\resources\views/livewire/location/show.blade.php ENDPATH**/ ?>