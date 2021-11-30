<div>
    <div wire:loading.delay
        wire:target="gotToBeforeStepSubmit,addInBD,resetLigne,addDeleteLigne,firstStepSubmit, secondStepSubmit, addArticle, activeReductionField">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Création de devis de location</h3>
        </div>
        <form wire:submit.prevent="submit">
            <?php echo csrf_field(); ?>
            <div class="<?php echo e($currentStep == 3 ? 'd-none' : ''); ?>">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="bs-stepper linear">

                                <!-- Stepper header-->
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- Step client-->
                                    <div class="step <?php echo e($currentStep == 1 ? 'active' : ''); ?>"
                                        data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
                                            <span class="bs-stepper-circle"><i class="fa fa-user"></i></span>
                                            <span class="bs-stepper-label">Informations sur le client</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <!-- Step evenement-->
                                    <div class="step <?php echo e($currentStep == 2 ? 'active' : ''); ?>"
                                        data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger"
                                            aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">2</span>
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
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Les articles de la location</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- Stepper header-->

                                <!-- Client -->
                                <div class="bs-stepper-content">
                                    <div id="logins-part"
                                        class="content <?php echo e($currentStep == 1 ? 'active dstepper-block' : ''); ?>"
                                        role="tabpanel" aria-labelledby="logins-part-trigger">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Client Existant:</legend>
                                                    <div class="form-group">
                                                        <label>Selectionnez le client *</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-user" style="color: black"></i>
                                                                </span>
                                                            </div>
                                                            <select name="oldClient" required
                                                                class="float-right form-control"
                                                                wire:model.defer="oldClient">
                                                                <option value="">Coisissez un client existant</option>
                                                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($client->id); ?>">
                                                                    <?php echo e($client->nom); ?>

                                                                </option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php $__errorArgs = ['oldClient'];
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
                                                </fieldset>
                                            </div>




                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Nouveau Client:</legend>

                                                    <div class="form-group">
                                                        <label for="newNom">Nom du nouveau client *</label>
                                                        <input type="text"
                                                            class="form-control <?php $__errorArgs = ['newNom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            wire:model.defer="newNom" id="newNom">
                                                    </div>
                                                    <?php $__errorArgs = ['newNom'];
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

                                                    <div class="form-group">
                                                        <label for="contact1">Téléphone </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="number" min="1" required id="contact1"
                                                                class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                wire:model.defer="newContact1">
                                                        </div>
                                                        <?php $__errorArgs = ['contact1'];
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

                                                    <div class="form-group">
                                                        <label for="newAdresse">Adresse </label>
                                                        <input type="text" id="newAdresse"
                                                            class="form-control <?php $__errorArgs = ['newAdresse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            wire:model.defer="newAdresse">
                                                    </div>
                                                    <?php $__errorArgs = ['newAdresse'];
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

                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="mx-auto col-md-6">
                                            <a class="btn btn-warning btn-block" wire:click="firstStepSubmit">Suivant <i class="fa fa-arrow-alt-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- fin Client -->



                                <!-- Evenement -->
                                <div id="information-part"
                                    class="content <?php echo e($currentStep == 2 ? 'active dstepper-block' : ''); ?>"
                                    role="tabpanel" aria-labelledby="information-part-trigger">
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
                                                    <option selected="selected">Choisir un type</option>
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

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="percentage_caution">Caution</label>
                                                <input type="number" min="0" max="100" wire:model.defer="percentage_caution"
                                                    class="form-control <?php $__errorArgs = ['percentage_caution'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="percentage_caution" id="percentage_caution">
                                            </div>
                                            <?php $__errorArgs = ['percentage_caution'];
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


                                    <a class="btn btn-secondary col-4 offset-1"
                                        wire:click="gotToBeforeStepSubmit">
                                        <i class="fa fa-arrow-alt-circle-left"></i>
                                        Précedent
                                    </a>
                                    <a class="btn btn-warning col-4 offset-2"
                                        wire:click="secondStepSubmit">
                                        Suivant
                                        <i class="fa fa-arrow-alt-circle-right"></i>
                                    </a>
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
                                <label for="article">Article Concerné *</label>
                                <select class="form-control  <?php $__errorArgs = ['article'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    wire:model.defer="article" style="width: 100%;" id="article">
                                    <option selected value="">Selectionner un article</option>

                                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($article); ?>"> <?php echo e($article); ?> </option>
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
                                <label for="qte_article">Quantité *</label>
                                <input type="number" min="1" wire:model.defer="qte_article"
                                    class="form-control <?php $__errorArgs = ['qte_article'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="qte_article"
                                    placeholder="Entrez la quantité d'article">
                            </div>
                            <?php $__errorArgs = ['qte_article'];
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
                                <label for="nb_jour">Jours</label>
                                <input type="number" min="1" wire:model.defer="nb_jour"
                                    class="form-control <?php $__errorArgs = ['nb_jour'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nb_jour"
                                    placeholder="Entrez le nombre de jours">
                            </div>
                            <?php $__errorArgs = ['nb_jour'];
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
                                <button type="submit" wire:click="addArticle"
                                    class="btn btn-primary btn-block">
                                    <b>Ajouter <i class="fa fa-plus"></i></b>
                                </button>
                            </div>
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
                                                <b><?php echo e($ligne['nom'] ?? 'Aucun Nom'); ?></b> <br>
                                                <b><?php echo e($ligne['contact1']?? ''); ?></b><br>
                                                <b><?php echo e($ligne['adresse'] ?? ''); ?></b>
                                            </div>
                                            <div class="text-center col-md-4">
                                                Cérémonie :<b>
                                                    <?php echo e(($libelle_event)??'Aucun Nom d\'évenement'); ?></b>
                                                <br>
                                                Nombre d'Invités : <b><?php echo e(($nbr_personne) ?? 'Inconnu'); ?></b><br>
                                                Lieu : <b><?php echo e(($lieuEvenement) ??'Inconnu'); ?> </b><br>
                                                Du : <b><?php echo e(long_date($date_debut_evenement) ??''); ?> <br>
                                                    au <?php echo e(long_date($date_fin_evenement) ??''); ?>

                                                </b><br>
                                                Durée : <b><?php echo e($ligne['duree_evenement'] ?? ''); ?></b>
                                            </div>

                                            
                                            <div class="text-right col-md-4">
                                                
                                                Total HT : <b><?php echo e(format_money($totalBrute)); ?> F FCA</b>
                                                <br>
                                                <?php if($reductible): ?>
                                                    Remise <input type="number" min="0" wire:model.defer="remise" style="width: 25%"/>
                                                    <button title="Modiffier" wire:click="activeReductionField"
                                                        class="btn btn-success btn-xs">
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                <?php else: ?>
                                                    Remise <input type="number" disabled wire:model.defer="remise" style="width: 25%"/>
                                                    <button title="Enregistrer" wire:click="activeReductionField"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <br>
                                                Caution(<?php echo e($ligne['percentage_caution']?? ''); ?>%) : <b><?php echo e(format_money($caution)); ?> F FCA</b><br>
                                                TTC : <b><?php echo e($ligne['ttc']?? ''); ?> F FCA</b><br>
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
                                                    <th>Action</th>
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
                                                    <td><?php echo e($value['nb_jour']); ?></td>
                                                    <td><?php echo e(format_money($value['prix'])); ?></td>
                                                    <td><b> <?php echo e(format_money($value['totalUneLigne'])); ?> </b></td>
                                                    <td>
                                                        
                                                        <button class="btn btn-danger btn-md"
                                                            wire:click="addDeleteLigne(<?php echo e($item); ?>)">
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
                            <div class="col-md-4 col-sm-12">
                                <a href="<?php echo e(url('locations')); ?>" class="mb-2 btn btn-warning btn-block text-light">Retour
                                    à la liste</a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <button wire:click="resetLigne" class="mb-2 btn btn-dark btn-block text-light">Tout
                                    Effacer</button>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <button type="submit" wire:click="addInBD()"
                                    class="btn btn-primary btn-block">Valider</button>
                            </div>
                        </div>
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
<?php /**PATH C:\SouraleApp\last-project\resources\views/livewire/location/create.blade.php ENDPATH**/ ?>