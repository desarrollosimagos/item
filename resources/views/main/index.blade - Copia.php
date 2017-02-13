@extends('appindex')


@section('site_favicon')
		<link rel="shortcut icon" href="{{ url('images/site/'.$image_sites['site-favicon']) }}">
		<link rel="apple-touch-icon" href="{{ url('images/site/'.$image_sites['site-apple-touch']) }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ url('images/site/'.$image_sites['site-apple-touch-72x72']) }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ url('images/site/'.$image_sites['site-apple-touch-114x114']) }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ url('images/site/'.$image_sites['site-apple-touch-144x144']) }}">
@endsection


@section('title_site')
	<title>{{ $metas['site-title'] }}</title>
@endsection

@section('logo_site')
						<a href="index">
							<img alt="Porto" src="{{ url('images/site/'.$image_sites['logo-header']) }}">
						</a>			
@endsection						

@section('top_menu')

						<ul class="nav nav-pills nav-top">
							<li><a href="{{ url('lang', ['en']) }}">En</a></li>
							<li><a href="{{ url('lang', ['es']) }}">Es</a></li>
							<li><a href="{{ url('lang', ['pt']) }}">Pt</a></li>
						</ul>
@endsection

@section('social_menu')
						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/{{ trans($metas['facebook-url']) }}" target="_blank" title="Facebook">Facebook</a></li>
							<li class="twitter"><a href="http://www.twitter.com/{{ trans($metas['twitter-url']) }}" target="_blank" title="Twitter">Twitter</a></li>
							<li class="linkedin"><a href="http://www.linkedin.com/{{ trans($metas['linkedin-url']) }}" target="_blank" title="Linkedin">Linkedin</a></li>
						</ul>
@endsection

@section('main_menu')
						<ul class="nav nav-pills nav-main" id="mainMenu">
							@foreach ($main_menu as $key => $lnk)
								@if ($lnk->route == $page)
									<li class="dropdown active">
								@else
									<li class="dropdown">
								@endif
									<a href="{{ $lnk->route }}">{{ trans($lnk->label) }} </a>
									@if (isset($submenu[$lnk->id]))
										<ul class="dropdown-menu">
											@foreach ($submenu as $key => $sub)
												<li><a href="{{ $sub['route'] }}">{{ trans($sub['label']) }}</a></li>
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>
@endsection



@section('content')
				<div id="content" class="content full">
					@foreach ($content as $key => $cont)
						{!! $cont->content !!}
					@endforeach
				</div>
@endsection

@section('footer_title')
							<span>{{ trans($metas['foorte-title']) }}</span>
@endsection


@section('footer_panel_one')
							<h4>{{ trans($metas['newsletter-title']) }}</h4>
							<p>{{ trans($metas['newsletter-description']) }}</p>

							<div class="alert alert-success hidden" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>

							<div class="alert alert-error hidden" id="newsletterError"></div>

							<form class="form-inline" id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
								<div class="control-group">
									<div class="input-append">
										<input class="span2" placeholder="{{ trans($metas['newsletter-email']) }}" name="email" id="email" type="text">
										<button class="btn" type="submit">{{ trans($metas['newsletter-button']) }}</button>
									</div>
								</div>
							</form>	
@endsection

@section('footer_panel_two')
							<h4>Latest Tweet</h4>
							<div id="tweet" class="twitter">
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
									<li class="facebook"><a href="http://www.facebook.com/{{ trans($metas['facebook-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/{{ trans($metas['twitter-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="linkedin"><a href="http://www.linkedin.com/{{ trans($metas['linkedin-url']) }}" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>	
@endsection


@section('footer_copyright')
						<div class="row">
							<div class="span1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" src="{{ url('images/site/'.$image_sites['logo-footer']) }}">
								</a>
							</div>
							<div class="span7">
								<p>{{ trans($metas['copy-rigth']) }}</p>
							</div>
							<!--<div class="span4">
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

