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
										<!--<li class="active">{{$dir}}</li>-->
										<li class="active">{{trans('main.customer')}}</li>
									@endif
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<!--<h1>{{$title}}</h1>-->
								<h1>{{trans('main.customer')}}</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<!--<h2>Customers</h2>-->

					<!--<ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
						<li data-option-value="*" class="active"><a href="#">Show All</a></li>
						@foreach ($categories as $key => $cat)
						<li data-option-value=".{{ $cat->name}}"><a href="#">{{ $cat->name}}</a></li>
						@endforeach
					</ul>-->
					
					<ul class="nav nav-pills sort-source" data-sort-id="team" data-option-key="filter" style="display:none;">
						<li data-option-value="*" class="active"><a href="#">Show All</a></li>
						<!--@foreach ($categories as $key => $cat)
						<li data-option-value=".{{ str_replace(' ', '', $cat->name)}}"><a href="#">{{ $cat->name }}</a></li>
						@endforeach-->
					</ul>					

					<!--<hr class="tall">-->

					<!--<div class="row">-->

						<div class="sort-destination-loader sort-destination-loader-showing">
							<ul class="team-list sort-destination" data-sort-id="team">
								@foreach ($customers as $key => $cust)
								<li class="col-md-3 col-sm-6 col-xs-12 isotope-item {{ str_replace(' ', '', $cust->categorie) }}">
									<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
										<span class="thumb-info-wrapper">
											<a href="#">
												<img src="{{ url('images/customer/'.$cust->file) }}" alt="" width="220px" height="220px">
												
											</a>
										</span>
										<span class="thumb-info-caption">
											<span class="thumb-info-social-icons">
												<center>
													<span style="font-size:15px;font-weight:bold;color:#000000;text-align:center;">{{ $cust->customer }}</span>
												</center>
											</span>
										</span>
									</span>
								</li>
								@endforeach
							</ul>
						</div>

					</div>

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
											<button class="btn btn-default" id="enviar_mail" type="button">{{ trans($metas['newsletter-button']) }}</button>
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
							<div class="contact-details" style="margin-top: -24px;">
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

