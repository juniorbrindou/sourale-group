<div class="content-header">
	<div class="container-fluid">
		<div class="mb-2 row">
            <div class="col-sm-6">
                @unless ($breadcrumbs->isEmpty())
                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)

                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <li class="breadcrumb-item active">
                                    <a class="btn btn-primary" href="{{ $breadcrumb->url }}">
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
