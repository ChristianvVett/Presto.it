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
<div class="bg_img_login dimension_back">
    <div class="row h-100">
        <div class="col-12 col-lg-6">
            <div class="form-container pt-5" aria-describedby="formHelp">
                <form method="POST" action="{{ route('login') }}" class="form mt-5 p-lg-5">
                    @csrf
                    <h2 class="form-title">{{__('ui.accedi')}}</h2>
                    <div class="mb-3 input-container">
                        <label for="inputEmail" class="form-label">{{__('ui.indirizzo_mail')}}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                            placeholder="{{__('ui.placeholder_mail')}}">
                        @error('email') <span class="error text-danger">{{ $message}}</span> @enderror
                    </div>
                    <div class="mb-3 input-container">
                        <label for="inputPassword" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                            placeholder="{{__('ui.placeholder_password')}}">
                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 form-check input-container">
                        <input name="remember" type="checkbox" class="form-check-input" id="rememberCheck">
                        <label class="form-check-label" for="rememberCheck">{{__('ui.ricordami')}}</label>
                    </div>
                    <div class="mb-3 input-container" aria-describedby="formRegisterRedirect">
                        <button type="submit" class="btn btn-primary btn-login">{{__('ui.accedi')}}</button>
                        <div    id="formRegisterRedirect" class="form-text">{{__('ui.messaggio_non_registrato')}} <a
                                href="{{ route('register') }}" class="register-redirect">{{__('ui.registrati')}}</a>
                        </div>
                    </div>
                    <div id="formHelp" class="form-text">{{__('ui.messaggio_privacy')}}</div>
                </form>
            </div>
            <div class="d-none col-lg-6 d-lg-block align-self-start p-3">
                {{-- <img src="/media/regLog.png" width="350" alt=""  > --}}
            </div>  
        </div>
    </div>
</x-layout>
