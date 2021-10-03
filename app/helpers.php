<?php

use Carbon\Carbon;

/**
 * Fonction utili
 **/
if (!function_exists('ipAddress')) {
    function ipAddress()
    {
        $ipAddress = exec('for /f "tokens=2 delims=[]" %a in (\'ping -n 1 -4 "%computername%"\') do @echo %a');
        $qrCode = $ipAddress;
        return $qrCode;
    }
}



if (!function_exists('couleur_status')) {
    /**
     * calcule le totale de chaque ligne
     * @param string $status
     * @return string [type]
     */
    function couleur_status(string $status)
    {
        if ($status == 'EN COURS') {
            $color = 'primary';
        } elseif ($status == 'TERMINÉ') {
            $color = 'success';
        } elseif ($status == 'ANNULÉ') {
            $color = 'info';
        } elseif ($status == 'ENREGISTRÉ') {
            $color = 'danger';
        } elseif ($status == 'CLOTURÉ') {
            $color = 'secondary';
        } else {
            $color = 'warning';
        }

        return $color;
    }
}



if (!function_exists('total_ligne')) {
    /**
     * calcule le totale de chaque ligne
     * @param float $quantite
     * @param float $nb_jours
     * @param float $prix_unitaire
     *
     * @return [type]
     */
    function total_ligne(float $quantite, float $nb_jours, float $prix_unitaire)
    {
        $total = $quantite * $nb_jours * $prix_unitaire;
        return $total;
    }
}



if (!function_exists('long_date')) {
    /**
     * retourne la date au format humain de carbone
     * ex: long_date(date('Y-m-d H:i'))
     * ex: dimanche 29 août 2021 14:01
     * si aucun parametre, retourne la date du jour
     *
     * @param string|null $date
     * @return string| date
     */
    function long_date($date = null)
    {
        if ($date == null) {
            return Carbon::now()->isoFormat('LLLL');
        } else {
            $date = Carbon::parse($date);
            return $date->isoFormat('LLLL');
        }
    }
}



if (!function_exists('format_money')) {
    function format_money($montant)
    {
        return number_format($montant, 0, ',', ' ');
    }
}

if (!function_exists('format_no_array')) {

    function format_no_array($array)
    {
        $skips = ["[", "]", "\""];
        return str_replace($skips, ' ', $array);
    }
}

if (!function_exists('page_title')) {
    function page_title()
    {

        $title = last(request()->segments());
        return $title;
    }
}

if (!function_exists('getTile')) {
    /**
     * Retourne un titre dynamique pour le titre des pages
     * @return Title @string
     */
    function getTile()
    {

        if (request()->is('dashboard')) {
            return 'Tableau de bord';
        } else if (request()->is('categorieArticles*')) {
            return 'Catégories d\'articles';
        } else if (request()->is('clients*')) {
            return 'Clients';
        } else if (request()->is('fournisseurs*')) {
            return 'Fournisseurs';
        } else if (request()->is('typeArticles*')) {
            return 'Type des articles';
        } else if (request()->is('typeEvenements*')) {
            return 'Type d\'événements';
        } else if (request()->is('users*')) {
            return 'Utilisateurs';
        } else {
            echo '';
        }
    }
}

if (!function_exists('userAvatar')) {
    /**
     * Recoit le genre de l'utilisateur, retourne un avatar en fonction du genre
     * @return avatar @string
     */
    function userAvatar(string $GenreUser)
    {
        if ($GenreUser === 'Mme') {
            $avatar = asset('dist/img/avatar3.png');
        } elseif ($GenreUser === 'M') {
            $avatar = asset('dist/img/avatar.png');
        } elseif ($GenreUser === 'Mlle') {
            $avatar = asset('dist/img/34.jpg');
        } else {
            $avatar = asset('dist/img/25.jpg');
        }
        return $avatar;
    }
}
