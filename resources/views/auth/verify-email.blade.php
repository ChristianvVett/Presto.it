<x-layout title="Verify Email | Dave_the_Dev">
    <div class="welcome container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 welcome-container">
                <div class="welcome-img-container">
                    <img class="welcome-img" src="/media/astronaut-work-with-us-transformed.jpeg" alt="">
                </div>
                <p class="welcome-txt txt-success">{{__('ui.grazie_per')}}🚀</p>
                <p class="">{{__('ui.Prima_di_cominciare')}}</p>
                @if (session('status') == 'verification-link-sent')
                <div class="message-container">
                    <p class="create-success-message">
                        {{__('ui.abbiamo_inviato')}}
                    </p>
                </div>
                    </div>
                @endif
            </div>
            <form class="d-flex justify-content-center align-items-center flex-column" method="POST" action="{{route('verification.send')}}">
                @csrf
                <button class="show-announcement-btn bg-detail" type="submit" >{{__('ui.email_di_verifica')}}</button>
            </form> 
            <form class="d-flex justify-content-center align-items-center flex-column" method="POST" action="{{route('logout')}}">
                @csrf
                <p class="stile_mail4 pt-3">{{__('ui.riscontrando')}}</p>
                <button class="show-announcement-btn bg-cancel">Logout</button>
            </form>
        </div>        
    </div>
</x-layout>
{{-- <x-layout> --}}
{{--         <div class="row">
            <div class="col-12 col-lg-6 welcome-container">
                @if (session('status') == 'verification-link-sent')
                <div class="message-container">
                    <p class="create-success-message">
                        {{__('ui.abbiamo_inviato')}}
                    </p>
                </div>
                    </div>
                @endif
                <form method="POST" action="{{route('verification.send')}}">
                    @csrf
                    <button class="btn btn-dark btn-lg btn-block" type="submit" >{{__('ui.email_di_verifica')}}</button>
                </form> 
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <p class="stile_mail4 pt-3">{{__('ui.riscontrando')}}</p>
                    <button class="btn btn-outline-dark btn-lg btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div> --}}
{{-- 
<div class="bg-revisor">
    <div class="d-flex container-fluid style_mail"></div>
    <div class="container p-5 stile_mail2">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="lc-block mb-5">
                    <div class="pt-5">
                        <h2 class="display-5 text-uppercase d-inline">
                            {{__('ui.grazie_per')}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <p class="stile_mail3">{{__('ui.Prima_di_cominciare')}}</p>
                @if (session('status') == 'verification-link-sent')
                    <div class="my-4 allert allert-success">
                       {{__('ui.abbiamo_inviato')}}
                    </div>
                @endif

                <form method="POST" action="{{route('verification.send')}}">
                    @csrf
                    <button class="btn btn-dark btn-lg btn-block" type="submit" >{{__('ui.email_di_verifica')}}</button>
                </form> 
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <p class="stile_mail4 pt-3">{{__('ui.riscontrando')}}</p>
                    <button class="btn btn-outline-dark btn-lg btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container2">
    <hr class="linea-divisione m-0">
</div>
</x-layout> --}}