
@extends('app')


@section('site_favicon')
		<link rel="shortcut icon" href="{{ url('images/site/'.$image_sites['site-favicon']) }}" type="image/x-icon">
		<link rel="apple-touch-icon" href="{{ url('images/site/'.$image_sites['site-apple-touch']) }}">
@endsection


@section('title_site')
	<title>{{ $metas['site-title'] }}</title>
@endsection

@section('logo_site')
						<a href="index">
							<img alt="Porto" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="{{ url('images/site/'.$image_sites['logo-header']) }}">
						</a>			
@endsection						

@section('top_menu')

						<ul class="nav nav-pills">
							<li class="hidden-xs"><a href="{{ url('lang/lang', ['en']) }}">En</a></li>
							<li class="hidden-xs"><a href="{{ url('lang/lang', ['es']) }}">Es</a></li>
							<li class="hidden-xs"><a href="{{ url('lang/lang', ['pt']) }}">Pt</a></li>
						</ul>
@endsection

@section('social_menu')
						<ul class="header-social-icons social-icons hidden-xs">
							<li class="social-icons-facebook"><a href="http://www.facebook.com/{{ trans($metas['facebook-url']) }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li class="social-icons-twitter"><a href="http://www.twitter.com/{{ trans($metas['twitter-url']) }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li class="social-icons-linkedin"><a href="http://www.linkedin.com/{{ trans($metas['linkedin-url']) }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
@endsection

@section('main_menu')
					
						<ul class="nav nav-pills" id="mainNav">
							@foreach ($main_menu as $key => $lnk)
								@if ($lnk->route == $page)
									<li class="dropdown active">
								@else
									<li class="dropdown">
								@endif
									<a href="{{ $lnk->route }}">{{ trans($lnk->label) }} </a>
									@if (isset($submenu[$lnk->id]))
										<ul class="dropdown-menu">
											@foreach ($submenu[$lnk->id] as $key => $sub)
												<li class="dropdown-submenu"><a href="{{ $sub['route'] }}">{{ trans($sub['label']) }}</a></li>
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>
@endsection

@section('content')
				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="index">Inicio</a></li>
									@if ($dir <> "")
										<li class="active">{{$dir}}</li>
									@endif
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1>{{$title}}</h1>
							</div>
						</div>
					</div>
				</section>
				
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf3FfC2Rom3vr-0LFIl9HF8cXIuX6R3Ws"></script>
				<script>
					
					$("#googlemaps").gMap({
						controls: {
							draggable: (($.browser.mobile) ? false : true),
							panControl: true,
							zoomControl: true,
							mapTypeControl: true,
							scaleControl: true,
							streetViewControl: true,
							overviewMapControl: true
						},
						scrollwheel: false,
						latitude: -8.909972,
						longitude: 13.197806,
						zoom: 4
					});
				</script>

				<div id="googlemaps" class="google-map hidden-phone" style="position: relative; overflow: hidden;"></div>

				<div class="row">
					<div class="col-md-6">

						<div class="alert alert-success hidden mt-lg" id="contactSuccess">
							<strong>Success!</strong> Your message has been sent to us.
						</div>

						<div class="alert alert-danger hidden mt-lg" id="contactError">
							<strong>Error!</strong> There was an error sending your message.
							<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
						</div>

						<h2 class="mb-sm mt-sm"><strong>Contact</strong> Us</h2>
						<form id="contactForm" action="php/contact-form.php" method="POST">
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>O seu nome *</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
									</div>
									<div class="col-md-6">
										<label>O seu e-mail *</label>
										<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Assunto</label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>A sua mensagem *</label>
										<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
								</div>
							</div>
						</form>
					</div>
					
					<div class="col-md-6">

						<div class="box-content">
							<img class="lightbox-false" alt="" title="" src="http://itemao.com/web/wp-content/uploads/2014/05/1786681.png" style="width:300px;height:200px;">
							<h4>Sede Luanda-Angola</h4>
						</div>

						<hr>

						<h4 class="heading-primary">The <strong>Office</strong></h4>
						<ul class="list list-icons list-icons-style-3 mt-xlg">
							<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> Condomínio Mirantes do Talatona - Casa D20 – Talatona | Luanda – Angola</li>
							<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (+244) 222 019 224</li>
							<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">atendimento@itemao.com</a></li>
						</ul>

						<hr>

					</div>
					
					<section class="call-to-action call-to-action-default with-button-arrow call-to-action-in-footer text-center">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div>
										<h3>Para trabalhar conosco, <strong>clique aquí</strong></h3>
									</div>
								</div>
								<br>
								<div class="col-md-12">
									<div>
										<a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="btn btn-lg btn-primary">Trabalhe connosco</a>
									</div>
								</div>
							</div>
						</div>
					</section>

				</div>

@endsection

@section('footer_title')
							<span>{{ trans($metas['foorte-title']) }}</span>
@endsection


@section('footer_panel_one')
						<div class="newsletter">
								<h4>{{ trans($metas['newsletter-title']) }}</h4>
								<p>{{ trans($metas['newsletter-description']) }}</p>
			
								<div class="alert alert-success hidden" id="newsletterSuccess">
									<strong>Success!</strong> You've been added to our email list.
								</div>
			
								<div class="alert alert-danger hidden" id="newsletterError"></div>
			
								<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
									<div class="input-group">
										<input class="form-control" placeholder="{{ trans($metas['newsletter-email']) }}" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">{{ trans($metas['newsletter-button']) }}</button>
										</span>
									</div>
								</form>
							</div>
@endsection

@section('footer_panel_two')
							<h4>Latest Tweets</h4>
							<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
								<p>Please wait...</p>
							</div>		
@endsection

@section('footer_panel_tree')
							<div class="contact-details">
								<h4>{!! trans($metas['contact-title']) !!}</h4>
								<ul class="contact">
									<li><p><i class="icon-map-marker"></i> 
									{!! trans($metas['contact-field-one']) !!}
									</li>
									<li><p><i class="icon-phone"></i> 
									{!! trans($metas['contact-field-two']) !!}
									</li>
									<li><p><i class="icon-envelope"></i> 
									{!! trans($metas['contact-field-tree']) !!}
									</li>
								</ul>
							</div>	
@endsection

@section('footer_panel_four')
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/{{ trans($metas['facebook-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/{{ trans($metas['twitter-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/{{ trans($metas['linkedin-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>	
@endsection


@section('footer_copyright')
						<div class="row">
							<div class="col-md-1">
								<a href="index.html" class="logo">
									<img alt="site" class="img-responsive" src="{{ url('images/site/'.$image_sites['logo-footer']) }}">
								</a>
							</div>
							<div class="col-md-7">
								<p>{{ trans($metas['copy-rigth']) }}</p>
							</div>
							<!--<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>-->
						</div>
@endsection


