<div class="card-body">
    <div wire:loading.delay wire:target="update_statut">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>
    <table id="example1" class="table table-bordered">
        <colgroup>
            <col style="width: 1%" />
            <col style="width: auto" />
            <col style="width: auto" />
            <col style="width: 10%" />
            <col style="width: 5%" />
            <col style="width: 19%" />
            <col style="width: 5%" />
            <col style="width: auto" />
        </colgroup>
        <thead>
            <tr>
                <th>#</th>
                <th>Evenement</th>
                <th>Client</th>
                <th>TTC</th>
                <th>caution</th>
                <th>date début</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($evenement->id); ?></td>
                <td class="text-uppercase"><?php echo e($evenement->libelle); ?></td>
                <td><?php echo e($evenement->client->nom); ?></td>
                <td title="Sans la caution: <?php echo e(format_money($evenement->montant_total - $evenement->caution)); ?> F CFA">
                    <b><?php echo e(format_money($evenement->montant_total)); ?></b></td>
                <td><b><?php echo e(format_money($evenement->caution)); ?></b></td>
                <td><?php echo e(long_date($evenement->date_debut_evenement)); ?> </td>

                <td>
                    <span class="badge badge-<?php echo e(couleur_status($evenement->status)); ?> text-lg"><?php echo e($evenement->status); ?>

                        <?php if($evenement->status === "EN COURS"): ?>
                        <i class="fas fa-2x fa-sync-alt fa-spin" style="font-size: 25px;"></i>
                        <?php endif; ?>
                    </span>
                </td>
                <td>

                    <?php if($evenement->status !== "CLOTURÉ" && $evenement->status !== "TERMINÉ" && $evenement->status !==
                    "ANNULÉ" && $evenement->status !== "EN COURS"): ?>
                    <a title="Modiffier l'évènement" href="<?php echo e(route('locations.show', $evenement->id)); ?>"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-pen"></i>
                    </a>
                    <?php endif; ?>

                    <?php if($evenement->status !== "CLOTURÉ" && $evenement->status !== "TERMINÉ"): ?>
                    <button data-toggle="modal" data-target="#modal-statut-<?php echo e($evenement->id); ?>"
                        title="Modiffier le status" class="btn btn-primary btn-md">
                        <i class="fa fa-cog"></i>
                    </button>
                    <?php endif; ?>

                    <?php if($evenement->status == "CLOTURÉ" || $evenement->status == "EN COURS" || $evenement->status
                    =="TERMINÉ" ): ?>
                    <a title="Voir" href="<?php echo e(route('evennements.show', $evenement->id)); ?>"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-eye"></i>
                    </a>
                    <?php endif; ?>

                    <?php if($evenement->status =="TERMINÉ"): ?>
                    <a title="retour en stock" href="<?php echo e(route('locations.edit', $evenement->id)); ?>"
                        class="mr-1 btn btn-dark btn-md">
                        <i class="fa fa-undo"></i>
                    </a>
                    <?php endif; ?>



                    <a title="Visualiser la facture" href="<?php echo e(route('facture.show',$evenement->id)); ?>" target="_blank"
                        style="color:yellow" class="btn btn-dark btn-md">
                        <i class="fa fa-file-pdf"></i>
                    </a>
                </td>
            </tr>


            
            <div class="modal fade" id="modal-statut-<?php echo e($evenement->id); ?>">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4>Changer le statut de l'évenement</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" action="<?php echo e(route('evennements.update',$evenement->id)); ?>">
                            <?php echo method_field('PATCH'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control <?php $__errorArgs = ['statut_evenement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                wire:model.defer="statut_evenement" name="statut_evenement">
                                                <option value=""></option>
                                                <option value="EN COURS">EN COURS</option>
                                                <option value="TERMINÉ">TERMINER</option>
                                                <option value="ANNULÉ">ANNULÉ</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <?php $__errorArgs = ['statut_evenement'];
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
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-outline-warning btn-block"
                                            data-dismiss="modal">Annuler
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-block">Enregistrer </button>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/livewire/location/index.blade.php ENDPATH**/ ?>