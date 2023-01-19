<x-layout>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="bg_img_register dimension_back">
        <div class="row">
        <div class="d-none col-lg-6 d-lg-block align-self-start p-3">
        {{-- <img src="/media/regLog.png" width="350" alt=""  > --}}
        </div>   
        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
            <div class="form-container " aria-describedby="formHelp">        
            <form method="POST" action="{{ route('register') }}" class="form mt-5 p-lg-5">
                @csrf
                <h2 class="form-title">{{__('ui.registrati')}}</h2>
                <div class="mb-3 input-container">
                    <label for="inputName" class="form-label">{{__('ui.nome')}}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName"
                        placeholder="{{__('ui.placeholder_nome')}}">
                    @error('name') <span class="error text-danger">{{ __('message.name') }}</span> @enderror
                </div>
                <div class="mb-3 input-container">
                    <label for="inputEmail" class="form-label">{{__('ui.indirizzo_mail')}}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                        placeholder="{{__('ui.placeholder_mail')}}">
                    @error('email') <span class="error text-danger">{{ __('message.email') }}</span> @enderror
                </div>
                <div class="mb-3 input-container">
                    <label for="inputPassword" class="form-label">{{__('ui.password')}}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                        placeholder="{{__('ui.placeholder_password')}}">
                    @error('password') <span class="error text-danger">{{ __('message.password') }}</span> @enderror
                </div>
                <div class="mb-3 input-container">
                    <label for="inputPasswordConfirm" class="form-label">{{__('ui.conf_pass')}}</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPasswordConfirm"
                        placeholder="{{__('ui.placeholder_conf_pass')}}">
                    @error('password') <span class="error text-danger">{{ __('message.password_confirmation') }}</span> @enderror
                </div>
                {{-- <div class="mb-3 form-check input-container">
                    <input type="checkbox" class="form-check-input" id="ricordami">
                    <label class="form-check-label" for="ricordami">{{__('ui.ricordami')}}</label>
                </div> --}}
                <div class="mb-3 input-container" aria-describedby="formLoginRedirect">
                    <button type="submit" class="btn btn-primary btn-register">{{__('ui.registrati')}}</button>
                    <div id="formLoginRedirect" class="form-text">{{__('ui.messaggio_registrato')}} <a href="{{ route('login') }}"
                            class="login-redirect">{{__('ui.accedi')}}</a></div>
                </div>
                <div id="formHelp" class="form-text">{{__('ui.messaggio_privacy')}}</div>
            </form>
        </div>
        </div>
    </div>
    </div>
</x-layout>