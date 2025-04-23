@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!-- Sidebar -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @foreach($menuItems as $item)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs($item['url']) ? 'active' : '' }}" href="{{ $item['url'] }}">
                        <i class="{{ $item['icon'] }}"></i>
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<!-- / Sidebar -->
