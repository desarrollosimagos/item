
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
				<!--<section class="page-header">
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
				</section>-->
				
				<div class="slider-container rev_slider_wrapper" style="margin-top: -24px;">
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 500, 'disableProgressBar': 'on'}">
						<ul>
							<li data-transition="fade">
								<img src="img/slides/slide-bg.jpg"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="tp-caption top-label"
									data-x="30"
									data-y="30"
									data-start="500"
									data-transform_in="y:[-300%];opacity:0;s:500;">
									<img class="alignnone size-medium wp-image-320" src="http://itemao.com/web/wp-content/uploads/2014/05/logo536-sombra-300x300.png" alt="logo536-sombra" width="300" height="300">
								</div>

								<div class="tp-caption blackboard-text"
									data-x="400"
									data-y="150"
									data-start="1500"
									style="font-size: 50px;"
									data-transform_in="y:[300%];opacity:0;s:300;"><strong>O QUE FAZEMOS</strong></div>

								<div class="tp-caption blackboard-text"
									data-x="0"
									data-y="310"
									data-start="1500"
									style="font-size: 30px;"
									data-transform_in="y:[300%];opacity:0;s:300;">“ACTUAMOS EM ÁREAS TÃO DIVERSAS COMO ESTUDOS, PROJECTOS, CONSULTORIA E FISCALIZAÇÃO.</div>

								<div class="tp-caption blackboard-text"
									data-x="-30"
									data-y="360"
									data-start="1700"
									style="font-size: 30px;"
									data-transform_in="y:[300%];opacity:0;s:300;">TEMOS A COMPETÊNCIA E A EXPERIÊNCIA NECESSÁRIAS PARA GARANTIR UM TRABALHO DE EXCELÊNCIA.</div>

								<div class="tp-caption blackboard-text"
									data-x="-100"
									data-y="410"
									data-start="1900"
									style="font-size: 30px;"
									data-transform_in="y:[300%];opacity:0;s:300;">POSSUÍMOS QUADROS TÉCNICOS COM O DOMÍNIO DA ARQUITECTURA E DAS DIFERENTES ESPECIALIDADES DA ENGENHARIA.”</div>
							</li>
							
							 
						</ul>
					</div>
				</div>

				<div class="container">
								
					<div class="row">
						<hr class="tall">
					</div>

				</div>
				
				<div class="container">
					
					<div class="row">
						<div class="col-md-12">
							<div class="tabs">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#estudios" data-toggle="tab"><i class="fa fa-tag"></i> ESTUDOS E PROJECTOS</a>
									</li>
									<li>
										<a href="#consultoria" data-toggle="tab"><i class="fa fa-tag"></i>CONSULTORÍA</a>
									</li>
									</li>
									<li>
										<a href="#fiscalizacion" data-toggle="tab"><i class="fa fa-tag"></i>FISCALIZAÇÃO</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="estudios" class="tab-pane active">
										<div class="row">
											<div class="col-md-4">
												<img alt="" title="" src="http://itemao.com/web/wp-content/uploads/2014/05/slider-boceto.png" width="300" height="200">
											</div>
											<div class="col-md-8">
												<h2> ESTUDOS E PROJECTOS</h2>
												<p>
												Visualizamos as ideias dos nossos Clientes e traduzimo-las em projectos personalizados.
												Contamos com um Quadro Técnico experiente e multidisciplinar que assegura a 
												execução e o acompanhamento das diversas fases dos Estudos e Projectos
												</p>
												<div>
													<ul>
														<li>Elaboração e Coordenação de Projectos de Arquitectura e de Engenharia.</li>
														<li>Revisão de Projectos.</li>
														<li>Análise de viabilidade técnica das soluções.</li>
														<li>Avaliação preliminar de custos.</li>
														<li>Assistência técnica.</li>
													</ul>
												</div>
												<p>
												Possuímos a experiência na elaboração dos mais variados Programas Funcionais
												</p>
												<div>
													<ul>
														<li>Projectos de Edifícios Indústriais</li>
														<li>Projectos de Edifícios Comerciais</li>
														<li>Projectos de Edifícios de Hotelaria e Resorts</li>
														<li>Projectos de Edifícios de Habitação</li>
														<li>Projectos de Edifícios de Escritórios</li>
														<li>Projectos de Edifícios Públicos</li>
														<li>Projectos de Edifícios Desportivos</li>
														<li>Projectos de Edifícios Culturais</li>
														<li>Projectos de Marinas e Obras Maritimas</li>
														<li>Estudos e Planos Ambientais</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div id="consultoria" class="tab-pane">
										<div class="row">
											<div class="col-md-4">
												<img alt="" title="" src="http://itemao.com/web/wp-content/uploads/2014/05/cartografia_hipodromo_aranjuez.jpg" width="300" height="200">
											</div>
											<div class="col-md-8">
												<h2> CONSULTORÍA</h2>
												<p>
												A ITEM oferece serviços de Vistória Técnica de Projectos e Obras. 
												Prestamos serviços na área da engenharia e arquitectura com o objectivo de orientar o cliente. 
												Nossos serviços incluem visitas, levantamentos, cálculos, estudos e elaboração de parecer em relatório conclusivo.
												</p>
												<p>
												Realizamos diagnósticos e formulamos soluções nas diversas áreas de engenharia e arquitectura elaboramos vistorias, 
												laudos técnicos, auditorias, pareceres e estudos de viabilidade técnica / económica.
												</p>
												<h3> EM ESTÁ ÁREA NOS ESPECIALIZAMOS EM:</h3>
												<div>
													<ul>
														<li>Elaboração de Concursos Públicos e/ou Privado</li>
														<li>Elo de ligação entre o dono de obra e o executante.</li>
														<li>Proposta de melhoria das soluções.</li>
														<li>Análise da viabilidade das soluções.</li>
														<li>Análise regulamentar de projectos.</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div id="fiscalizacion" class="tab-pane">
										<div class="row">
											<div class="col-md-4">
												<img alt="" title="" src="http://itemao.com/web/wp-content/uploads/2014/05/8362332692_5c2e200c11_obn.jpg" width="300" height="200">
											</div>
											<div class="col-md-8">
												<h2> FISCALIZAÇÃO</h2>
												<p>
												Esta é uma actividade essencial na área da construção para cumprir e verificar as directrizes dos projectos. 
												A Item da resposta à complexidade crescente que as obras apresentam através de suas competências técnicas. 
												É um vector fundamental para garantir a qualidade de qualquer empreendimento.
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
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

