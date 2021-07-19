<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="{{asset('dist/img/logo.png')}}" alt="Logo de souralè" class="brand-image" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ config("app.name")}}</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{asset('dist/img/avatar3.png')}}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="{{ route('utilisateurs.show', Auth::user()->id) }}" class="d-block">{{ (Auth::user()->login)}}</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Rechercher" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="{{url('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Tableau de Bord</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{route('articles.index')}}" class="nav-link {{ request()->is('stock*') ? 'active' : ''}}">
						<i class="fas fa-archive nav-icon"></i>
						<p>Magasin</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="{{route('articles.index')}}" class="nav-link {{ request()->is('article*') ? 'active' : ''}}">
						<i class="fas fa-tag nav-icon"></i>
						<p>Articles en Stock</p>
					</a>
				</li>
				

				




				<li class="nav-item {{ request()->is('clients*') ? 'menu-is-opening' : ''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Gestion des Packages
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						{{-- packages --}}
						<li class="nav-item">
							<a href="{{route('clients.index')}}" class="nav-link {{ request()->is('clients*') ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Packages</p>
							</a>
						</li>
						{{-- packages --}}
						<li class="nav-item">
							<a href="{{route('clients.index')}}" class="nav-link {{ request()->is('clients*') ? 'active' : ''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Type de Packages</p>
							</a>
						</li>

					</ul>
				</li>


		{{-- parametrage --}}
				<li class="nav-header">paramétrage</li>
				{{-- categorieArticles --}}
				<li class="nav-item">
					<a href="{{route('articles.index')}}" class="nav-link {{ request()->is('articles*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Articles</p>
					</a>
				</li>

				{{-- categorieArticles --}}
				<li class="nav-item">
					<a href="{{route('categorieArticles.index')}}" class="nav-link {{ request()->is('categorieArticles*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Catégories d'articles</p>
					</a>
				</li>

				{{-- clients --}}
				<li class="nav-item">
					<a href="{{route('clients.index')}}" class="nav-link {{ request()->is('clients*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Clients</p>
					</a>
				</li>

				{{-- fournisseurs --}}
				<li class="nav-item">
					<a href="{{route('fournisseurs.index')}}" class="nav-link {{ request()->is('fournisseurs*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Fournisseurs</p>
					</a>
				</li>

				{{-- typeArticles --}}
				<li class="nav-item">
					<a href="{{route('typeArticles.index')}}" class="nav-link {{ request()->is('typeArticles*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Type d'articles</p>
					</a>
				</li>

				{{-- typeEvenements --}}
				<li class="nav-item">
					<a href="{{route('typeEvenements.index')}}" class="nav-link {{ request()->is('typeEvenements*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Catégories d'événements</p>
					</a>
				</li>

				{{-- typePackages --}}
				<li class="nav-item">
					<a href="{{route('typePackages.index')}}" class="nav-link {{ request()->is('typePackages*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>Type de packages</p>
					</a>
				</li>

				{{-- users --}}
				<li class="nav-item">
					<a href="{{route('users.index')}}" class="nav-link {{ request()->is('users*') ? 'active' : ''}}">
						<i class="far fa-circle nav-icon"></i>
						<p>le personnel</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>