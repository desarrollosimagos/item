@extends('app_portafolio')


@section('site_favicon')
		<link rel="shortcut icon" href="{{ url('images/site/'.$image_sites['site-favicon']) }}" type="image/x-icon">
		<link rel="apple-touch-icon" href="{{ url('images/site/'.$image_sites['site-apple-touch']) }}">
@endsection


@section('title_site')
	<title>{{ $metas['site-title'] }}</title>
@endsection

@section('logo_site')
						<a href="/index">
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
									<a href="/{{ $lnk->route }}">{{ trans($lnk->label) }} </a>
									@if (isset($submenu[$lnk->id]))
										<ul class="dropdown-menu">
											@foreach ($submenu[$lnk->id] as $key => $sub)
												<li class="dropdown-submenu"><a href="/{{ $sub['route'] }}">{{ trans($sub['label']) }}</a></li>
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>
@endsection

@section('content')
				<section class="page-header">
					<div class="container" style="margin-top: -24px;">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="index">{{ trans($metas['home-dir-title']) }}</a></li>
									@if ($dir <> "")
										<li><a href="/portofolio">{{$dir}}</a></li>
										<li class="active">{{$portofolios->title}}</li>
									@endif
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1>{{$portofolios->title}}</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<div class="portfolio-title">
								<div class="row">
									<div class="portfolio-nav-all col-md-1">
										<a href="/portofolio" data-tooltip data-original-title="Back to list"><i class="fa fa-th"></i></a>
									</div>
									<div class="col-md-10 center">
										<h2 class="mb-none">{{ $portofolios->title }}</h2>
									</div>
									<div class="portfolio-nav col-md-1">
										@if ($next != NULL)
										<a href="/portofolio/{{ $next->id }}" class="portfolio-nav-prev" data-tooltip data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
										@endif
										@if ($prev != NULL)
										<a href="/portofolio/{{ $prev->id }}" class="portfolio-nav-next" data-tooltip data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
										@endif
									</div>
								</div>
							</div>

							<hr class="tall">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme show-nav-hover mt-none" id="imagen_porto" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'animateOut': 'fadeOut'}">
							<!--<div data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'animateOut': 'fadeOut'}">-->
								@foreach ($image_portofolio as $key => $image)
								<div>
									<span class="img-thumbnail">
										<img alt="" class="img-responsive" src="{{ url('images/images/'.$image->file) }}">
									</span>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					
					<div class="row"> 
						<div class="col-md-12">
							<div class="portfolio-info pull-left"> 
								<div class="row">
									<div class="col-md-12 center"> 
										<ul> <li> <i class="fa fa-calendar"></i> {{ $portofolios->date }} </li> <li> <i class="fa fa-tags"></i>
										@foreach ($categories as $key => $cat)
											@if ($cat->id == $portofolios->categorie_id)
											{{$cat->name}}
											@endif
										@endforeach
										</ul> 
									</div> 
								</div> 
							</div>
						</div> 
					</div>
					
					<div class="row"> 
						<div class="col-md-7">
							@foreach ($meta_portofolio as $key => $meta)
								@if ($meta->value != NULL)
									@if ($meta->group == 'meta.view')
										<h5 class="mt-lg mb-sm">
										<!--@foreach(explode('.', $meta->name) as $name)
											@if ($name != 'main')
												{{$name}}
											@endif
										@endforeach-->
										{{trans($meta->name)}}
										</h5>
										<p class="mt-none mb-xlg">
										{{$meta->value}} 
										</p>
									@endif
								@endif
							@endforeach
							
							<div class="row mb-xlg">
								<div class="counters counters-sm">
									<!--<h5 class="mt-lg mb-sm">
									{{trans('portafolio.figures')}}
									</h5>-->
									@foreach ($meta_portofolio as $key => $meta)
										@if ($meta->value != NULL)
											@if ($meta->group == 'meta.view.number')
												<div class="col-md-3 col-sm-6">
													<div class="counter">
														<strong data-to="
														@foreach(explode(' ', $meta->value) as $key => $value)
															@if ($key == 0)
																{{$value}}
															@endif
														@endforeach
														">0</strong>
														<label>
														<!--@foreach(explode('.', $meta->name) as $name)
															@if ($name != 'main')
																{{$name}}
															@endif
														@endforeach-->
														{{trans($meta->name)}}
														</label>
													</div>
												</div>
											@endif
										@endif
									@endforeach
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5">
							@foreach ($meta_portofolio as $key => $meta)
								@if ($meta->value != NULL)
									@if ($meta->group == 'meta.view.right')
									<ul class="portfolio-details mt-none mb-xl"> 
										<li> 
											<h5 class="mt-lg mb-sm">
											<!--@foreach(explode('.', $meta->name) as $name)
												@if ($name != 'main')
													{{$name}}
												@endif
											@endforeach-->
											{{trans($meta->name)}}
											</h5>
											<p>{{$meta->value}}</p>
										</li> 
									</ul>
									@endif
								@endif
							@endforeach
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
							<div class="contact-details">
								<h4>{!! trans($metas['contact-title']) !!}</h4>
								<ul class="contact">
									<li><p><i class="icon-map"></i> 
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
							<h4>{{ trans($metas['social-title']) }}</h4>
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

