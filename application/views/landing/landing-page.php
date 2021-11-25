<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Sistem Informasi" />
	<meta name="author" content="pupr" />
	<meta name="robots" content="pupr" />
	<meta name="description" content="" />
	<meta property="og:title" content="PUPR - Aceh Barat" />
	<meta property="og:description" content="Sistem Informasi, e-monev" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="<?= base_url() ?>assets/admin/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/admin/images/favicon.ico" />

	<!-- PAGE TITLE HERE -->
	<title><?= $title ?></title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="<?= config_item('landing_js') ?>html5shiv.min.js"></script>
	<script src="<?= config_item('landing_js') ?>respond.min.js"></script>
	<![endif]-->

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_css') ?>plugins.css">
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_plugin') ?>fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_plugin') ?>themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_css') ?>style.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?= config_item('landing_css') ?>skin/skin-1.css">
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_css') ?>templete.min.css">

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_plugin') ?>revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?= config_item('landing_plugin') ?>revolution/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER CSS END -->

</head>

<body id="bg">
	<div id="loading-area"></div>
	<div class="page-wraper">
		<!-- header -->
		<header class="site-header header mo-left header-style-5">
			<!-- top bar -->
			<div class="top-bar ">
				<div class="container">
					<div class="row d-flex justify-content-between">
						<div class="dez-topbar-left"></div>
						<div class="dez-topbar-right">
							<ul class="social-bx list-inline pull-right">
								<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
								<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
								<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
								<li><a href="<?= site_url('login') ?>" class="fa fa-user"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- top bar END-->
			<!-- main header -->
			<div class="sticky-header header-curve main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix ">
					<div class="container clearfix">
						<!-- website logo -->
						<div class="logo-header mostion">
							<a href="#">
								<img src="<?= config_item('landing_image') ?>logo-light.png" width="193" height="89" alt="">
							</a>
						</div>
						<!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- extra nav -->
						<div class="extra-nav">
							<div class="extra-cell">
								<button id="quik-search-btn" type="button" class="site-button"><i class="fa fa-search"></i>
								</button>
							</div>
						</div>
						<!-- Quik search -->
						<div class="dez-quik-search bg-primary">
							<form action="#">
								<input name="search" value="" type="text" class="form-control" placeholder="Type to search">
								<span id="quik-search-remove"><i class="fa fa-remove"></i></span>
							</form>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
							<ul class=" nav navbar-nav">
								<li class="active"><a href="<?= site_url() ?>">Home</a>
								</li>
								<li><a href="javascript:;">Layanan<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="javascript:;">Header <span class="tag-new">New</span></a>
										</li>
										<li><a href="javascript:;">Footer</a>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;">Progress<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="javascript:;">Per Bulan</a>
										</li>
										<li><a href="javascript:;">Per Tahun</a>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;">Blog<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="javascript:;">Berita</a>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;">About</a>
								</li>
								<li><a href="javascript:;">Contact us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>
		<!-- header END -->
		<!-- Content -->
		<div class="page-content">
			<!-- Slider -->
			<div class="main-slider style-two default-banner">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom" data-source="gallery">
							<!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
							<div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
								<ul>
									<!-- SLIDE  -->
									<li data-index="rs-2978" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000" data-thumb="<?= base_url() ?>assets/landing/media/construct1.jpg" data-rotate="0" data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
										<!-- MAIN IMAGE -->
										<img src="<?= base_url() ?>assets/landing/media/construct1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="3" class="rev-slidebg" data-no-retina>
										<!-- LAYERS -->
										<!-- LAYERS NR. 1 [ BACKGROUND VIDEO LAYER ] -->
										<div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-videomp4="<?= base_url() ?>assets/landing/media/construct1.mp4" data-videopreload="auto" data-videoloop="loop" data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false"></div>
										<!-- LAYER NR. 2 [ for title ] -->
										<div class="tp-caption tp-shape tp-shapewrapper overlay-bg rs-parallaxlevel-tobggroup" id="slide-2978-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;background-color:rgba(18, 12, 20, 0.0);border-color:rgba(0, 0, 0, 0);border-width:0px;"></div>
										<!-- LAYER NR. 3  [ Readmore button ]-->
										<div class="tp-caption Creative-Title tp-resizeme rs-parallaxlevel-1" id="slide-2978-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-40','-40','-40','-00']" data-fontsize="['100','90','80','60']" data-lineheight="['70','70','70','70']" data-width="['none','none','none','none']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: nowrap; text-transform:uppercase; color:#fff; font-family: Oswald;">
											Construct
										</div>
										<!-- LAYER NR. 3 -->
										<div class="tp-caption Creative-Title tp-resizeme rs-parallaxlevel-1" id="slide-2978-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['50','50','50','70']" data-fontsize="['none','none','none','none']" data-lineheight="['none','none','none','none']" data-width="['none','none','none','none']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: nowrap; color:#fff;">
											<a href="javascript:void(0);" class="site-button button-skew">
												<span>Read More</span><i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
									<!-- SLIDE  -->
								</ul>
							</div>
							<!-- END REVOLUTION SLIDER -->
						</div>
					</div>
				</div>
			</div>
			<!-- Slider END -->
			<!-- meet & ask -->
			<div class="section-full z-index100 meet-ask-outer">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 meet-ask-row p-tb30">
							<div class="row d-flex">
								<div class="col-lg-6">
									<div class="icon-bx-wraper clearfix text-white left">
										<div class="icon-xl "><span class=" icon-cell"><i class="fa fa-building-o"></i></span></div>
										<div class="icon-content">
											<h3 class="dez-tilte text-uppercase m-b10">Meet & Ask</h3>
											<p>You will share your project needs, dreams and goals with us. </p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 m-t20">
									<a href="#" class="site-button-secondry button-skew m-l10">
										<span>Contact Us</span><i class="fa fa-angle-right"></i></a>
									<a href="#" class="site-button-secondry button-skew m-l20">
										<span>View more</span><i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- meet & ask END -->
			<!-- About Company -->
			<div class="section-full  bg-gray content-inner-1" style="background-image: url(../../assets/landing/images/bg-img.png); background-repeat: repeat-x; background-position: left bottom -37px;">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-lg-5 m-b30">
								<div class="dez-thu m"><img src="<?= config_item('landing_image') ?>worker2.png" alt="">
								</div>
							</div>
							<div class="col-lg-7">
								<h2 class="text-uppercase"> About Company</h2>
								<div class="dez-separator-outer ">
									<div class="dez-separator bg-secondry style-skew"></div>
								</div>
								<div class="clear"></div>
								<p><strong>Constructzilla is ready to build you. We provide best construction service to our
										clients. We create best building design that you should be proud of. To realize your
										idea, we work beautifully and creatively for your own dream.</strong></p>
								<p class="m-b30">We are thinkers and dreamers, maker installation and product for buildings.
									We build and has built hotels, residences hospitals and sports venues. We are devoted to
									the task to construct your dream to fit all your needs and preference. </p>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="icon-bx-wraper bx-style-1 p-a20 left m-b30">
											<div class="bg-secondry icon-bx-xs m-b20 "><span class="icon-cell"><i class="fa fa-building-o text-primary"></i></span></div>
											<div class="icon-content">
												<h5 class="dez-tilte text-uppercase">Construction</h5>
												<p>We provide the best construction project for you.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="icon-bx-wraper bx-style-1 p-a20 left m-b30">
											<div class="bg-secondry icon-bx-xs m-b20"><span class="icon-cell"><i class="fa fa-user text-primary"></i></span></div>
											<div class="icon-content">
												<h5 class="dez-tilte text-uppercase">Architecture</h5>
												<p>Our architect service provides high-end design for you.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="icon-bx-wraper bx-style-1 p-a20 left m-b30">
											<div class="bg-secondry icon-bx-xs m-b20"><span class="icon-cell"><i class="fa fa-truck text-primary"></i></span></div>
											<div class="icon-content">
												<h5 class="dez-tilte text-uppercase">Consulting</h5>
												<p>Our consulting team is always ready to help you.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="icon-bx-wraper bx-style-1 p-a20 left m-b30">
											<div class="bg-secondry icon-bx-xs m-b20 "><span class="icon-cell"><i class="fa fa-book text-primary"></i></span></div>
											<div class="icon-content">
												<h5 class="dez-tilte text-uppercase">Mechanical</h5>
												<p>We are mechanically strong to build your building. </p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- About Company END -->
			<!-- Our Projects  -->
			<div class="section-full bg-img-fix content-inner-1 overlay-black-middle" style="background-image:url(../../../assets/landing/images/background/bg1.jpg);">
				<div class="container">
					<div class="section-head  text-center text-white">
						<h2 class="text-uppercase">Our Projects</h2>
						<div class="dez-separator-outer ">
							<div class="dez-separator bg-white style-skew"></div>
						</div>
						<p>Because of best quality & service, victory has always been our goal, we only repRecent the best
							talent. We’ll do everything for you which can put you at ease with the correct guidance,
							simplicity & honesty.</p>
					</div>
					<div class="portfolio-carousel mfp-gallery gallery owl-carousel owl-btn-center-lr lightgallery">
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic1.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic1.jpg" data-src="images/our-work/large/pic1.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic2.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic2.jpg" data-src="<?= config_item('landing_image') ?>our-work/large/pic2.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic3.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic3.jpg" data-src="images/our-work/large/pic3.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic4.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic4.jpg" data-src="images/our-work/large/pic4.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic5.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic5.jpg" data-src="images/our-work/large/pic5.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="ow-portfolio">
								<div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/middle/pic6.jpg" alt="">
									<div class="overlay-bx">
										<div class="overlay-icon">
											<span data-exthumbimage="images/our-work/thumb/pic6.jpg" data-src="images/our-work/large/pic6.jpg" class="icon-bx-xs check-km" title="Light Gallery Grid 1">
												<i class="fa fa-picture-o"></i>
											</span>
											<a href="#"> <i class="fa fa-link icon-bx-xs"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Our Projects END -->
			<!-- Architecture -->
			<div class="section-full  bg-white content-inner">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="text-uppercase"> Architecture</h2>
						<div class="dez-separator-outer ">
							<div class="dez-separator bg-secondry style-skew"></div>
						</div>
						<p>We provide a wide variety of services including practical studies, architectural programming and
							project management. Definitely our work feel amazes you. You will find smoothness and accuracy
							in our working system.</p>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-life-saver text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Safety</h5>
									<p>With the best quality, facility and service we still concentrate on safety and
										protection of our clients.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-users text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Community</h5>
									<p>We will work and discuss on project with our best team members to define the
										logistical requirements. </p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-thumbs-up text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Sustainability</h5>
									<p>We provide an extraordinary construction project for your dream and desires in the
										location you love.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-trophy text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Best Quality</h5>
									<p>We believe in best quality over quantity. We try always best for our clients to fit
										all needs and desires. </p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-cubes text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Integrity</h5>
									<p>We first create the highest level of trust and integrity with our clients and provide
										best service according...</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="icon-bx-wraper bx-style-1 p-a30 center m-b10">
								<div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i class="fa fa-area-chart text-primary"></i></span></div>
								<div class="icon-content">
									<h5 class="dez-tilte text-uppercase">Strategy</h5>
									<p>We make our master plan by keeping the needs of the people, which is always perfect
										in their future.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Architecture END-->
			<!-- Company staus -->
			<div class="section-full text-white bg-img-fix content-inner overlay-black-middle" style="background-image:url(../../assets/landing/images/background/bg4.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 m-b30">
							<div class="p-a30 text-white text-center border-3">
								<div class="icon-lg m-b20"><i class="fa fa-building-o"></i></div>
								<div class="counter font-26 font-weight-800 text-primary m-b5">1035</div>
								<span>Active Experts</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 m-b30">
							<div class="p-a30 text-white text-center border-3">
								<div class="icon-lg m-b20"><i class="fa fa-group"></i></div>
								<div class="counter font-26 font-weight-800 text-primary m-b5">1226</div>
								<span>Happy Client</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 m-b30">
							<div class="p-a30 text-white text-center border-3">
								<div class="icon-lg m-b20"><i class="fa fa-slideshare"></i></div>
								<div class="counter font-26 font-weight-800 text-primary m-b5">1552</div>
								<span>Developer Hand</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 m-b10">
							<div class="p-a30 text-white text-center border-3">
								<div class="icon-lg m-b20"><i class="fa fa-home"></i></div>
								<div class="counter font-26 font-weight-800 text-primary m-b5">1156</div>
								<span>Completed Project</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Company staus END -->
			<!-- Team member -->
			<div class="section-full bg-white content-inner">
				<div class="container">
					<div class="section-head text-center ">
						<h2 class="text-uppercase"> Meet The Team</h2>
						<div class="dez-separator-outer ">
							<div class="dez-separator bg-secondry style-skew"></div>
						</div>
						<p>Our smart team takes care of everything. The entire team has been great to work with from start
							to finish. Our team is focused on target and best service. </p>
					</div>
					<div class="section-content">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1 left">
								<div class="dez-box m-b30 team-skew ">
									<div class="dez-media"><a href="javascript:;"> <img src="<?= config_item('landing_image') ?>our-team/team/pic1.png" alt="" width="358" height="460">
										</a>
										<div class="dez-info-has">
											<ul class="dez-social-icon bg-primary">
												<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
											</ul>
										</div>
									</div>
									<div class="p-a20 bg-secondry text-center text-white team-info ">
										<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Hackson
												Willingham</a></h4>
										<span class="dez-member-position">Director</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1">
								<div class="dez-box m-b30 team-skew ">
									<div class="dez-media"><a href="javascript:;"> <img src="<?= config_item('landing_image') ?>our-team/team/pic2.png" alt="" width="358" height="460">
										</a>
										<div class="dez-info-has">
											<ul class="dez-social-icon bg-primary">
												<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
											</ul>
										</div>
									</div>
									<div class="p-a20 bg-secondry text-center text-white team-info ">
										<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Wendon
												Anderson</a></h4>
										<span class="dez-member-position">Manager</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 dez-team-1 right">
								<div class="dez-box m-b30 team-skew ">
									<div class="dez-media"><a href="javascript:;"> <img src="<?= config_item('landing_image') ?>our-team/team/pic3.png" alt="" width="358" height="460">
										</a>
										<div class="dez-info-has">
											<ul class="dez-social-icon bg-primary">
												<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
												<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
											</ul>
										</div>
									</div>
									<div class="p-a20 bg-secondry text-center text-white team-info ">
										<h4 class="dez-title text-uppercase m-t0 m-b5"><a href="javascript:;" class=" text-white">Kent Jones</a>
										</h4>
										<span class="dez-member-position">Developer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Team member END -->
			<!-- Latest blog -->
			<div class="section-full content-inner-1 ">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="text-uppercase">Latest blog post</h2>
						<div class="dez-separator-outer ">
							<div class="dez-separator bg-secondry style-skew"></div>
						</div>
					</div>
					<div class="section-content">
						<div class="blog-carousel mfp-gallery gallery owl-carousel owl-btn-center-lr">
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic1.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Construction Planning</a>
											</h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>This is our latest project which is perfectly constructed. We provide
												high-end residential construction, hospitals, hotels, education and sports
												venues.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic2.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Professional Services</a>
											</h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>Our construction design provides an extraordinary construction project
												experience. We are able to provide our customers with a level of
												expertise.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic3.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Creative construct
													design</a></h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>We understand the importance of the creation and professionalism and work
												with the best creative team memeber to achieve this goal for your bright
												future.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic4.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Construction Planning</a>
											</h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>This is our latest project which is perfectly constructed. We provide
												high-end residential construction, hospitals, hotels, education and sports
												venues.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic5.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Professional Services</a>
											</h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>Our construction design provides an extraordinary construction project
												experience. We are able to provide our customers with a level of
												expertise.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-blog-post date-style-2">
									<div class="ow-post-media dez-img-effect zoom-slow"><img src="<?= config_item('landing_image') ?>our-work/pic6.jpg" alt=""></div>
									<div class="ow-post-info ">
										<div class="ow-post-title">
											<h4 class="post-title"><a href="#" title="Video post">Creative construct
													design</a></h4>
										</div>
										<div class="ow-post-meta">
											<ul>
												<li class="post-date"><i class="fa fa-calendar"></i><strong>17 Mar</strong>
													<span> 2020</span>
												</li>
												<li class="post-author"><i class="fa fa-user"></i>By <a href="#" title="Posts by demongo" rel="author">demongo</a>
												</li>
												<li class="post-comment"><i class="fa fa-comments"></i> <a href="#" class="comments-link">1
														Comment</a></li>
											</ul>
										</div>
										<div class="ow-post-text">
											<p>We understand the importance of the creation and professionalism and work
												with the best creative team memeber to achieve this goal for your bright
												future.</p>
										</div>
										<div class="ow-post-readmore "><a href="#" title="READ MORE" rel="bookmark" class=" site-button-link"> READ MORE <i class="fa fa-angle-double-right"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Latest blog END -->
			<!-- Testimonials blog -->
			<div class="section-full overlay-black-middle bg-img-fix content-inner-1" style="background-image:url(../../assets/landing/images/background/bg2.jpg);">
				<div class="container">
					<div class="section-head text-white text-center">
						<h2 class="text-uppercase">What peolpe are saying</h2>
						<div class="dez-separator-outer ">
							<div class="dez-separator bg-white  style-skew"></div>
						</div>
					</div>
					<div class="section-content">
						<div class="testimonial-one owl-carousel owl-theme">
							<div class="item">
								<div class="testimonial-1 testimonial-bg">
									<div class="testimonial-pic quote-left radius shadow"><img src="<?= config_item('landing_image') ?>testimonials/pic1.jpg" width="100" height="100" alt=""></div>
									<div class="testimonial-text">
										<p>The entire team is extremely creative and forward thinking. They are also very
											quick and efficient when executing changes for us. I found their expertise to be
											extremely helpful. I think it is awesome and I can't thank you enough for
											working so closely with me. The entire team has been great to work with from
											start to finish. I think it is awesome and I can't thank you enough for working
											so closely with me. Fine job!!</p>
									</div>
									<div class="testimonial-detail"><strong class="testimonial-name">Marina Lee</strong>
										<span class="testimonial-position">Media senior Specialist</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-1 testimonial-bg">
									<div class="testimonial-pic quote-left radius shadow"><img src="<?= config_item('landing_image') ?>testimonials/pic1.jpg" width="100" height="100" alt=""></div>
									<div class="testimonial-text">
										<p>The entire team is extremely creative and forward thinking. They are also very
											quick and efficient when executing changes for us. I found their expertise to be
											extremely helpful. I think it is awesome and I can't thank you enough for
											working so closely with me. The entire team has been great to work with from
											start to finish. I think it is awesome and I can't thank you enough for working
											so closely with me. Fine job!!</p>
									</div>
									<div class="testimonial-detail"><strong class="testimonial-name">Eloise Carson</strong>
										<span class="testimonial-position">Media Specialist</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-1 testimonial-bg">
									<div class="testimonial-pic quote-left radius shadow"><img src="<?= config_item('landing_image') ?>testimonials/pic1.jpg" width="100" height="100" alt=""></div>
									<div class="testimonial-text">
										<p>The entire team is extremely creative and forward thinking. They are also very
											quick and efficient when executing changes for us. I found their expertise to be
											extremely helpful. I think it is awesome and I can't thank you enough for
											working so closely with me. The entire team has been great to work with from
											start to finish. I think it is awesome and I can't thank you enough for working
											so closely with me. Fine job!!</p>
									</div>
									<div class="testimonial-detail"><strong class="testimonial-name">David Matin</strong>
										<span class="testimonial-position">Student</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials blog END -->
			<!-- Client logo -->
			<div class="section-full dez-we-find bg-img-fix p-t50 p-b50 ">
				<div class="container">
					<div class="section-content">
						<div class="client-logo-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo1.jpg" alt=""></a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo2.jpg" alt=""></a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo1.jpg" alt=""></a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo3.jpg" alt=""></a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo4.jpg" alt=""></a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo"><a href="#"><img src="<?= config_item('landing_image') ?>client-logo/logo3.jpg" alt=""></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Client logo END -->

			<!-- Contact form -->
			<div class="section-full content-inner bg-white contact-style-1">
				<div class="container">
					<div class="row">
						<!-- Left part start -->
						<div class="col-lg-8">
							<div class="p-a30 bg-gray clearfix m-b30 ">
								<h2>Send Message Us</h2>
								<div class="dzFormMsg"></div>
								<form method="post" class="dzForm" action="script/contact.php">
									<input type="hidden" value="Contact" name="dzToDo">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-group">
													<input name="dzName" type="text" required="" class="form-control" placeholder="Your Name">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-group">
													<input name="dzEmail" type="email" class="form-control" required="" placeholder="Your Email Id">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-group">
													<input name="dzOther[Phone]" type="text" required="" class="form-control" placeholder="Phone">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-group">
													<input name="dzOther[Subject]" type="text" required="" class="form-control" placeholder="Subject">
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<div class="input-group">
													<textarea name="dzMessage" rows="4" class="form-control" required="" placeholder="Your Message..."></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<div class="input-group">
													<!--<div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
												<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">-->
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<button name="submit" type="submit" value="Submit" class="site-button "><span>Submit</span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- Left part END -->
						<!-- right part start -->
						<div class="col-lg-4 d-lg-flex">
							<div class="p-a30 m-b30 border-1 contact-area align-self-stretch">
								<h2 class="m-b10">Quick Contact</h2>
								<p>If you have any questions simply use the following contact details.</p>
								<ul class="no-margin">
									<li class="icon-bx-wraper left m-b30">
										<div class="icon-bx-xs bg-primary"><a href="#" class="icon-cell"><i class="fa fa-map-marker"></i></a></div>
										<div class="icon-content">
											<h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
											<p>Meulaboh, Aceh Barat</p>
										</div>
									</li>
									<li class="icon-bx-wraper left  m-b30">
										<div class="icon-bx-xs bg-primary"><a href="#" class="icon-cell"><i class="fa fa-envelope"></i></a></div>
										<div class="icon-content">
											<h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
											<p>info@company.com</p>
										</div>
									</li>
									<li class="icon-bx-wraper left">
										<div class="icon-bx-xs bg-primary"><a href="#" class="icon-cell"><i class="fa fa-phone"></i></a></div>
										<div class="icon-content">
											<h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
											<p>+62 123456</p>
										</div>
									</li>
								</ul>
								<div class="m-t20">
									<ul class="dez-social-icon dez-social-icon-lg">
										<li><a href="javascript:void(0);" class="fa fa-facebook bg-primary"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-twitter bg-primary"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-linkedin bg-primary"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-pinterest-p bg-primary"></a></li>
										<li><a href="javascript:void(0);" class="fa fa-google-plus bg-primary"></a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- right part END -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- Map part start -->
							<h2>Our Location</h2>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2067.9452685712417!2d96.12854972291177!3d4.162531904447952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303ec3a223caad2d%3A0xa0e08dcff5fc37ff!2sDinas%20PUPR!5e0!3m2!1sid!2sid!4v1625464533714!5m2!1sid!2sid" style="border:0; width:100%; height:400px;" allowfullscreen=""></iframe>
							<!-- Map part END -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Content END-->
		<!-- Footer -->
		<footer class="site-footer">
			<!-- newsletter part -->
			<div class="bg-primary dez-newsletter">
				<div class="container equal-wraper">
					<form class="dzSubscribe" action="<?= base_url() ?>assets/landing/script/mailchamp.php" method="post">
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<div class="icon-bx-wraper equal-col p-t30 p-b20 left">
									<div class="icon-lg text-primary radius"><a href="#" class="icon-cell"><i class="fa fa-envelope-o"></i></a></div>
									<div class="icon-content"><strong class="text-black text-uppercase font-18">Subscribe</strong>
										<h2 class="dez-tilte text-uppercase">Our Newsletter</h2>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="dzSubscribeMsg"></div>
								<div class="input-group equal-col p-t40 p-b20">
									<input name="dzEmail" required placeholder="Email address" required="required" class="form-control" type="email">
								</div>
							</div>
							<div class="col-md-3 col-lg-3 offset-lg-1 offset-md-1">
								<div class="equal-col p-t40 p-b20 skew-subscribe">
									<button name="submit" value="Submit" type="submit" class="site-button-secondry button-skew z-index1">
										<span>Subscribe</span><i class="fa fa-angle-right"></i>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- footer top part -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
							<div class="widget widget_about">
								<div class="logo-footer"><img src="<?= config_item('landing_image') ?>logo-dark.png" alt="">
								</div>
								<p><strong>Our mission </strong>is to provide the best value and service to our clients.
									Here we are always ready to help you. We are devoted to the task to construct your dream
									to fit all your needs and preference. We realize that our success starts and ends with
									our employees.</p>
								<ul class="dez-social-icon dez-border">
									<li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
									<li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
									<li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
									<li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
							<div class="widget recent-posts-entry">
								<h4 class="m-b15 text-uppercase">Recent Post</h4>
								<div class="dez-separator-outer m-b10">
									<div class="dez-separator bg-white style-skew"></div>
								</div>
								<div class="widget-post-bx">
									<div class="widget-post clearfix">
										<div class="dez-post-media"><img src="<?= config_item('landing_image') ?>blog/recent-blog/pic1.jpg" alt="" width="200" height="143"></div>
										<div class="dez-post-info">
											<div class="dez-post-header">
												<h6 class="post-title text-uppercase"><a href="#">Title of
														first blog</a></h6>
											</div>
											<div class="dez-post-meta">
												<ul>
													<li class="post-author">By <a href="#">Admin</a></li>
													<li class="post-comment"><i class="fa fa-comments"></i> 28</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="widget-post clearfix">
										<div class="dez-post-media"><img src="<?= config_item('landing_image') ?>blog/recent-blog/pic2.jpg" alt="" width="200" height="160"></div>
										<div class="dez-post-info">
											<div class="dez-post-header">
												<h6 class="post-title text-uppercase"><a href="#">Title of
														first blog</a></h6>
											</div>
											<div class="dez-post-meta">
												<ul>
													<li class="post-author">By <a href="#">Admin</a></li>
													<li class="post-comment"><i class="fa fa-comments"></i> 28</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="widget-post clearfix">
										<div class="dez-post-media"><img src="<?= config_item('landing_image') ?>blog/recent-blog/pic3.jpg" alt="" width="200" height="160"></div>
										<div class="dez-post-info">
											<div class="dez-post-header">
												<h6 class="post-title  text-uppercase"><a href="#">Title of
														first blog</a></h6>
											</div>
											<div class="dez-post-meta">
												<ul>
													<li class="post-author">By <a href="#">Admin</a></li>
													<li class="post-comment"><i class="fa fa-comments"></i> 28</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
							<div class="widget widget_services">
								<h4 class="m-b15 text-uppercase">Our services</h4>
								<div class="dez-separator-outer m-b10">
									<div class="dez-separator bg-white style-skew"></div>
								</div>
								<ul>
									<li><a href="#">Residential Construction</a></li>
									<li><a href="#">Office Construction</a></li>
									<li><a href="#">Wall Painting</a></li>
									<li><a href="#">Window Construction</a></li>
									<li><a href="#">Commercial Construction</a></li>
									<li><a href="#">Office Construction</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
							<div class="widget widget_getintuch">
								<h4 class="m-b15 text-uppercase">Contact us</h4>
								<div class="dez-separator-outer m-b10">
									<div class="dez-separator bg-white style-skew"></div>
								</div>
								<ul>
									<li><i class="fa fa-map-marker"></i><strong>address</strong> demo address #8901 Marmora
										Road Chi Minh City, Vietnam
									</li>
									<li><i class="fa fa-phone"></i><strong>phone</strong>0800-123456 (24/7 Support Line)
									</li>
									<li><i class="fa fa-fax"></i><strong>FAX</strong>(123) 123-4567</li>
									<li><i class="fa fa-envelope"></i><strong>email</strong>info@demo.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer bottom part -->
			<div class="footer-bottom footer-line">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 text-left">
							<span>© Copyright <?= date('Y') ?></span>
						</div>
						<div class="col-lg-4 col-md-4 text-center">
							<span> All right reserved <i class="fa fa-heart text-primary heart"></i> By e-Movev DPUPR </span>
						</div>
						<div class="col-lg-4 col-md-4 text-right">
							<a href="#"> About Us</a>
							<a href="#"> FAQs</a>
							<a href="#"> Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer END-->
		<!-- scroll top button -->
		<button class="scroltop fa fa-arrow-up style4"></button>
	</div>
	<!-- JavaScript  files ========================================= -->
	<script src="<?= config_item('landing_js') ?>jquery.min.js"></script><!-- JQUERY.MIN JS -->
	<script src="<?= config_item('landing_plugin') ?>bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="<?= config_item('landing_plugin') ?>bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="<?= config_item('landing_plugin') ?>bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
	<script src="<?= config_item('landing_plugin') ?>bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<!-- FORM JS -->
	<script src="<?= config_item('landing_plugin') ?>magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
	<script src="<?= config_item('landing_plugin') ?>counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
	<script src="<?= config_item('landing_plugin') ?>counter/counterup.min.js"></script><!-- COUNTERUP JS -->
	<script src="<?= config_item('landing_plugin') ?>imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
	<script src="<?= config_item('landing_plugin') ?>masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
	<script src="<?= config_item('landing_plugin') ?>masonry/masonry.filter.js"></script><!-- MASONRY -->
	<script src="<?= config_item('landing_plugin') ?>owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
	<script src="<?= config_item('landing_plugin') ?>lightgallery/js/lightgallery-all.js"></script><!-- LIGHT GALLERY -->
	<script src="<?= config_item('landing_js') ?>custom.min.js"></script><!-- CUSTOM FUCTIONS  -->
	<script src="<?= config_item('landing_js') ?>dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
	<script src="<?= config_item('landing_js') ?>dz.ajax.js"></script><!-- CONTACT JS  -->

	<!-- REVOLUTION JS FILES -->
	<script src="<?= config_item('landing_plugin') ?>revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/jquery.themepunch.revolution.min.js"></script>
	<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="<?= config_item('landing_plugin') ?>revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script src="<?= config_item('landing_js') ?>rev.slider.js"></script>

	<script>
		jQuery(document).ready(function() {
			'use strict';
			dz_rev_slider_2();
		}); /*ready*/
	</script>

</body>

</html>