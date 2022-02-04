<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item {{ $breadcrumbs->isEmpty() ? 'active' : '' }}"><a href="/">Home</a></li>
        @foreach ($breadcrumbs as $key => $url)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (!$loop->last)
                    <a href="{{ url($url) }}">
                        {{ __('breadcrumbs.' . $key) }}
                    </a>
                @else
                    {{ __($header) }}
                @endif
            </li>
        @endforeach
    </ol>
</div>
