<div class="card-body">
    <table id="example1" class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="*%">Evenement</th>
                <th width="*%">Client</th>
                <th width="5%">Net a payer</th>
                <th width="5%">caution</th>
                <th width="10%">date début</th>
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
                <td><?php echo e($evenement->date_debut_evenement); ?> </td>

                <td><span class="badge badge-<?php echo e(couleur_status($evenement->status)); ?>"><?php echo e($evenement->status); ?></span> </td>
                
                <td>
                    <a title="Modiffier l'évènement" href="<?php echo e(route('locations.show', $evenement->id)); ?>"
                        class="mr-1 btn btn-warning btn-md">
                        <i class="fa fa-pen"></i>
                    </a>
                    <a title="Visualiser la facture" href="<?php echo e(route('facture.show',$evenement->id)); ?>" target="_blank"
                        style="color:yellow" class="btn btn-dark btn-md">
                        <i class="fa fa-file-pdf"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<?php /**PATH C:\xampp\htdocs\Sourale-group\resources\views/livewire/location/index.blade.php ENDPATH**/ ?>