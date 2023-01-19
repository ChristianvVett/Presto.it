<x-layout>
<div class="bg-revisor">
    
    <div class="container py-5">
        {{-- annunci da revisionare --}}
        <div class="container-fluid p-5 bg-revisor3 shadow rounded mb-4">
            <div class="row">
                <div class="col-12 text-light text-center">
                    <h1 class="display-6">
                        {{$announcement_to_check ? __('ui.annuncio_da_revisonare') : __('ui.nessun_annuncio_revisionabbile')}}
                    </h1>
                </div>
            </div>
        </div>
        @if($announcement_to_check)
            <div class="container bg-light rounded border-1">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div id="gallery" class="bg-white" >
                                @if ($announcement_to_check->images)
                                    @foreach($announcement_to_check->images as $image)
                                    <div class="card my-3 border-1">
                                        <div class="row p-2">
                                            <div class="col-12 col-lg-6 text-center">
                                                <img src="{{$image->getUrl(300,300)}}" class="img-fluid  p-3 rounded" alt="">
                                            </div>
                                            <div class="col-md-3 border-end">
                                                <h5 class="tc-accent mt-3">Tags</h5>
                                                <div class="p-2">
                                                    @if ($image->labels)
                                                        @foreach ( $image->labels as $label )
                                                            <p class="d-inline color-revisor">{{$label}}</p>
                                                        @endforeach                                           
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card-body">
                                                    <h5 class="tc-accent color-revisor">{{__('ui.Revisione_immagini')}}</h5>
                                                    <p class="color-revisor">{{__('ui.Adulti')}}: <span class="{{$image->adult}}"></span></p>
                                                    <p class="color-revisor">{{__('ui.Satira')}}: <span class="{{$image->spoof}}"></span></p>
                                                    <p class="color-revisor">{{__('ui.Medicina')}}: <span class="{{$image->medical}}"></span></p>
                                                    <p class="color-revisor">{{__('ui.Violenza')}}: <span class="{{$image->violence}}"></span></p>
                                                    <p class="color-revisor">{{__('ui.Contenuto_ammiccante')}}: <span class="{{$image->racy}}"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <div class="carousel-inner-2">
                                            <div class="carousel-item active">
                                                <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                                            </div>
                                        </div>
                                    @endif
                        </div>          
                    </div>
                    <div class="col-12 d-flex flex-column">
                        <div class="border-1 rounded p-3 mx-2 mt-5 mb-3">
                            <p class="p-0 m-0 color-revisor">{{__('ui.rev_titolo')}}</p>
                            <h5 class="m-0 text-uppercase">{{$announcement_to_check->title}}</h5>
                        </div>
                        <div class="border-1 rounded p-3 m-2">
                            <p class="p-0 m-0 color-revisor">{{__('ui.rev_descrizione')}}</p>
                            <p class="m-0 fs-6 color-revisor">{{$announcement_to_check->description}}</p>
                        </div>
                        <div class="row py-3 px-2 h-100 align-items-end">
                            <div class="col-6">
                                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-acc shadow">{{__('ui.rev_accetta')}}</button>
                                </form>
                            </div>
                            <div class="col-6 text-end">
                                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-rif shadow">{{__('ui.rev_rifiuta')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border-1 bg_lightGray rounded p-2 m-2 mb-3">
                            <p class="m-0 fs-6 text-black">{{__('ui.pubblicato_il')}}{{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- ultimo annuncio revisionato --}}
        <div class="container-fluid p-5 bg-revisor3 shadow rounded my-4">
            <div class="row">
                <div class="col-12 text-light text-center">
                    <h1 class="display-6">
                        {{$announcement_to_reCheck ? __('ui.annuncio_revisionato') : __('ui.non_hai_annunci_revisionati')}}
                    </h1>
                </div>
            </div>
        </div>
        @if($announcement_to_reCheck)
            <div class="container bg-light rounded border-1">
                <div class="row">
                    <div class="col-12 col-lg-6 position-relative">
                              {{-- new one  --}}
                                     <div  id="carouselExampleControls" class="carousel slide  me-2 py-3" data-bs-ride="carousel">
                                                @if ($announcement_to_reCheck->images)
                                            <div class="carousel-inner">
                                                @foreach($announcement_to_reCheck->images as $image)
                                                    <div class="carousel-item @if($loop->first)active @endif text-center">
                                                        <img src="{{$image->getUrl(300,300)}}" width="300" class="img-fluid  p-3 rounded" alt="">
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
                                    <div class="col-12 col-lg-6 d-flex flex-column">
                                        <div class="border-1 rounded p-3 mx-2 mt-5 mb-3">
                                            <p class="p-0 m-0 color-revisor">{{__('ui.rev_titolo')}}</p>
                                            <h5 class="m-0 text-uppercase">{{$announcement_to_reCheck->title}}</h5>
                                        </div>
                                        <div class="border-1 rounded p-3 m-2">
                                            <p class="p-0 m-0 color-revisor">{{__('ui.rev_descrizione')}}</p>
                                            <p class="m-0 fs-6 color-revisor">{{$announcement_to_reCheck->description}}</p>
                                        </div>
                                        <div class="row my-3 px-2 h-100 align-items-end">
                                            <div class="col-12">
                                                <form action="{{route('revisor.undo_announcement', ['announcement'=>$announcement_to_reCheck])}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-ann-2 shadow">{{__('ui.rev_annulla')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="border-1 bg_lightGray rounded p-2 m-2 mb-3 d-flex justify-content-between">
                                            <div>
                                                <p class="m-0 fs-6 text-black">{{__('ui.rev_ultima_modifica')}} {{$announcement_to_reCheck->updated_at->format('d/m/Y')}}</p>
                                            </div>
                                            <div>
                                                @if($announcement_to_reCheck->is_accepted == true)
                                                    <p class="m-0 fs-6 text-success">{{__('ui.rev_annuncio_accettato')}}</p>
                                                @else
                                                    <p class="m-0 fs-6 text-danger">{{__('ui.rev_annuncio_non_accettato')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                </div>
            </div>
            
        @endif
        {{-- storico aninci revisionati --}}
        <div class="container-fluid p-5 bg-revisor3 shadow  rounded my-4">
            <div class="row">
                <div class="col-12 text-light text-center">
                    <h1 class="display-6">
                        {{count($announcement_story) >0 ? __('ui.storico_annunci') : __('ui.non_hai_uno_storico_annunci')}}
                    </h1>
                </div>
            </div>
        </div>
        @if($announcement_story)
            <div class="container bg-light rounded border-1">
                <div class="row">
                    <div class="col-12 position-relative">
                        
                        @foreach($announcement_story as $announcement)
                                @if ($announcement->images)
                        <div class="my-3 row border-1">
                            <div class="p-3 col-3 d-flex align-items-center">
                                <div class="p-5 d-flex flex-column">
                                    <p class="py-1 m-0 color-revisor">ID: </p>
                                    <h5 class="m-0 text-uppercase color-revisor">{{$announcement->id}}</h5>
                                </div>                                
                              
                                <div class="carousel-inner-2 dim_carousel">
                                    @foreach($announcement->images as $image)
                                        <div class="carousel-item @if($loop->first)active @endif">
                                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="p-3 rounded" width="150" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="carousel-inner-2">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/1200/400" class="p-3 rounded" alt="">
                                    </div>
                                </div>
                                @endif                           
                                      
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                     <p class="py-1 m-0 color-revisor">{{__('ui.rev_titolo')}} </p>
                                     <h5 class="m-0 text-uppercase color-revisor">{{$announcement->title}}</h5>
                                </div>
                               <div class="d-flex align-items-center justify-content-end ">
                                <div class="">
                                    <form action="{{route('revisor.undo_announcement', ['announcement'=>$announcement])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-ann-2 shadow">{{__('ui.rev_annulla')}}</button>
                                    </form>
                                </div>
                               </div>
                            </div>
                           
                        <div class="col-12">
                            <div class="border-1 bg_lightGray rounded p-2 m-2 mb-3 d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fs-6 text-black">{{__('ui.rev_ultima_modifica')}} {{$announcement->updated_at->format('d/m/Y')}}</p>
                                </div>
                                <div>
                                    @if($announcement->is_accepted == true)
                                        <p class="m-0 fs-6 text-success">{{__('ui.rev_annuncio_accettato')}}</p>
                                    @else
                                        <p class="m-0 fs-6 text-danger">{{__('ui.rev_annuncio_non_accettato')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            
                <div class="d-flex justify-content-center">
                    <div>
                        {{$announcement_story->links()}}
                    </div>
                </div>
                            {{-- <div class="">
                                @foreach($announcement_story as $announcement)
                                
                                    @foreach ($announcement->images as $image)
                                        <div class="text-center @if($loop->first)active @endif">
                                            <img src="{{$announcement->first()->getUrl(300,300)}}" width="300" class="img-fluid  p-3 rounded" alt="">
                                        </div>
                                    @endforeach
                                    <div class="border rounded p-3 mx-2 mt-5 mb-3">
                                        <p class="p-0 m-0">{{__('ui.rev_titolo')}}</p>
                                        <h5 class="m-0 text-uppercase">{{$announcement->title}}</h5>
                                    </div>
                                @endforeach
                                  
                            </div> --}}
                            
                                     
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="container2">
    <hr class="linea-divisione m-0">
</div>
</x-layout>