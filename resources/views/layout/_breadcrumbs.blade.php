{{-- <!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">

		<div class="mb-2 row">


			<div class="col-sm-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">
						<a class="btn btn-secondary" href="{{url('/')}}">Tableau de Bord</a>
					</li>

					@if (str_contains(request()->getPathInfo(),'edit'))

					@endif

					@foreach ($segments = request()->segments() as $index => $segment)
					@if(last($segments) != 'dashboard')

					<li class="breadcrumb-item">
						<a href="{{ url(implode('/', array_slice($segments, 0, $index +1 ))) }}"
							class="btn btn-primary">{{Str::title($segment)}}</a>
					</li>
					@endif
					@endforeach

				</ol>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<div class="float-sm-right">

					<h1 class="m-0 text-capitalize">{{page_title()}}</h1>
				</div>
			</div><!-- /.col -->


		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header --> --}}
<div class="content-header">
	<div class="container-fluid">
		<div class="mb-2 row">
            <div class="col-sm-6">
                @unless ($breadcrumbs->isEmpty())
                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)

                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <li class="breadcrumb-item active">
                                    <a class="btn btn-secondary" href="{{ $breadcrumb->url }}">
                                        {{ $breadcrumb->title }}
                                    </a>
                                </li>
                            @else
                                <li class="breadcrumb-item active">
                                    <button class="btn btn-secondary">{{ $breadcrumb->title }}</button>
                                </li>
                            @endif

                        @endforeach
                    </ol>
                @endunless
            </div>
        </div>
    </div>
</div>
