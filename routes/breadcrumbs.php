<?php
use App\Clients;
use App\Evenements;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Tableau de Bord', route('home'));
});





# Locations
    # locations.index
    Breadcrumbs::for('locations.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Locations', route('locations.index'));
    });

    # creation de location
    Breadcrumbs::for('locations.create', function ($trail) {
        $trail->parent('locations.index');
        $trail->push('Nouvelle Location', route('locations.create'));
    });

    #Location.show
    Breadcrumbs::for('evennements.show', function ($trail, $evenement) {
        $trail->parent('locations.index');
        //todo : passge de l'evenement : priorité faible
        $trail->push('Details de location', route('evennements.show',$evenement));
    });

    Breadcrumbs::for('locations.show', function ($trail,$locations) {
        $trail->parent('locations.index');
        $trail->push('Details', route('locations.show',$locations));
    });

    # Retours
    Breadcrumbs::for('locations.edit', function ($trail,$evenement) {
        $trail->parent('locations.index');
        //todo : passge de l'evenement : priorité faible
        $trail->push('Retour de Location', route('locations.edit',$evenement));
    });
# fin locations




# Stock
    # Voir le stock
    Breadcrumbs::for('stock', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Stock', route('stock'));
    });

    # list de destockage
    Breadcrumbs::for('destockages.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Sortie de Stock', route('destockages.index'));
    });

    # creation de destockage
    Breadcrumbs::for('destockages.create', function ($trail) {
        $trail->parent('destockages.index');
        $trail->push('Nouveau', route('destockages.create'));
    });

    # Entrée de stock
    Breadcrumbs::for('approvisionnement.create', function ($trail) {
        $trail->parent('approvisionnement.index');
        $trail->push('Nouveau', route('approvisionnement.create'));
    });

    # liste des Approvisionnements
    Breadcrumbs::for('approvisionnement.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Entrée de stock', route('approvisionnement.index'));
    });
# fin Stock



#Clients
    # creation de client
    Breadcrumbs::for('clients.create', function ($trail) {
        $trail->parent('clients.index');
        $trail->push('Nouveau', route('clients.create'));
    });

    # unique client
    Breadcrumbs::for('clients.show', function ($trail,Clients $client) {
        $trail->parent('clients.index');
        $trail->push($client->nom, route('clients.show',$client));
    });

    # liste des clients
    Breadcrumbs::for('clients.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Clients', route('clients.index'));
    });
#Clients



# Utilisateurs
    #liste des utilisateurs
    Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
        $trail->parent('dashboard');
        $trail->push('Liste Utilisateurs', route('users.index'));
    });

    # creation des utilisateurs
    Breadcrumbs::for('users.create', function ($trail) {
        $trail->parent('users.index');
        $trail->push('Nouveau', route('users.create'));
    });

    //todo: correction : reussir a passer l'utilisateur correctement
    Breadcrumbs::for('users.show', function ($trail, $user) {
        $trail->parent('dashboard');
        $trail->push('Utilisateur', route('users.show',$user));
    });
# fin Utilisateurs



# Articles
    # creation d'articles
    Breadcrumbs::for('articles.create', function ($trail) {
        $trail->parent('articles.index');
        $trail->push('Nouveau', route('articles.create'));
    });

    # for article list
    Breadcrumbs::for('articles.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Liste Articles', route('articles.index'));
    });
# fin articles




# liste des types d'articles
Breadcrumbs::for('typeArticles.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Liste Type Article', route('typeArticles.index'));
});



# Categorie d'article
    # liste des categories d'articles
    Breadcrumbs::for('categorieArticles.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Categorie Article', route('categorieArticles.index'));
    });

    # creation de categorie d'articles
    Breadcrumbs::for('categorieArticles.create', function ($trail) {
        $trail->parent('categorieArticles.index');
        $trail->push('Nouveau', route('categorieArticles.create'));
    });
# fin categorie d'article



# Type d'evenements
    # liste des type d'évènements
    Breadcrumbs::for('typeEvenements.index', function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Liste Type Evenement', route('typeEvenements.index'));
    });

    # creation de type d'évènements
    Breadcrumbs::for('typeEvenements.create', function ($trail) {
        $trail->parent('typeEvenements.index');
        $trail->push('Nouveau', route('typeEvenements.create'));
    });
# fin type d'evenemements



// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
