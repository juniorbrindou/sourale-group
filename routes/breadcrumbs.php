<?php
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
// use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
// use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Tableau de Bord', route('home'));
});

# Locations
    # locations.index
    Breadcrumbs::for('locations.index', function ($trail) {
        $trail->push('Locations', route('locations.index'));
    });

    # creation de location
    Breadcrumbs::for('locations.create', function ($trail) {
        $trail->push('Nouvelle Location', route('locations.create'));
    });

    #Location.show
    Breadcrumbs::for('evennements.show', function ($trail, $evenement) {
        $trail->push('Title Here', route('evennements.show',$evenement));
    });

    Breadcrumbs::for('locations.show', function ($trail,$evenement) {
        $trail->push('Title Here', route('locations.show',$evenement));
    });

    # Retours
    Breadcrumbs::for('locations.edit', function ($trail,$evenement) {
        $trail->push('Title Here', route('locations.edit',$evenement));
    });
# fin locations

# Voir le stock
Breadcrumbs::for('stock', function ($trail) {
    $trail->push('Title Here', route('stock'));
});

# list de destockage
Breadcrumbs::for('destockages.index', function ($trail) {
    $trail->push('Title Here', route('destockages.index'));
});

# creation de destockage
Breadcrumbs::for('destockages.create', function ($trail) {
    $trail->push('Title Here', route('destockages.create'));
});

# Entrée de stock
Breadcrumbs::for('approvisionnement.index', function ($trail) {
    $trail->push('Title Here', route('approvisionnement.index'));
});

# creation de client
Breadcrumbs::for('clients.create', function ($trail) {
    $trail->push('Title Here', route('clients.create'));
});

# unique client
Breadcrumbs::for('clients.show', function ($trail,$client) {
    $trail->push('Title Here', route('clients.show',$client));
});

# liste des clients
Breadcrumbs::for('clients.index', function ($trail) {
    $trail->push('Clients', route('clients.index'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->push('Utilisateur', route('users.index'));
});

# creation d'articless
Breadcrumbs::for('articles.create', function ($trail) {
    $trail->push('Title Here', route('articles.create'));
});

# for article list
Breadcrumbs::for('articles.index', function ($trail) {
    $trail->push('Liste Articles', route('articles.index'));
});

# liste des types d'articles
Breadcrumbs::for('typeArticles.index', function ($trail) {
    $trail->push('Title Here', route('typeArticles.index'));
});

# liste des categories d'articles
Breadcrumbs::for('categorieArticles.index', function ($trail) {
    $trail->push('Title Here', route('categorieArticles.index'));
});

# creation de categorie d'articles
Breadcrumbs::for('categorieArticles.create', function ($trail) {
    $trail->push('Title Here', route('categorieArticles.create'));
});

# liste des type d'évènements
Breadcrumbs::for('typeEvenements.index', function ($trail) {
    $trail->push('Title Here', route('typeEvenements.index'));
});

# creation de type d'évènements
Breadcrumbs::for('typeEvenements.create', function ($trail) {
    $trail->push('Title Here', route('typeEvenements.create'));
});


# creation des utilisateurs
Breadcrumbs::for('users.create', function ($trail) {
    $trail->push('Title Here', route('users.create'));
});

Breadcrumbs::for('users.show', function ($trail,$user) {
    $trail->push('Title Here', route('users.show',$user));
});


// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
