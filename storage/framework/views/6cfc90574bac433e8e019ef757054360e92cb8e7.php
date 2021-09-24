<div>
    <div wire:loading.delay
        wire:target="addInBD,updateLigne, addArticle, save, startEdit,updateLineCloturation, afterLineUpdate,cloturer ">
        <div class="custom-loading-spinner">
            Patientez...
        </div>
    </div>



    

    <div class="card card-warning box-perso">
        <div class="card-header">
            <h3 class="card-title">Rétour de Location du <?php echo e(long_date($ligne['date_debut_evenement'])); ?> par <b>
                    <?php echo e($tab_locations[0]->user->nom); ?> </b>
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
                                    <b><?php echo e($ligne['contact1_client']?? ''); ?></b><br>
                                    <b><?php echo e($ligne['adresse_client'] ?? ''); ?></b>
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
                                        <th>Quantité Louée</th>
                                        <th>Quantité retournée</th>
                                        <th>Etat</th>
                                        <th>Ation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $tab_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($item+1); ?></td>
                                        <td><b> <?php echo e($value['article']->libelle); ?> </b></td>
                                        <td><?php echo e($value['article']->categorie->libelle); ?></td>
                                        <td><?php echo e($value['qte_loue']); ?></td>
                                        <td>

                                            <?php if($edit_id === $item): ?>

                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('location.cloturation', ['value' => $value])->html();
} elseif ($_instance->childHasBeenRendered($item)) {
    $componentId = $_instance->getRenderedChildComponentId($item);
    $componentTag = $_instance->getRenderedChildComponentTagName($item);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($item);
} else {
    $response = \Livewire\Livewire::mount('location.cloturation', ['value' => $value]);
    $html = $response->html();
    $_instance->logRenderedChild($item, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                                            <?php else: ?>
                                            <?php echo e($value['qte_retour']); ?>

                                            <button wire:click="startEdit(<?php echo e($item); ?>)" title="Modiffier"
                                                class="btn btn-dark ">
                                                <i class="fa fa-pen"></i>
                                            </button>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($value['etat_article']); ?></td>
                                        <td>
                                            <button wire:click="updateLigne(<?php echo e($item); ?>)" title="Modiffier"
                                                class="btn btn-primary btn-md">
                                                <i class="fa fa-check-circle"></i>
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
                        à la liste et cloturer plus tard</a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <button type="submit" wire:click="cloturer()" class="btn btn-primary btn-block">cloturer
                        maintenant</button>
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