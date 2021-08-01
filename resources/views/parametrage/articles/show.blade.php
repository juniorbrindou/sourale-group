@extends('layout.app')

@section('main')

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{ ucwords($article->libelle)}}</h3>
          <div class="col-12">
            @if($article->article_photo)
            <img alt="Avatar" class="product-image" alt="Product Image"
              src="{{asset('storage/'.$article->article_photo)}}">
            @else
            <img alt="Avatar" class="product-image" alt="Product Image"
              src="{{asset('storage/articles/default_article.png')}}">
            @endif

          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">{{ucwords($article->libelle)}}</h3>
          <hr>

          <div class="bg-gray py-2 px-3 mt-4">
            <hr>
            Type : <h4 class="d-inline">{{$article->type_article->libelle}} </h4> <br>
            <hr>
            Catégorie : <h4 class="d-inline"> {{$article->categorie_article->libelle}} </h4>
          </div>

          <nav class="w-100 mt-2">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                role="tab" aria-controls="product-comments" aria-selected="false">Commentaire</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              {{ ($article->description) ? $article->libelle : 'Aucune description pour cet article'}}
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">

            </div>


          </div>
          <div class="text-xs text-bold">
            <a href="{{route('users.show',$article->user->id)}}" style="color: black" title="Voir l'utilisateur">
              Derniere
              Modification :
              {{$article->user->nom}} {{$article->user->prenoms}} ({{$article->user->login}}) </a>
          </div>
        </div>
        <div class="row mt-4">

        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection


@push('styles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

@endpush

@push('scripts')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
@endpush