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
				<img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="{{ route('utilisateurs.show',1) }}" class="d-block">Alexander Pierce</a>
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
						<p>Articles</p>
					</a>
				</li>
				

				{{-- clients --}}
				<li class="nav-item">
					<a href="{{route('clients.index')}}" class="nav-link {{ request()->is('clients*') ? 'active' : ''}}">
						<i class="fas fa-users nav-icon"></i>
						<p>Clients</p>
					</a>
				</li>


				{{--  --}}
				<li class="nav-item {{ request()->is('clients*') ? 'menu-is-opening' : ''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Layout Options
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/layout/boxed.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Boxed</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-header">EXAMPLES</li>

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-search"></i>
						<p>
							Search
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/search/simple.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Simple Search</p>
							</a>
						</li>
					</ul>
				</li>


				{{-- parametrage --}}
				<li class="nav-header">paramétrage</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fas fa-tag nav-icon"></i>
						<p>Articles</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>