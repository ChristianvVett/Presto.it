<footer id="footer">
    <div class="container-fluid container-lg py-5">
        <div class="row">
            <div class="col-12 col-lg-3">
				<a class="footer-brand" href="{{route('home')}}">
                    <img class="logo-footer" src="/media/logo-Presto1-0.png" alt="logo sito">
                </a>
				<p class="f-item-content">{{__('ui.Descrizione')}}</p>
            </div>
            <div class="col-4 col-lg-3">
                <h4 class="py-2 f-title f-follow-title">{{__('ui.Seguiree')}}</h4>
				<div class="social-icons">
					<div class="icon-container">
						<i class="fab fa-facebook-f f-item-content"></i>
					</div>
					<div class="icon-container">
						<i class="fab fa-instagram f-item-content"></i>
					</div>
					<div class="icon-container">
						<i class="fab fa-twitter f-item-content"></i>
					</div>					
				</div>
            </div>
            <div class="col-4 col-lg-3">
                <h4 class="py-2 f-title f-team-title">{{__('ui.Team')}}</h4>
                <ul class="p-0">
                    <li><a class="f-item-content scritte hover-success" href="https://www.linkedin.com/in/lorenzo-lucenti-web-developer/" target="_blank">Lorenzo Lucenti</a></li>
                    <li><a class="f-item-content scritte hover-success" href="https://www.linkedin.com/in/siria-fariello-031342220/" target="_blank">Siria Fariello</a> 
                    </li>
                    <li><a class="f-item-content scritte hover-success" href="https://www.linkedin.com/in/antonio-sacc%C3%A0-web-developer/" target="_blank">Antonio Saccà</a></li>
                    <li><a class="f-item-content scritte hover-success" href="https://www.linkedin.com/in/christian-vettorazzo-fullstackdeveloper/" target="_blank">Christian Vettorazzo</a></li>
                    <li><a class="f-item-content scritte hover-success" href="https://www.linkedin.com/in/stefan-adrian-neagu-01079022b">Stefan Neagu</a></li>
                </ul>
            </div>
            <div class="col-4 col-lg-3">
                <h4 class="py-2 f-title f-links-title">{{__('ui.Link')}}</h4>
                <ul class="p-0">
					<li><a class="f-item-content scritte hover-detail" href="{{route('announcement.index')}}">{{__('ui.Annuncii')}}</a></li>
					<li><a class="f-item-content scritte hover-detail" href="{{route('announcement.create')}}">{{__('ui.Inserisci')}}</a></li>

                    @guest
					<li><a class="f-item-content scritte hover-detail" href="{{route('register')}}">{{__('ui.Registratii')}}</a></li>
					<li><a class="f-item-content scritte hover-detail" href="{{route('login')}}">Login</a></li>
                    @endguest

                    @guest
					<li><a class="f-item-content scritte hover-detail" href="{{ route('register') }}">{{__('ui.Lavoraa')}}</a></li>

                    @else
                        @if (Auth::user()?->is_revisor)
                        <li><a class="f-item-content scritte hover-detail" href="{{ route('revisor.index') }}">{{__('ui.Area_revisore')}}</a></a></li>
                        @else
                        <li><a class="f-item-content scritte hover-detail" href="{{route('become.revisor')}}">{{__('ui.Lavoraa')}}</a></a></li>
                        @endif
                    @endguest

				</ul>
            </div>
        </div>
    </div>
    <div class="copyright-container">
        <hr class="linea-divisione">
        <p class="copyright m-0 pb-3">Copyright&copy; 2023 designed by Web Shapers</p>
    </div>
</footer>