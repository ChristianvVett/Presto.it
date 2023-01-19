<x-layout>
    @if (session()->has('message'))
        <div class="message-container">
        <p class="create-success-message">
            {{ session('message') }}
        </p>
    </div>
@endif 
    <header id="header">
        <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item-1 carousel-item active" data-bs-interval="3000">
                    <div class="hc-content-container">
                        <div class="carousel-content">
                            <h2 class="hc-text"> {{ __('ui.Evita_le_code1') }}</h2>
                            <h2 class="hc-text">{{ __('ui.Evita_le_code2') }}</h2>
                            <h2 class="hc-text">{{ __('ui.Evita_le_code3') }}<span
                                    class="txt-cancel">{{ __('ui.Evita_le_code4') }}</span></h2>
                        </div>
                    </div>
                    <div class="hc-btn-container">
                        <button class="header-carousel-btn bg-cancel mx-auto">
                            <a href="{{ route('announcement.index') }}">{{ __('ui.compra_ora') }}</a>
                        </button>
                    </div>
                </div>
                <div class="carousel-item-2 carousel-item" data-bs-interval="3000">
                    <div class="hc-content-container">
                        <div class="carousel-content">
                            <h2 class="hc-text">{{ __('ui.Vendi_in_qualsiasi_momento1') }}</h2>
                            <h2 class="hc-text">{{ __('ui.Vendi_in_qualsiasi_momento2') }}</h2>
                            <h2 class="hc-text"><span
                                    class="txt-detail">{{ __('ui.Vendi_in_qualsiasi_momento3') }}</span></h2>
                        </div>
                    </div>
                    <div class="hc-btn-container">
                        <button class="header-carousel-btn bg-detail mx-auto">
                            @guest
                                <a href="{{ route('login') }}">{{ __('ui.crea_annuncio') }}</a>
                            @else
                                <a href="{{ route('announcement.create') }}">{{ __('ui.crea_annuncio') }}</a>
                            @endguest
                        </button>
                    </div>
                </div>
                <div class="carousel-item-3 carousel-item" data-bs-interval="3000">
                    <div class="hc-content-container">
                        <div class="carousel-content">
                            <h2 class="hc-text">{{ __('ui.Entra_nel') }}</h2>
                            <h2 class="hc-text"><span class="txt-success">{{ __('ui.Entra_nel2') }}
                                </span></h2>
                        </div>
                    </div>
                    <div class="hc-btn-container">
                    <button class="header-carousel-btn bg-success mx-auto">
                        @if (Auth::user()?->is_revisor)
                            <a href="{{ route('revisor.index') }}">{{ __('ui.Area_revisore') }}</a>
                        @else
                            <a href="{{ route('become.revisor') }}">{{ __('ui.Lavoraa') }}</a>
                        @endif
                    </button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <main id="main">
        {{-- 
            ? WHY US SECTION ?    
        --}}
        <section class="container-fluid why-us">
            <div class="row">
                <section class="col-12">
                    <h2 class="section-title txt-detail">
                        {{__('ui.perche_presto')}}
                    </h2>
                </section>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center flex-column">
                    <h3 class="item-title">
                        {{__('ui.cons_grat')}}
                    </h3>
                    <i class="why-us-icons bi bi-piggy-bank-fill txt-detail"></i>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center flex-column">
                    <h3 class="item-title">
                       {{__('ui.sped_rapide')}}
                    </h3>
                    <i class="why-us-icons bi bi-rocket-takeoff txt-cancel"></i>
                </div>
                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center flex-column">
                    <h3 class="item-title">
                       {{__('ui.pag_sicuri')}}
                    </h3>
                    <i class="why-us-icons bi bi-shield-fill-check txt-success"></i>
                </div>
            </div>
        </section>
        {{-- 
            * RECENTLY ADDED *    
        --}}
        <section class="recently-added container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title txt-detail">
                            {{__('ui.ultimi_annunci')}}
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @forelse($announcements as $announcement)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="product-card" title="{{__('ui.visualizza')}}">
                                <h4 class="product-card-title">{{$announcement->title}}</h4>
                                <div class="product-card-image-container">
                                    <img src="{{$announcement->images()->first()->getUrl(300, 300)}}" class="product-card-image" alt="{{$announcement->title}}">
                                </div>
                                <div class="product-card-details">
                                    <div class="product-card-category-container">
                                        <a class="product-card-category" href="{{route('category.show', ['category'=>$announcement->category])}}">
                                            {{__('message.'.$announcement->category->name)}}
                                        </a>
                                    </div>
                                    <p class="product-card-price">{{$announcement->price}} {{__('ui.valuta')}}</p>
                                </div>
                                <a class="product-show-link stretched-link" href="{{route('announcement.show', compact('announcement'))}}">{{-- {{__('ui.visualizza')}} --}}</a>
                            </div>
                        </div>
                        @empty
                        <div class="not-found container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-6 not-found-container">
                                    <div class="not-found-img-container">
                                        <img class="not-found-img" src="/media/astronautaconfuso.jpg" alt="">
                                    </div>
                                    <p class="not-found-txt">{{__('ui.annunci_non_presenti')}}</p>
                                    <p class="not-found-txt">{{__('ui.pubblicane_uno')}} <a href="{{route('announcement.create')}}">{{__('ui.nuovo_annuncio')}}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="show-announcement-btn-container">
                <button class="show-announcement-btn bg-detail">
                    <a class="show-announcement-link" href="{{ route('announcement.index') }}">{{__('ui.tutti_gli')}}</a>
                </button>
            </div>
        </section>
    </main>
</x-layout>