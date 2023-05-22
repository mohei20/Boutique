<header class="header bg-white">
    <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
            <a class="navbar-brand" href="{{ route('home') }}"><span
                    class="fw-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <form class="d-flex" action="{{ route('search.index') }}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="query">
                        <button class="nav-link" type="submit">Search</button>
                    </form>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                        @if (!Auth::user()->isAdmin)
                            <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"> <i
                                        class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                        class="text-gray fw-normal">({{ count((array) session('cart')) }})</small></a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="pagesDropdown" href="" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('Users_Images/' . Auth::user()->image) }}"
                                    style="width: 35px;
                                        height: 35px;
                                        border: 0;
                                        border-radius: 50%;"
                                    alt="avatar"></a>
                            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                                <div class="dropdown-header">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                                            <span>{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                @if (Auth::user()->isAdmin)
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="text-info ti-settings"></i>Admin Panel
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="text-danger ti-unlock"></i>LogOut</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> <i
                                    class="fas fa-user-alt mr-1 text-gray"></i>Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
