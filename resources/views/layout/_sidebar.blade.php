<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('dist/img/logo.png')}}" alt="Logo de souralè" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config("app.name")}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ userAvatar(Auth::user()->genre)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('utilisateurs.show', Auth::user()->id) }}"
                    class="d-block">{{ (Auth::user()->login)}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Rechercher"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {{-- class : nav-child-indent --}}
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                @role('manager|secretaire|admin')

                <li class="nav-item">
                    <a href="{{url('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('locations.index')}}"
                        class="nav-link {{ request()->is('location*') ? 'bg-warning active' : ''}}">
                        <i class="fas fa-shipping-fast nav-icon"></i>
                        <p>Locations</p>
                    </a>
                </li>

                <li class="nav-header">FLUX DE STOCK</li>

                <li class="nav-item">
                    <a href="{{url('stock')}}" class="nav-link {{ request()->is('stock*') ? 'bg-info active' : ''}}">
                        <i class="fas fa-box-open nav-icon"></i>

                        <p>Stock</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('approvisionnement.index')}}"
                        class="nav-link {{ request()->is('approvisionnement*') ? 'bg-success active' : ''}}">
                        <i class="fas fa-door-open nav-icon"></i>
                        <p>Entrée de Stock</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('destockages.index')}}"
                        class="nav-link {{ request()->is('destockages*') ? 'bg-danger  active' : ''}}">
                        <i class="fa fa-trash-restore-alt nav-icon"></i>
                        <p>Sortie de stock</p>
                    </a>
                </li>
                @endrole

                @role('manager|admin')

                <li class="nav-header">PARAMETRAGES</li>

                {{-- parametrage --}}


                {{-- tarifications --}}
                <li class="nav-item">
                    <a href="{{route('tarifications.index')}}"
                        class="nav-link {{ request()->is('parametrage/tarification*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tarification</p>
                    </a>
                </li>

                {{-- categorieArticles --}}
                <li class="nav-item">
                    <a href="{{route('articles.index')}}"
                        class="nav-link {{ request()->is('parametrage/articles*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Articles</p>
                    </a>
                </li>

                {{-- categorieArticles --}}
                <li class="nav-item">
                    <a href="{{route('typeArticles.index')}}"
                        class="nav-link {{ request()->is('parametrage/typeArticles*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Type d'articles</p>
                    </a>
                </li>
                {{-- typeArticles --}}
                <li class="nav-item">
                    <a href="{{route('categorieArticles.index')}}"
                        class="nav-link {{ request()->is('parametrage/categorieArticles*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Catégorie d'articles</p>
                    </a>
                </li>

                {{-- package --}}
                <li class="nav-item">
                    <a href="{{route('packages.index')}}"
                        class="nav-link {{ request()->is('parametrage/packages*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Packages</p>
                    </a>
                </li>





                {{-- clients --}}
                <li class="nav-item">
                    <a href="{{route('clients.index')}}"
                        class="nav-link {{ request()->is('parametrage/clients*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>

                {{-- fournisseurs --}}
                {{-- <li class="nav-item">
							<a href="{{route('fournisseurs.index')}}"
                class="nav-link {{ request()->is('parametrage/fournisseurs*') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Fournisseurs</p>
                </a>
                </li> --}}



                {{-- typeEvenements --}}
                <li class="nav-item">
                    <a href="{{route('typeEvenements.index')}}"
                        class="nav-link {{ request()->is('parametrage/typeEvenements*') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Types d'événements</p>
                    </a>
                </li>
                @endrole




                @role('admin|super-admin')
                {{-- users --}}
                <li class="nav-item">
                    <a href="{{route('users.index')}}"
                        class="nav-link {{ request()->is('parametrage/users*') ? 'active' : ''}}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
