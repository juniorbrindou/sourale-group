<div class="card bg-light card-warning">
    <div class="card-header">


        <h3 class="card-title">Location du
            <b><?php echo e(long_date($evenement->date_debut_evenement)); ?></b> par
            <b><?php echo e($user->nom); ?></b>
        </h3>
        <h3 class="float-right card-title">
            Clôturé le <?php echo e(long_date($tab_locations[0]['date_retour'])); ?>

        </h3>

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

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <b><?php echo e($client->nom ?? 'Aucun Nom'); ?></b> <br>
                                <b><?php echo e($client->contact1?? ''); ?></b><br>
                                <b><?php echo e($client->adresse ?? ''); ?></b>
                            </div>
                            <div class="text-center col-md-4">
                                Cérémonie :<b>
                                    <?php echo e($evenement->libelle ??'Aucun Nom d\'évenement'); ?></b>
                                <br>
                                Nombre d'Invités : <b><?php echo e($evenement->nbr_personne ?? 'Inconnu'); ?></b><br>
                                Lieu : <b><?php echo e($evenement->lieu ??'Inconnu'); ?> </b><br>
                                Du : <b><?php echo e(long_date($evenement->date_debut_evenement) ??''); ?> <br>
                                    au <?php echo e(long_date($evenement->date_fin_evenement) ??''); ?>

                                </b><br>
                                Durée : <b><?php echo e($duree_evenement ?? ''); ?></b>
                            </div>
                            <div class="text-right col-md-4">
                                Total HT(<?php echo e($evenement->percentage_caution); ?>%) : <b><?php echo e(format_money($evenement->caution)); ?>F FCA</b><br>
                                <?php if($evenement->remise > 0): ?>
                                Remise : <b><?php echo e(format_money($evenement->remise)); ?>F FCA</b> <br>
                                <?php endif; ?>
                                Caution(<?php echo e($evenement->percentage_caution); ?>%) : <b><?php echo e(format_money($evenement->caution)); ?>F FCA</b><br>
                                TTC : <b><?php echo e(format_money($ttc)); ?>F FCA</b>
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
                                    <th>Jours</th>
                                    <th>Prix U</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $tab_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$tab_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item+1); ?></td>
                                    <td><?php echo e($tab_location->article->libelle); ?></td>
                                    <td><?php echo e($tab_location->article->categorie->libelle); ?></td>
                                    <td><?php echo e($tab_location->qte_loue); ?></td>
                                    <td><?php echo e($tab_location->nb_jour); ?></td>
                                    <td><?php echo e(format_money($tab_location->article->prix_tarification)); ?></td>
                                    <td><?php echo e(format_money(total_ligne($tab_location->qte_loue,$tab_location->nb_jour,$tab_location->article->prix_tarification))); ?>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                Aucune information...
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
            <div class="col-md-4 offset-4 col-sm-12">
                <a href="<?php echo e(route('locations.index')); ?>" class="mb-2 btn btn-warning btn-block text-light">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/livewire/location/terminee.blade.php ENDPATH**/ ?>