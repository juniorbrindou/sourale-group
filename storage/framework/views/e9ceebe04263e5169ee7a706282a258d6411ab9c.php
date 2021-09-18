<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('dist/img/logo.png')); ?>" alt="Logo de souralè" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo e(config("app.name")); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="<?php echo e(userAvatar(Auth::user()->genre)); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo e(route('utilisateurs.show', Auth::user()->id)); ?>"
                    class="d-block"><?php echo e((Auth::user()->login)); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <?php if(auth()->check() && auth()->user()->hasRole('manager|secretaire|admin')): ?>

                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard')); ?>" class="nav-link <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('locations.index')); ?>"
                        class="nav-link <?php echo e(request()->is('location*') ? 'bg-warning active' : ''); ?>">
                        <i class="fas fa-shipping-fast nav-icon"></i>
                        <p>Locations</p>
                    </a>
                </li>

                <li class="nav-header">FLUX DE STOCK</li>

                <li class="nav-item">
                    <a href="<?php echo e(url('stock')); ?>" class="nav-link <?php echo e(request()->is('stock*') ? 'bg-info active' : ''); ?>">
                        <i class="fas fa-box-open nav-icon"></i>

                        <p>Stock</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('approvisionnement.index')); ?>"
                        class="nav-link <?php echo e(request()->is('approvisionnement*') ? 'bg-success active' : ''); ?>">
                        <i class="fas fa-door-open nav-icon"></i>
                        <p>Entrée de Stock</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('destockages.index')); ?>"
                        class="nav-link <?php echo e(request()->is('destockages*') ? 'bg-danger  active' : ''); ?>">
                        <i class="fa fa-trash-restore-alt nav-icon"></i>
                        <p>Sortie de stock</p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('manager|admin')): ?>

                <li class="nav-header">PARAMETRAGES</li>

                

                
                <li class="nav-item">
                    <a href="<?php echo e(route('clients.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/clients*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>


                
                <li class="nav-item">
                    <a href="<?php echo e(route('tarifications.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/tarification*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tarification</p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="<?php echo e(route('articles.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/articles*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Articles</p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="<?php echo e(route('typeArticles.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/typeArticles*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Type d'articles</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo e(route('categorieArticles.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/categorieArticles*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Catégorie d'articles</p>
                    </a>
                </li>

                
                







                
                



                
                <li class="nav-item">
                    <a href="<?php echo e(route('typeEvenements.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/typeEvenements*') ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Types d'événements</p>
                    </a>
                </li>
                <?php endif; ?>




                <?php if(auth()->check() && auth()->user()->hasRole('admin|super-admin')): ?>
                
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="nav-link <?php echo e(request()->is('parametrage/users*') ? 'active' : ''); ?>">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\Users\Brindou\OneDrive\Documents\GitHub\sourale-group\resources\views/layout/_sidebar.blade.php ENDPATH**/ ?>