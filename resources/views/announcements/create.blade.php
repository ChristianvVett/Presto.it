<x-layout>

<section>
@if (session()->has('insert_message'))
    <div class="message-container">
        <p class="create-success-message">
            {{ session('insert_message') }}
        </p>
    </div>
@endif

@if (session()->has('message'))
<div class="message-container">
<p class="create-success-message">
    {{ session('message') }}
</p>
</div>
@endif 


<div class="bg-back">
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="col-12 d-flex flex-column col-lg-6 col-xl-5">
                <section>
                    <div class="container d-flex">
                        <div class="button-buy mt-4">
                            <a class="" href="{{ route('home') }}"><i class="bi bi-arrow-left w-25 p-3 buttons-page"></i></a>
                        </div>
                    </div>
                </section>
                <h1 class="fw-semibold left-red ps-4 my-4 title2">{{__('ui.inserisci_nuovo_annuncio')}}</h1>
                
                {{-- <div class="my-4">
                </div>
                <div class="my-4">
                </div> --}}
                <div class="my-4 mt-auto testo4">
                    <p class="lead fw-lighter">{{__('ui.testo_nuovo_annuncio')}}</p>  
                </div>
            </div>
            
            <livewire:create-announcement />
        </div>
    </div>
</div>
<div class="container-fluid bg-grey pt-5">
    <div class="row justify-content-around m-0">
        <h2 class="text-center text-1 text-fw-bold text-decoration-underline p-5">{{__('ui.Scegli_noi')}}</h2>
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
        <div class="col-12 col-md-2 my-3 mb-5">
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