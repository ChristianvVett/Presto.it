<footer>
	<div class="container-lg container-fluid">
		<div class="row">
			<div class="col-6 col-lg-3">
				<a href="{{route('home')}}"><img class="logo" src="/media/logo-Presto1-0.png" alt="logo sito"></a>
				
				<p>{{__('ui.Descrizione')}}</p>
			</div>
			<div class="col-6 col-lg-3 justify-content-start">
				<h4 class="py-2">{{__('ui.Team')}}</h4>
				<ul class="p-0">
					<li><a class="scritte" href="https://www.linkedin.com/in/lorenzo-lucenti-web- 
					developer/">Lorenzo</a></li>
					<li><a class="scritte" href="https://www.linkedin.com/in/siria-fariello-031342220/">Siria</a> 
					</li>
					<li><a class="scritte" href="https://www.linkedin.com/in/antonio-sacc%C3%A0-web- 
					developer/">Antonio</a></li>
					<li><a class="scritte" href="https://www.linkedin.com/in/christian-vettorazzo- 
					fullstackdeveloper/">Christian</a></li>
					<li><a class="scritte" href="https://www.linkedin.com/in/stefan-adrian-neagu-01079022b">Stefan</a></li>
	
				</ul>
	
			</div>
			<div class="col-6 col-lg-3">
				<h3>{{__('ui.Link')}}</h3>
				<ul class="p-0">
					<li><a class="scritte" href="{{route('announcement.index')}}">{{__('ui.Annuncii')}}</a></li>
					<li><a class="scritte" href="{{route('announcement.create')}}">{{__('ui.Inserisci')}}</a></li>
					<li><a class="scritte" href="{{route('register')}}">{{__('ui.Registratii')}}</a></li>
					<li><a class="scritte" href="{{route('login')}}">Login</a></li>
					<h3><a href="" class="lavora">{{__('ui.Lavoraa')}}</a></h3>
				</ul>
			</div>
			<div class="col-6 col-lg-3">
				<h3>Newsletter</h3>
				<form class="inseremail">
					<input type="email" placeholder="{{__('ui.placeholder_mail')}}">
					<button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
				</form>
				<div class="social-icons d-flex justify-content-start">
					<div class="icons-container">
						<i class="fab fa-facebook-f"></i>
					</div>
					<div class="icons-container">
						<i class="fab fa-instagram"></i>
					</div>
					<div class="icons-container">
						<i class="fab fa-twitter"></i>
					</div>					
				</div>
			</div>
		</div>
	<hr class="linea-divisione">
	<p class="copyright m-0">Copyright&copy; 2023 designed by <span>Web Shapers</span></p>
	</div>
</footer>