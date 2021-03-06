<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		@yield('title_site')

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		@yield('site_favicon')
		

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- csrf-token Metas -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/css/theme.css">
		<link rel="stylesheet" href="/css/theme-elements.css">
		<link rel="stylesheet" href="/css/theme-blog.css">
		<link rel="stylesheet" href="/css/theme-shop.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/css/custom.css">

		<!-- Head Libs -->
		<script src="/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>
		<div class="body">
			<header id="header" >
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									@yield('logo_site')
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<div class="header-search hidden-xs">
										<form id="searchForm" action="/find_portofolios" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" id="q" placeholder="{{ trans('main.searcher') }}" required>
												<span class="input-group-btn">
													<button class="btn btn-default" id="buscar" type="button"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</form>
									</div>
									<nav class="header-nav-top">
										<ul class="nav nav-pills">
											@foreach ($languages as $key => $lan)
												<li class="hidden-xs"><a href="{{ url('lang/lang', [$lan->cod]) }}">{{ $lan->cod }}</a></li>
											@endforeach
										</ul>
									</nav>
								</div>
								<div class="header-row">
									<div class="header-nav">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<!--
										@yield('social_menu')
										-->
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul id="mainNav" class="nav nav-pills">
													<li class="dropdown">
														<a href="/">{{ trans('main.item') }} </a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu">
																<a href="{{ url('empresa') }}">{{ trans('main.empresa') }} </a>
															</li>
															<li class="dropdown-submenu">
																<a href="{{ url('filosofia-da-empresa') }}">{{ trans('main.filosofia-da-empresa') }} </a>
															</li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="{{ url('services') }}">{{ trans('main.service') }}</a>
													</li>
													<li class="dropdown">
														<a href="{{ url('portofolio') }}">{{ trans('main.portofolio') }}</a>
													</li>
													<li class="dropdown">
														<a href="{{ url('customers') }}">{{ trans('main.customer') }}</a>
													</li>
													<li class="dropdown">
														<a href="{{ url('contact') }}">{{ trans('main.contact') }}</a>
														<ul class="dropdown-menu">
															<li class="dropdown-submenu">
																<a href="{{ url('contact') }}">{{ trans('main.contact') }}</a>
															</li>
															<li class="dropdown-submenu">
																<a href="{{ url('trabalhe-connosco') }}">{{ trans('main.trabalhe-connosco') }}</a>
															</li>
														</ul>
													</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				@yield('content')
			</div>
 
			<footer id="footer">
				<div class="container">
					<div class="row">
						<!--<div class="footer-ribbon">
							@yield('footer_title')
						</div>-->
						<div class="col-md-4">
							@yield('footer_panel_one')
						</div>
						<!--<div class="col-md-3">
							@yield('footer_panel_two')
						</div>-->
						<div class="col-md-6">
							@yield('footer_panel_tree')
						</div>
						<!--
						<div class="col-md-2">
							@yield('footer_panel_four')
						</div>
						-->
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						@yield('footer_copyright')
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="/vendor/jquery/jquery.min.js"></script>
		<script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="/vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="/vendor/common/common.min.js"></script>
		<script src="/vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="/vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->
		 
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			$(document).ready(function () {
			//~ $(function () {
				$('#enviar_mail').click(function(e){
					e.preventDefault();
					// Expresion regular para validar el correo
					var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
					
					if ($('#newsletterEmail').val().trim() != '' && regex.test($('#newsletterEmail').val().trim())){
						$.ajax({
							method: "POST",
							url: '/find_mail',
							data: $('#newsletterForm').serialize()
						})
						.done(function(data) {
							if(data.error){
								console.log(data.error);
							} else {
								if (parseInt(data) > 0){
									//~ alert("Your mail has already been registered");
									$("#modal_reg_email1").modal('show');
									$("#contenido_modal1").addClass("alert-danger");
									$("#contenido_modal1").html("{!!trans('main.mss-alert2-email')!!}");
								}else{
									$.ajax({
										method: "POST",
										url: '/reg_mail',
										data: $('#newsletterForm').serialize()
									})
									.done(function(data) {
										if(data.error){
											console.log(data.error);
										} else {
											//~ alert("Email registered...");
											$("#modal_reg_email1").modal('show');
											$("#contenido_modal1").removeClass("alert-danger");
											$("#contenido_modal1").addClass("alert-success");
											$("#contenido_modal1").html("{!!trans('main.mss-reg-email')!!}");
											$('#newsletterEmail').val('');
											$('#newsletterEmail').focus();
										}
										
									}).fail(function() {
										console.log("error ajax");
									});
								}
							}
							
						}).fail(function() {
							console.log("error ajax");
						});
					}else{
						//~ alert("The email address is not valid...");
						$("#modal_reg_email1").modal('show');
						$("#contenido_modal1").addClass("alert-danger");
						$("#contenido_modal1").html("{!!trans('main.mss-alert1-email')!!}");
						$('#newsletterEmail').focus();
					}
				})
				
				// Ejecutamos la busqueda al cambiar el valor del campo de búsqueda
				$("#buscar").click(function (e) {
					e.preventDefault();  // Para evitar que se envíe por defecto
					
					//~ alert("Buscando...");
					
					if ($('#q').val().trim() != ''){
						//~ alert("Buscando");
						url = "/find_portofolios?q="+$('#q').val().trim();
						document.location=url;
					}
				});
				
			//~ });
			});
		</script>
		
		<div id="modal_reg_email1" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--<h4 class="modal-title">Modal Header</h4>-->
			  </div>
			  <div class="modal-body">
				<div class="alert alert-success" id="contenido_modal1">
				  
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>

	</body>
</html>
