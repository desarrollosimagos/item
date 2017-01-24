@extends('app')


@section('top_menu')

						<ul class="nav nav-pills nav-top">
							<li>
								<a href="about-us.html"><i class="icon-angle-right"></i>About Us</a>
							</li>
							<li>
								<a href="contact-us.html"><i class="icon-angle-right"></i>Contact Us</a>
							</li>
							<li class="phone">
								<span><i class="icon-phone"></i>(123) 456-7890</span>
							</li>
						</ul>
@endsection

@section('social_menu')

						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
							<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
							<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
						</ul>
@endsection

@section('main_menu')
						<ul class="nav nav-pills nav-main" id="mainMenu">
							@foreach ($main_menu as $key => $lnk)
								@if ($lnk->route == $dir )
								<li class="dropdown active">
									<a href="{{ $lnk->route }}">{{ $lnk->label }}</a>
								</li>
								@else
								<li>
									<a href="{{ $lnk->route }}">{{ $lnk->label }}</a>
								</li>
								@endif
							@endforeach
						</ul>
@endsection


@section('title')
					<div class="container">
						<div class="row">
							<div class="span12">
								<ul class="breadcrumb">
									<li><a href="index">Inicio</a> <span class="divider">/</span></li>
									@if ($dir <> "")
									<li class="active">{{$dir}}</li>
									@endif
									
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="span12">
								<h2>{{$title}}</h2>
							</div>
						</div>
					</div>

@endsection

@section('content')
				<div class="container">
  					@foreach ($content as $key => $cont)
						{!! $cont->content !!}
					@endforeach
				</div>
@endsection

@section('footer_title')
							<span>Get in Touch</span>
@endsection


@section('footer_panel_one')
							<h4>Newsletter</h4>
							<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

							<div class="alert alert-success hidden" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>

							<div class="alert alert-error hidden" id="newsletterError"></div>

							<form class="form-inline" id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
								<div class="control-group">
									<div class="input-append">
										<input class="span2" placeholder="Email Address" name="email" id="email" type="text">
										<button class="btn" type="submit">Go!</button>
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
								<h4>Get in touch</h4>
								<ul class="contact">
									<li><p><i class="icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
									<li><p><i class="icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
									<li><p><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
								</ul>
							</div>	
@endsection

@section('footer_panel_four')
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>	
@endsection


@section('footer_copyright')
						<div class="row">
							<div class="span1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" src="img/logo-footer.png">
								</a>
							</div>
							<div class="span7">
								<p>© Copyright 2013 by Crivos. All Rights Reserved.</p>
							</div>
							<div class="span4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
@endsection

