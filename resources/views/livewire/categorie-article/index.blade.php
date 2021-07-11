<div>
@foreach ($categorieArticles as $categorieArticle)
												
    <tr>
        <td>{{ $categorieArticle->code }}</td>
        <td>{{ substr($categorieArticle->libelle,0,35) }}...</td>
        <td>{{ substr($categorieArticle->description,0,70) }}...</td>
        <td>
            <a href="#" class="btn btn-primary btn-md">
                <i class="fa fa-eye"></i>
                voir
            </a>

            <button type="button" class="btn btn-danger btn-md">
                <i class="fa fa-trash"></i>
                Suprimer
            </button>

        </td>
    </tr>

@endforeach

    {{ $categorieArticles->links() }}
</div>
