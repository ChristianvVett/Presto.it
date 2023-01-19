<x-layout>
<section>
    @if (session()->has('message_edit'))
        <div class="message-container">
            <p class="create-success-message">
                {{ session('message_edit') }}
            </p>
        </div>
    @endif 
<div class="bg-revisor">
    <div class="container py-5">
        <div class="container-fluid p-5 bg-revisor3 shadow rounded mb-4">
            <div class="row">
                <div class="col-12 text-light text-center">
                    <h1 class="display-6">
                        {{count($user_announcements_reject) >0 ? __('ui.ann_rifiut') : __('ui.no_ann_rifiut')}}
                    </h1>
                </div>
            </div>
        </div>
    @if($user_announcements_reject)
    <div class="container bg-light rounded bg-user2">
        <div class="row">
                    <div class="col-12 position-relative ">                         
                            @foreach($user_announcements_reject as $user_announcement)
                            @if ($user_announcement->images)
                            <div class="border-1 my-3 row">
                                <div class="p-3 col-3 d-flex align-items-center">
                                    <div class="p-5 d-flex flex-column">
                                        <p class="py-1 m-0 color-revisor">ID: </p>
                                        <h5 class="m-0 text-uppercase color-revisor">{{$user_announcement->id}}</h5>
                                    </div>  
                                    <div class="carousel-inner-2 dim_carousel">
                                        @foreach($user_announcement->images as $image)
                                            <div class="carousel-item @if($loop->first)active @endif">
                                                <img src="{{!$user_announcement->images()->get()->isEmpty() ? $user_announcement->images()->first()->getUrl(300, 300):'https://picsum.photos/200'}}" class="img-fluid p-3 rounded" width="150" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/1200/400" class="img-fluid p-3 rounded" alt="">
                                        </div>
                                    </div>
                                    @endif
                                    
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <p class="py-1 m-0 color-revisor">{{__('ui.rev_titolo')}} </p>
                                        <h5 class="m-0 text-uppercase color-revisor">{{$user_announcement->title}}</h5>
                                    </div>
                                <div class="d-flex align-items-center justify-content-end ">
                                    <div class="p-1">
                                        <a href="{{route('userPage.edit_announcement', compact('user_announcement'))}}" class="btn btn-success shadow" >{{__('ui.modificaa')}}</a>  
                                    </div>
                                    <div class="p-1">
                                        <form method="POST" action="{{route('userPage.delete_announcement', compact('user_announcement'))}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger mx-2">{{__('ui.cancella')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border-1 bg_lightGray rounded p-2 m-2 mb-3 d-flex justify-content-between">
                                    <div>
                                        <p class="m-0 fs-6 text-dark">{{__('ui.rev_ultima_modifica')}} {{$user_announcement->updated_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div>
                                        @if($user_announcement->is_accepted == true)
                                            <p class="m-0 fs-6 text-success">{{__('ui.rev_annuncio_accettato')}}</p>
                                        @else
                                            <p class="m-0 fs-6 text-danger">{{__('ui.rev_annuncio_non_accettato')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach               
                    {{-- <div class="d-flex justify-content-center">
                    //     <div>
                    //         {{$announcement_story->links()}}
                    //     </div>
                    // </div> --}}        
    @endif
    </div>
    </div>
    </div>
</div>
</div>
<div class="container2">
    <hr class="linea-divisione m-0">
</div>
</x-layout>