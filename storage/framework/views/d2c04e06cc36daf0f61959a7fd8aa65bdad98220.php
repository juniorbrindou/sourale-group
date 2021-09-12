<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="*%">Evenement</th>
                <th width="*%">Client</th>
                <th width="5%">Net a payer</th>
                <th width="5%">caution</th>
                <th width="19%">date début</th>
                <th width="5%">status</th>
                <th width="*%"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($evenement->id); ?></td>
                <td class="text-uppercase"><?php echo e($evenement->libelle); ?></td>
                <td><?php echo e($evenement->client->nom); ?> <?php echo e($evenement->client->prenoms); ?></td>
                <td title="Sans la caution: <?php echo e(format_money($evenement->montant_total - $evenement->caution)); ?> F CFA">
                    <b><?php echo e(format_money($evenement->montant_total)); ?></b> </td>
                <td><b><?php echo e(format_money($evenement->caution)); ?></b> </td>
                <td><?php echo e(long_date($evenement->date_debut_evenement)); ?> </td>

                <td><span class="badge badge-<?php echo e(couleur_status($evenement->status)); ?>"><?php echo e($evenement->status); ?></span> </td>
                
                <td>
                    <a title="Modiffier l'évènement" href="<?php echo e(route('locations.show', $evenement->id)); ?>"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-pen"></i>
                    </a>
                    <?php if($evenement->status !== "CLÔTURÉ"): ?>

                    <button data-toggle="modal" data-target="#modal-statut-<?php echo e($evenement->id); ?>"
                        title="Modiffier le status" class="btn btn-primary btn-md">
                        <i class="fa fa-cog"></i>
                    </button>
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

                        <form method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" wire:model.defer="statut_evenement"
                                                name="statut_evenement">
                                                <option value="ENREGISTRER">ENREGISTRER</option>
                                                <option value="A VENIR">A VENIR</option>
                                                <option value="EN COURS">EN COURS</option>
                                                <option value="TERMINÉ">TERMINÉ</option>
                                                <option value="CLÔTURÉ">CLÔTURÉ</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-outline-warning btn-block"
                                            data-dismiss="modal">Annuler</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button wire:click="update_statut(<?php echo e($evenement->id); ?>)"
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<?php /**PATH C:\xampp\htdocs\Sourale-group\resources\views/livewire/location/index.blade.php ENDPATH**/ ?>