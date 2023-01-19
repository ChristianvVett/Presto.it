 {{-- <x-layout>
<div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
    <div class="row">
        <div class="col-12 text-light p-5">
            <h1 class="display-2">{{__('ui.annuncio')}} {{$announcement->title}}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                @if ($announcement->images)
                <div class="carousel-inner">
                @foreach($announcement->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="img-fluid p-3 rounded" alt="">
                    </div>
                @endforeach
                </div>
            @else
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                    </div>
                
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                    </div>
                </div>
            @endif
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{__('ui.titolo')}} {{$announcement->title}}</h5>
                    <p class="card-text">{{__('ui.descrizione')}} {{$announcement->description}}</p>
                    <p class="card-link">{{__('ui.prezzo')}} {{$announcement->price}}</p>
                    <a href="{{route('category.show', ['category'=>$announcement->category])}}" class="card-link">
                        {{__('ui.categoria')}} {{__('message.'.$announcement->category->name)}}
                    </a>
                    <p class="card-footer">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                    <p class="card-footer">{{__('ui.autore')}} {{$announcement->user->name ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>  --}}
 <x-layout> 
    <div class="bg-announcement">
         {{--  arrow part --}}
        <section>
            <div class="container d-flex">

                <div class="row">
                    <div class="col-12">
                        <div class="button-buy my-4">
                            <a class="" href="{{ route('announcement.index') }}"><i class="bi bi-arrow-left w-25 p-3 buttons-page"></i></a>
                        </div>
                    </div>
                </div>
            
            </div>
        </section>

  {{-- main content  --}}
    <section>

        <div class="container detail-body mt-3">
            <section>
                <div class="text-center mb-4 ">
                    <div class="row">
                        <div class="detail-title text-light py-2">
                            <h1 class="main-title">{{$announcement->title}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                {{-- carousel --}}
                <div class="col-8 carousel-column-8">
                     <div  id="carouselExampleControls" class="carousel slide  me-2 py-3" data-bs-ride="carousel">
                        @if ($announcement->images)
                        <div class="carousel-inner">
                        @foreach($announcement->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <div class="d-flex justify-content-center">
                                    <img src="{{$image->getUrl(300,300)}}" class="img-fluid p-3 rounded" alt="">
                                </div>  
                            </div>
                        @endforeach
                        </div>
                    @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                            </div>
                        
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                            </div>
                        </div>
                    @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon  rounded-arrows" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon  rounded-arrows" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div> 
                    
                </div> 
                {{-- info section  --}}
                <div class="col-4 big-card-info py-3 border">
                    <p class="h3 text-light text-center rounded detail-title-content"> {{__('message.'.$announcement->category->name)}}</p>
                    <div class="info-section-1">
                        <p class="text-dark">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                        <p class="text-dark border-bottom" class="m-0 text-uppercase color-revisor"> ID: {{$announcement->id}}</p>
                    </div>
                    <div class="mt-5 border-bottom">
                        <h5 class="text-light text-center rounded detail-title-content">{{$announcement->title}}</h5>
                        <p class="text-dark">Prezzo:  {{$announcement->price}}</p>
                    </div>
                    <div class="mt-5 ">
                        <p class="text-dark fw-bold">{{__('ui.autore')}} {{$announcement->user->name ?? ''}}</p>
                    </div>
                </div>
                {{-- display none info section  --}}
                <div class="col-12 carousel-column-12">
                    <div  id="carouselExampleControls" class="carousel slide  me-2 py-3" data-bs-ride="carousel">
                       @if ($announcement->images)
                       <div class="carousel-inner">
                       @foreach($announcement->images as $image)
                           <div class="carousel-item @if($loop->first)active @endif">
                               <div class="d-flex justify-content-center">
                                   <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="img-fluid p-3 rounded" alt="">
                               </div>  
                           </div>
                       @endforeach
                       </div>
                   @else
                       <div class="carousel-inner">
                           <div class="carousel-item active">
                               <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                           </div>
                       
                           <div class="carousel-item">
                               <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                           </div>
                           <div class="carousel-item">
                               <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                           </div>
                       </div>
                   @endif
                       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon  rounded-arrows" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                       </button>
                       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                           <span class="carousel-control-next-icon  rounded-arrows" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                       </button>
                   </div> 
                   
               </div> 
                <div class="col-12 small-card-info py-3">
                    <p class="h3 text-light text-center rounded detail-title-content"> {{__('message.'.$announcement->category->name)}}</p>
                    <div class="info-section-1">
                        <p class="text-dark">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                        <p class="text-dark border-bottom" class="m-0 text-uppercase color-revisor"> ID: {{$announcement->id}}</p>
                    </div>
                    <div class="mt-5 border-bottom">
                        <h5 class="text-light text-center rounded detail-title-content">{{$announcement->title}}</h5>
                        <p class="text-dark">Prezzo:  {{$announcement->price}}</p>
                    </div>
                    <div class="mt-5 ">
                        <p class="text-dark fw-bold">{{__('ui.autore')}} {{$announcement->user->name ?? ''}}</p>
                    </div>
                </div>
            </div>
          
            {{-- description  --}}
            <div class="row mt-3 py-3">
                    <h3 class="card-text text-break"> {{__('ui.descrizione')}}</h3>
                    <p class=" text-dark">{{$announcement->description}}</p>
            </div>
            <div class="row detail-title h-25 border-bottom">
                <br>   
            </div>
        </div>

    </section>
    </div>
</x-layout>  

