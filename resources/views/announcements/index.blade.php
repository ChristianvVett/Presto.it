<x-layout>
    @if (session()->has('message'))
        <div class="message-container">
        <p class="create-success-message">
            {{ session('message') }}
        </p>
    </div>
@endif 
    <section class="recently-added container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title txt-detail">
                        TUTTI GLI ANNUNCI
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
                                <img class="product-card-image" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/300'}}">
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
        <div class="d-flex justify-content-center">
            <div>
                {{$announcements->links()}}
            </div>
        </div>
    </section>
</x-layout>
{{-- <div class="bg-main-index bg-announcement prova-1"> --}}
        {{-- <div class="container">
        <div class="row">
            @forelse($announcements as $announcement)
            <div class="card mt-2" style="width: 18rem;">
                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="card-img-top" alt="{{$announcement->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$announcement->title}}</h5>
                    <p class="card-text">{{$announcement->description}}</p>
                    <p class="card-text">{{$announcement->price}}</p>
                    
                    <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary">{{__('ui.visualizza')}}</a>
                    <a href="{{route('category.show', ['category'=>$announcement->category])}}" class="btn btn-primary">{{__('ui.categoria')}} {{__('message.'.$announcement->category->name)}}</a>
                    <p class="card-text">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}
                                                {{__('ui.autore')}} {{$announcement->user->name ?? ''}}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    <p class="lead">{{__('ui.messaggio_ricerca_fallita')}}</p>
                </div>
            </div>
            @endforelse
            <div class="d-flex justify-content-center">
                <div>
                    {{$announcements->links()}}
                </div>
            </div>
        </div>
    </div> --}}
{{--     <section>
        <div class="container d-flex">
            <div class="button-buy mt-4">
                <a class="" href="{{ route('home') }}"><i class="bi bi-arrow-left w-25 p-3 buttons-page"></i></a>
            </div>
        </div>
    </section> --}}

{{--     <div class="container">
        <div class="row mt-2">
            <div class="col-12 d-flex columns flex-wrap mt-2"> 
                    @forelse($announcements as $announcement)
                            
                            <div id="card" class="card mx-auto text-center m-2 mt-5" style="width: 18rem;">
                                        <h5 class="card-title fw-bold border p-2">{{$announcement->title}}</h5>
                                    <div class="price-section">
                                        <p class="card-text product-price p-1">Price:</p>
                                        <span class="product-price p-1">{{$announcement->price}}</span>
                                    </div>
                                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="card-img-top p-2" alt="{{$announcement->title}}" class="card-img-top" alt="...">
                                    <div class="descr-section p-1 border-bottom">
                                        <p class="card-text text-break">{{__()}} {{$announcement->description}}</p>
                                    </div>
                                    <div class="button-section">
                                        <div class="button-buy m-2">
                                            <a class=" buy-link stretched-link " href="{{route('announcement.show', compact('announcement'))}}">{{__('ui.Visualizza Articolo')}}</a>
                                        </div>
                                        <div class="button-SeeMore button-buy m-2">
                                            <a id="category" class="buy-link p-2 cat-link stretched-link" href="{{route('category.show', ['category'=>$announcement->category])}}">{{__('ui.Categoria:')}} {{__('message.'.$announcement->category->name)}}</a>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="d-flex">
                                        <p class=""><i class="bi bi-vector-pen"></i>{{__('ui.autore')}} {{$announcement->user->name ?? ''}}</p>
                                    </div>
                                    <div class="info-section d-flex">
                                        <div class="info-card1 m-2">
                                        <p>{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                        </div>
                                    </div> --}}
{{--                             </div>
                                @empty
                                    <div class="col-12">
                                        <p class="h1">{{__('ui.annunci_non_presenti')}}</p>
                                        <p class="h2">{{__('ui.pubblicane_uno')}}: <a href="{{route('announcement.create')}}">{{__('ui.nuovo_annuncio')}}</a></p>
                                    </div>
                    @endforelse
            </div>
        </div>
    </div>            
    <div class="d-flex justify-content-center">
        <div>
            {{$announcements->links()}}
        </div>
    </div>
</div> --}}
{{-- </x-layout> --}}