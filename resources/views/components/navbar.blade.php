<nav class="navbar navbar-expand-lg flex-column">
    <div class="container-fluid container-lg">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="nav-logo img-fluid" src="/media/logo-Presto1-0.png" alt="Presto.it logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <div class="stick-1"></div>
            <div class="stick-2"></div>
            <div class="stick-3"></div>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            {{--
                * SEARCHBAR *
            --}}
            <div class="p-0">
                <div class="collapse collapse-horizontal" id="collapseSearch">
                    <div class="p-1" style="width: 300px;">
                        <form action="{{ route('announcements.search') }}" method="GET"
                            class="search-bar d-flex w-100" role="search">
                            <button id="navSearchBtn" class="btn d-none d-lg-block" type="submit">
                                <i class="search-icon fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input id="navSearchBar" class="nav-search-input form-control me-2 ps-0 py-2"
                                name="searched" type="search" placeholder="{{ __('ui.cerca') }}" aria-label="Search">
                            <button id="navSearchBtn" class="btn d-lg-none" type="submit">
                                <i class="search-icon fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- * NAV ITEMS * --}}
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    {{-- 
                        ? SEARCH TRIGGER ?
                    --}}
                    <a class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                        {{__('ui.Cercare')}}
                    </a>
                </li>
                {{-- * NAV LINKS * --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcement.index') }}">{{ __('ui.tutti_gli_annunci') }}</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcement.create') }}">{{ __('ui.nuovo_annuncio') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="role">
                        @if (Auth::user()?->is_revisor)
                            <i class="revisor-icon bi bi-r-square"></i>
                        @endif
                        </span>
                        @guest
                        <span class="user-name">{{ __('ui.accedi_registrati') }}</span>
                        @else
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        @if (Auth::user()?->is_revisor)
                        <span class="notify">
                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                        </span>
                        @endif
                        @endguest
                    </a>
                    <ul class="dropdown-menu">
                        @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.accedi') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.registrati') }}</a></li>
                        @else
                        {{-- se l'utente è loggato --}}
                        @if (Auth::user()?->is_revisor)
                        <li><a class="dropdown-item" href="{{ route('revisor.index') }}">{{__('ui.Area_revisore')}}</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('become.revisor')}}">{{__('ui.lavora_con_noi')}}</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif
                        @auth
                        <li><a class="dropdown-item" href="{{ route('userPage.index') }}">User-Page</a></li>
                        @endauth
                        <li><a class="dropdown-item" href=""
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.esci') }}</a>
                        </li>
                        <form id="form-logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                        @endguest
                        <li>
                            {{--
                                ? CHOOSE LANGUAGE TRIGGER MODAL ?
                            --}}
                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#chooseLanguageModal">
                                {{__('ui.Cambia_lingua')}}
                                <span class="dropdown-flag fi fi-it fis"></span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="collapse w-100" id="collapseSearch">
        <div class="categories-dropdown">
            <h2 class="categories-dropdopwn-title">{{__('ui.Cerca_per_categoria')}}</h2>
            <ul class="dropdown-categories-list container">
                @foreach ($categories as $category)
                <li class="dropdown-category-item">
                    <a class="dropdown-category-link" href="{{ route('category.show', compact('category')) }}">{{ __('message.' . $category->name) }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
{{--
    ? CHOOSE LANGUAGE MODAL ?
--}}
<div class="modal fade" id="chooseLanguageModal" tabindex="1" aria-labelledby="chooseLanguageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="chooseLanguageModalLabel">{{__('ui.Seleziona_lingua')}}</h1>
                <button type="button" class="{{-- btn-close  --}}nav-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="flag-modal-body container">
                <a href="#" class="select-language d-flex flex-column py-3">
                    <span class="modal-flag mx-auto"><x-_locale lang="it" /></span>
                    {{__('ui.Italiano')}}
                </a>
                <a href="#" class="select-language d-flex flex-column py-3">
                    <span class="modal-flag mx-auto"><x-_locale lang="en" /></span>
                    {{__('ui.Inglese')}}
                </a>
                <a href="#" class="select-language d-flex flex-column py-3">
                    <span class="modal-flag mx-auto"><x-_locale lang="de" /></span>
                    {{__('ui.Tedesco')}}
                </a>
            </div>
        </div>
    </div>
</div>
