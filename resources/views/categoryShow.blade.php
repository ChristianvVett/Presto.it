<x-layout>
    <section class="recently-added container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title txt-detail">
                        {{__('ui.Risultati_ricerca')}}
                    </h2>
                </div>
            </div>
            <div class="row">
                @forelse($category->announcements->where('is_accepted',true) as $announcement)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="product-card" title="{{__('ui.visualizza')}}">
                        <h4 class="product-card-title">{{$announcement->title}}</h4>
                        <div class="product-card-image-container">
                            <img class="product-card-image" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" alt="{{$announcement->title}}">
                        </div>
                        <div class="product-card-details">
                            <div class="product-card-category-container">
                                <a class="product-card-category" href="{{route('category.show', ['category'=>$announcement->category])}}">
                                    {{__('message.'.$announcement->category->name)}}
                                </a>
                            </div>
                            <p class="product-card-price">{{$announcement->price}} {{__('ui.valuta')}}</p>
                        </div>
                        <a class="product-show-link stretched-link" href="{{route('announcement.show', compact('announcement'))}}">{{-- {{__    ('ui.visualizza')}} --}}</a>
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
        <div class="d-flex justify-content-center">
            <div>
                {{-- {{$category->$announcement->links()}} --}}
            </div>
        </div>
</section>
</x-layout>