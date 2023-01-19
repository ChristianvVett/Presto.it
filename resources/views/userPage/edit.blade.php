<x-layout>
   
    <div class="bg-back">
        <div class="container">
            <div class="row justify-content-center h-100">
                <div class="col-12 d-flex flex-column col-lg-6 col-xl-5">
                    <div class="d-flex align-item-end m-5">
                        <button class="btn-back text-end d-flex">
                            <a href="{{route('userPage.index')}}" class="btn btn-color-text">{{__('ui.btn_indietro')}}</a>
                        </button>
                    </div> 
                    <h1 class="fw-semibold left-red ps-4 my-4 title2">{{__('ui.inserisci_nuovo_annuncio')}}</h1>
                    <div class="my-4 mt-auto testo4">
                        <p class="lead fw-lighter">{{__('ui.testo_nuovo_annuncio')}}</p>  
                    </div>
                </div>
                
                <livewire:edit-announcement announcementId="{{$user_announcement->id}}"/>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-grey pt-5">
        <div class="row justify-content-around m-0">
            <h2 class="text-center text-1 text-fw-bold text-decoration-underline">{{__('ui.Scegli_noi')}}</h2>
            <div class="col-12 col-md-2 my-3">
                <i class="bi bi-check-circle d-flex justify-content-center text-1"></i>
                <h5 class="text-center fw-lighter text-1">{{__('ui.pochi_semplici')}}</h5>
            </div>
            <div class="col-12 col-md-2 my-3">
                <i class="bi bi-check-circle d-flex justify-content-center text-1"></i>
                <h5 class="text-center fw-lighter text-1">{{__('ui.pieno_controllo')}}</h5>
            </div>
            <div class="col-12 col-md-2 my-3">
                <i class="bi bi-check-circle d-flex justify-content-center text-1"></i>
                <h5 class="text-center fw-lighter text-1">{{__('ui.paypal')}}</h5>
            </div>
            <div class="col-12 col-md-2 my-3">
                <i class="bi bi-check-circle d-flex justify-content-center text-1"></i>
                <h5 class="text-center fw-lighter text-1">{{__('ui.cancellazione')}}</h5>
            </div>
            
            
        </div>
    </div>
    <div class="container2">
        <hr class="linea-divisione m-0">
    </div>
    </section>
    
    </x-layout>