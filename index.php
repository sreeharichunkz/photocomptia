<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('pdo.php');
 ?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:24:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Photocomptia</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Team" />
    <meta name="keywords" content="Photo Competions and Events" />
    <meta name="description" content="Participate in the event and win exciting prizes." />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" href="images/favicons/favicon.png" type="image/png">

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="style/style.css"/>

	<!-- Modernizr -->
	<script src="js/modernizr.custom.js" type="text/javascript"></script>

</head>
<body>
    <div class="loading animated">
	    <div class="loading-wrap animated bounceInLeft">
		    <img class="logotype animated infinite bounceIn" src="img/logo1.png" alt="logo">
	    </div>
	</div>

    <!-- Header -->
	<nav class="navbar animated slideInDown">
        <div class="navbar-left">
            <a href="index.html">
                <img class="logotype" src="img/logo1.png" alt="logo">
			</a>
        </div>
		<div id="open-overlay-nav" class="hamburger">
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
			<span class="hamburger__text">Menu</span>

		</div>
		<div class="hamburger__login">
      <?  if( isset($_SESSION['personid']) ) { ?>
			<a class="link_login" href="signin.php"><b>LOGOUT</b></a><?
} else{
?>
	<a class="link_login" href="signin.php"><b>LOGIN</b></a>
<?}?>
        </div>
	</nav>
	<!-- /Header -->

    <!-- Hero -->
    <header class="hero jarallax" data-image="img/hero-image6.png">
	    <div class="container">
            <div class="hero__caption" data-start="opacity:1; transform[swing]:translateY(0px)" data-500-start="opacity:0; transform[swing]:translateY(-100px)">
			    <div class="hero__row">
		            <h6 class="title__h6 title__overhead">Welcome To</h6>
			        <h1 class="title__h1 hero__title hero__title_line">Photo Comptia</h1>
				    <p class="hero__description">The Complete Photo Gallery and Events</p>
                    <a class="btn hero__btn" href="#">Capture Every Moment.</a>
				</div>
			</div>
		</div>
		<div class="hero__social animated slideInUp">
		    <a class="link_decoration" href="https://www.facebook.com/">Facebook</a>
			<a class="link_decoration" href="https://twitter.com/">Twitter</a>
			<a class="link_decoration" href="https://www.instagram.com/photocomptia/">Instagram</a>

		</div>
		<div class="next animated slideInUp">
		    <a class="next__arrow" href="!#events"></a>
		</div>
    </header>
    <!-- /Hero -->

	<!-- Hello --

    <section class="section section__hello section_no-space-bottom" id="hello">
        <div class="container">
            <div class="box-image">
			    <div class="reveal">
				    <img src="img/hello-image3.jpg" alt="Hello!">
				</div>
			</div>
			<div class="row justify-content-center">
			    <div class="col-12 col-lg-8 col__quote text-center" data-bottom="transform[swing]:translateY(0px)" data--400-top="transform[swing]:translateY(-100px)">
				    <h2 class="title__section title__h1 title_decoration title_vertical-line-top">Hello.</h2>
					<blockquote class="block-quote block-quote__about">
					    <p>All that we do is work on the style of life, on "being." The object as such is not very interesting. I wonder how people will live with him, what metamorphoses he will undergo in the house. I always liked very simple things. In all. Doing simple things is the most difficult thing. If we talk about simplicity, then it is a synthesis.</p>
						— <cite>Team Spade</cite>
					</blockquote>
				</div>
            </div>
		</div>
		<div class="text-decoration" data-100-start="transform[swing]:translateY(100px)" data--800-top="transform[swing]:translateY(-100px)">About Us</div>
	</section>
	<!-- /Hello -->



	<!-- Statistics --
	<section class="section section-counters text-center">
        <div class="container">
		    <div class="row os">
			    <div class="col-12 col-md-3">
				    <div class="counter">
				        <div class="counter__date title_decoration">100</div><span class="symbol_data">+</span>
					    <div class="counter__name">Events</div>
					</div>
				</div>
			    <div class="col-12 col-md-3">
				    <div class="counter">
				        <div class="counter__date title_decoration">5</div><span class="symbol_data">th</span>
					    <div class="counter__name">Tier Organization</div>
					</div>
				</div>
			    <div class="col-12 col-md-3">
				    <div class="counter counter_last-child">
				        <div class="counter__date title_decoration">50</div><span class="symbol_data">+</span>
					    <div class="counter__name">Projects and Internship</div>
					</div>
				</div>
				<div class="col-12 col-md-3">
				    <div class="counter counter_last-child">
				        <div class="counter__date title_decoration">200</div><span class="symbol_data">+</span>
					    <div class="counter__name">Members</div>
					</div>
				</div>
		    </div>
		</div>
	</section>
	<!-- /Statistics -->

	<!-- Testimonials --
	<section class="section  section_top-space-230">
    	<div class="container">
            <div class="row">
			    <div class="col section__header-wrap">
				    <h2 class="title__section title__h1 title_center"><span class="reveal reveal_gray">Testimonials.</span></h2>
				</div>
			</div>
		</div>

        <div class="client-carousel swiper-container">
		    <div class="swiper-wrapper">
		        <!-- Item --
                <div class="swiper-slide client-carousel-item">
			        <div class="item__block-number">
				        <span>01.</span>
				    </div>
			        <div class="item__block-author">
				        <div class="item__block-image">
					        <img src="img/client_image_01.jpg" alt="Alison Cooper">
					    </div>
					    <div class="item__block-name">
					        <h3 class="client__name">Alison <strong>Cooper</strong></h3>
					        <h4 class="cleint__organization">LEX Сompany</h4>
					    </div>
				    </div>
				    <div class="item__block-description">
				        <p>For me design — is a quality of life. Good design has little to do with trends. Tired of listening to him trying to give a frivolous status of a fashion phenomenon. In my opinion, the designer should strive to do something more than individual things.</p>
                    </div>
			    </div>
			    <!-- /Item -->

			    <!-- Item --
                <div class="swiper-slide client-carousel-item">
			        <div class="item__block-author">
			            <div class="item__block-number">
				            <span>02.</span>
				        </div>
				        <div class="item__block-image">
					        <img src="img/client_image_02.jpg" alt="Alison Cooper">
					    </div>
					    <div class="item__block-name">
					        <h3 class="client__name">Cristian <strong>Newman</strong></h3>
					        <h4 class="cleint__organization">Flex Production</h4>
					    </div>
				    </div>
				    <div class="item__block-description">
				        <p>For me design — is a quality of life. Good design has little to do with trends. Tired of listening to him trying to give a frivolous status of a fashion phenomenon. In my opinion, the designer should strive to do something more than individual things.</p>
                    </div>
			    </div>
			    <!-- /Item -->

			    <!-- Item --
                <div class="swiper-slide client-carousel-item">
			        <div class="item__block-number">
				        <span>03.</span>
				    </div>
			        <div class="item__block-author">
				        <div class="item__block-image">
					        <img src="img/client_image_03.jpg" alt="Alison Cooper">
					    </div>
					    <div class="item__block-name">
					        <h3 class="client__name">Jennifer <strong>Pallian</strong></h3>
					        <h4 class="cleint__organization">ONE Plus Agency</h4>
					    </div>
				    </div>
				    <div class="item__block-description">
				        <p>I like people with a sophisticated mind and at the same time simple in communication. These qualities can be combined quite naturally. However, objects, like people, look pathetic if these properties are connected in them artificially.</p>
                    </div>
			    </div>
			    <!-- /Item -->
            </div>

		    <!-- Control --
			<div class="swiper-control">
			    <div class="swiper-pagination"></div>
                <div class="swiper-button-next">NEXT</div>
                <div class="swiper-button-prev">PREV</div>
			</div>
		</div>
	</section>
	<!-- /Testimonials -->

	<!-- Pricing -->


	<section class="section" id="events">
    	<div class="container">
            <div class="row">
			    <div class="col section__header-wrap">
				    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray">Events.</span></h2>
				    <p class="section__subtitle">The photo leaves open moments, which immediately overlap with the pressure of time.</p>
				</div>
			</div>
		</div>

		<div class="pricing-grid swiper-container">
		    <div class="swiper-wrapper">
			    <!-- Item -->
			   <div class="swiper-slide pricing-grid__item pricing-grid__item_one" style="background-image: url(img/suriya.jpg)">
				    <h4 class="title__h4">Fan Contest</h4>
				   <br><br><br><br><br><br><br>
				  <!--  <div class="pricing-options">
					    <div class="pricing-options__name">Entries Close</div>
					    <div class="pricing-options__included">21/07/2020</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Result On</div>
					    <div class="pricing-options__included">23/07/2020</div>
				    </div>
				    <footer class="pricing-footer">
					    <div class="price">₹10</div>
					    <a href="blog_single_image.html" class="btn-link btn-link_right">Explore</a>
				    </footer>
				</div>
			-->
			     <br><br><br>
			   <footer class="pricing-footer">
				<div class="price"> — CLOSED — </div>

			</footer>
			    </div>

			    <!-- /Item -->

			    <!-- Item -->
			    <div class="swiper-slide pricing-grid__item pricing-grid__item_two" style="background-image: url(img/image_pricing_02.jpg)">
				    <h4 class="title__h4">Nature Photography.</h4>
				    <br><br><br><br><br><br><br>

				<!----	<div class="pricing-options">
					    <div class="pricing-options__name">Resolution</div>
					    <div class="pricing-options__included">32 MP</div>
					</div>
					-->
					<div class="pricing-options">
					    <div class="pricing-options__name">Entries Close</div>
					    <div class="pricing-options__included">10/08/2020</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Result On</div>
					    <div class="pricing-options__included">15/08/2020</div>
				    </div>
				    <footer class="pricing-footer">
					    <div class="price">₹10</div>

					    <a href="next_contest.html" class="btn-link btn-link_right">Explore</a>
				    </footer>
			    </div>
			    <!-- /Item -->

			    <!-- Item --
			    <div class="swiper-slide pricing-grid__item pricing-grid__item_three" style="background-image: url(img/image_pricing_03.jpg)">
				    <h4 class="title__h4">Corporate photography.</h4>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Photos</div>
					    <div class="pricing-options__included">Package of 500</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Processing</div>
					    <div class="pricing-options__included">Correction, Retouch</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Type of camera</div>
					    <div class="pricing-options__included">Professional</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Resolution</div>
					    <div class="pricing-options__included">48 MP</div>
				    </div>
				    <div class="pricing-options">
					    <div class="pricing-options__name">Term</div>
					    <div class="pricing-options__included">30 days</div>
				    </div>
				    <footer class="pricing-footer">
					    <div class="price">$99</div>
					    <a href="#price" class="btn-link btn-link_right">Explore</a>
				    </footer>
			    </div>
			    <!-- /Item -->

                <!-- Item -->
			    <div class="swiper-slide pricing-grid__item pricing-grid__item_four" style="background-image: url(img/image_pricing_05.jpg)">
				   <h4 class="title__h4">Urban Photography.</h4>
				   <br><br><br><br><br>
				   <br><br><br><br><br>

				    <footer class="pricing-footer">
					    <div class="price">Coming Soon.</div>
					    <a href="coming_soon.html" class="btn-link btn-link_right">Explore</a>
				    </footer>
			    </div>
				<!-- /Item -->

		    </div>

		    <!-- Control -->
			<div class="swiper-control">
			    <div class="swiper-pagination"></div>
                <div class="swiper-button-next">NEXT</div>
                <div class="swiper-button-prev">PREV</div>
			</div>
		</div>
	</section>
	<!-- /Pricing -->

	<!-- My Works -->
	<section class="section section-works section_top-space-230 section_first">
    	<div class="container">
            <div class="row">
			    <div class="col-12 section__header-wrap">
				    <h2 class="title__section title__h1 title_horizontal-line"><span class="reveal reveal_gray">Event Gallery.</span></h2>
				    <p class="section__subtitle">Photography — is a kind of visual literature. When you shoot, you do something meaningful: you build a frame, turn something into it, remove something.</p>
				</div>

			    <div class="col-12">
			        <!-- Filter -->
                    <div class="select">
			            <span class="placeholder">Select category</span>
			            <ul class="filter">
				            <li class="filter__item active" data-filter="*"><a class="filter__link active" href="#filter">All</a></li>
				            <li class="filter__item" data-filter=".category-landscapes"><a class="filter__link" href="#filter">Nature</a></li>
				            <li class="filter__item" data-filter=".category-life"><a class="filter__link" href="#filter">Life</a></li>
				            <li class="filter__item" data-filter=".category-fan"><a class="filter__link" href="#filter">Fan Contest</a></li>
			            </ul>
			            <input type="hidden" name="changemetoo"/>
		            </div>
		        </div>
			</div>
		</div>

        <div class="container-fluid">
			<div class="grid-gallery grid-gallery__base grid-gallery_fully filter-container load-container">
			    <!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-landscapes">
                    <a class="link-photo" href="img/01_image.jpg" data-width="900" data-height="900" data-caption="<div class='options__photo'><span>Photo By - </span>Abhisekh Unni</div>">
						<img class="image-portfolio" src="img/01_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i></a><span>By - Abhisekh</span></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1237</span></li>
					</ul>
				</figure>

				<!-- Picture -->
			    <figure class="item-portfolio item-portfolio__column-four category-landscapes">
					<a class="link-photo" href="img/03_image.jpg" data-width="900" data-height="1800" data-caption="<div class='options__photo'><span>Photo By - </span>Nitin Kumar</div>">
						<img class="image-portfolio" src="img/03_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i class="fa fa-location-arrow" aria-hidden="true"></i><span>By - Nitin Kumar</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1123</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-landscapes">
					<a class="link-photo" href="img/34_image.jpg" data-width="1280" data-height="1920" data-caption="<div class='options__photo'><span>Photo By - </span>Venod Pilla</div>">
						<img class="image-portfolio" src="img/34_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Venod Pilla </span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1421</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/19_image.jpg" data-width="900" data-height="1340" data-caption="<div class='options__photo'><span>Photo By - </span>Ritin Roy</div>">
						<img class="image-portfolio" src="img/19_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Ritin Roy</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1326</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/29_image.jpg" data-width="1280" data-height="787" data-caption="<div class='options__photo'><span>Photo By - </span>Abhimanyu</div>">
						<img class="image-portfolio" src="img/29_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Abhimanyu</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1139</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/22_image.jpg" data-width="1280" data-height="853" data-caption="<div class='options__photo'><span>Photo By - </span>Deepa krishnan</div>">
						<img class="image-portfolio" src="img/22_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Deepa krishnan</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>912</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/30_image.jpg" data-width="1280" data-height="1773" data-caption="<div class='options__photo'><span>Photo By - </span>Himanshu Raj/div>">
						<img class="image-portfolio" src="img/30_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Himanshu Raj</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>522</span></li>
					</ul>
				</figure>
				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-fan">
					<a class="link-photo" href="img/suriya-1.jpg" data-width="800" data-height="457" data-caption="<div class='options__photo'><span>Photo By - </span>Das</div>">
						<img class="image-portfolio" src="img/suriya-1.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Das</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>774</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-landscapes">
					<a class="link-photo" href="img/32_image.jpg" data-width="1280" data-height="853" data-caption="<div class='options__photo'><span>Photo By - </span>Anmol Tripati</div>">
						<img class="image-portfolio" src="img/32_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Anmol Tripati</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>931</span></li>
					</ul>
				</figure>



				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-fan">
					<a class="link-photo" href="img/suriya-5.jpg" data-width="1000" data-height="1326" data-caption="<div class='options__photo'><span>Photo By - </span>Venu Kumar</div>">
						<img class="image-portfolio" src="img/suriya-5.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Venu Kumar</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1170</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/21_image.jpg" data-width="900" data-height="1250" data-caption="<div class='options__photo'><span>Photo By - </span>Kabir Reddy</div>">
						<img class="image-portfolio" src="img/21_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Kabir Reddy</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>678</span></li>
					</ul>
				</figure>
				 <!-- Picture -->
				 <figure class="item-portfolio item-portfolio__column-four category-fan">
					<a class="link-photo" href="img/suriya-6.jpg" data-width="640" data-height="640" data-caption="<div class='options__photo'><span>Photo By - </span>Anjay Raja</div>">
						<img class="image-portfolio" src="img/suriya-6.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Anjay Raja</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>754</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-fan">
					<a class="link-photo" href="img/suriya-4.jfif" data-width="652" data-height="493" data-caption="<div class='options__photo'><span>Photo By - </span>Siva Achari</div>">
						<img class="image-portfolio" src="img/suriya-4.jfif" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Siva Achari</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>774</span></li>
					</ul>
				</figure>
				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-life">
					<a class="link-photo" href="img/33_image.jpg" data-width="1280" data-height="1558" data-caption="<div class='options__photo'><span>Photo By - </span>Srikant Banerjee/div>">
						<img class="image-portfolio" src="img/33_image.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Srikant Banerjee</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>282</span></li>
					</ul>
				</figure>

				<!-- Picture -->
				<figure class="item-portfolio item-portfolio__column-four category-fan">
					<a class="link-photo" href="img/suriya-3.jpg" data-width="1324" data-height="896" data-caption="<div class='options__photo'><span>Photo By - </span>Atul Nair</div>">
						<img class="image-portfolio" src="img/suriya-3.jpg" alt="Photo">
					</a>
					<ul class="item-details">
					    <li><a href="#by"><i  aria-hidden="true"></i><span>By - Atul Nair</span></a></li>
						<li class="item-details_right"><a href="#like"><i class="fa fa-heart" aria-hidden="true"></i></a><span>1208</span></li>
					</ul>
				</figure>
			</div>
			<a href="event_gallery.html" class="btn-link btn-link_right">explore gallery</a>
		</div>
		<br>
        <!-- Load more -->
		<div class="btn-load__col btn-load__col_space">
		    <div class="btn-load__wrap">
                <button type="submit" class="btn-load__button"><span class="ripple"></span></button>
			    <span class="btn-load__text">Load More</span>
			</div>
		</div>

	</section>
    <!-- /My Works -->

	<!-- Brands --
	<section class="section">
	    <div class="container">
		    <div class="row os">
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_01.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_02.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_03.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_04.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_05.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_06.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_07.png" alt="Brand Name">
				</div>
			    <div class="col-4 col-md-4 col-lg-3 brand-col">
				    <img class="brand-col__logo" src="img/brand_logo_08.png" alt="Brand Name">
				</div>
			</div>
		</div>
	</section>
	<!-- /Brands -->

	<section class="section section-bg section-onescreen" style="background-image: url(img/hero-image6.png);">
	    <!--div class="container container-flex">
		    <div class="row justify-content-center">
			    <div class="col-12 col-md-12 col-lg-9">
			      <h2 class="title title__h2 title_center title_normal"><span class="reveal reveal_gray">Contest will begin soon. Till then subscribe to get updates of the events.</span></h2>
				  <p>
				</div>
                <div class="col-lg-12">
			        <div class="form-group">
				        <form class="subscribe-form" data-toggle="validator">
				            <div class="subscribe-form__inner">
					            <input type="email" class="form-control _big email_valid" placeholder="Enter your email address" required data-error="Please, enter your email.">
					            <button type="submit" class="btn-subscribe">OK</button>
					        </div>
					        <div id="validator-subscribe" class="hidden"></div>
				        </form>
			        </div>
				</div>
			</div>
		</div=-->

	    <div class="container footer text-center">
		    <div class="row">

			    <div class="col-md-6 col-lg-4">
				    <h5 class="title title__h6 text_uppercase">Get in touch</h5>
				    <ul class="footer__contacts list-unstyled">

						<li><a href = "mailto: photocomptia@gmail.com">E.:photocomptia@gmail.com</a></li>

				    </ul>
				</div>
			    <div class="col-md-6 col-lg-4">
				    <h5 class="title title__h6 text_uppercase">Social</h5>
				    <ul class="footer__contacts list-unstyled">
					    <li>Connect with me on <a class="link_decoration" href="#">facebook</a>,<a class="link_decoration" href="#">twitter</a> or <a class="link_decoration" href="https://www.instagram.com/photocomptia/">instagram</a></li>
				    </ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Overlay Menu -->
	<div class="popup popup__menu">
	    <div class="popup-inner">
            <div class="dl-menu__wrap dl-menuwrapper">
                <ul class="dl-menu dl-menuopen">
					<li>
					    <a href="index.html">Home</a>
				    </li>
				    <li>

						    <li><a href="about.html">About Us</a></li>
					<!--    <li><a href="about_onescreen.html">Our Team</a></li>    -->

					</li>

					<li>
						<a href="photoreg.php"> Current Events</a>
					</li>
					<li>
					    <a href="contest_page.php">Event Gallery </a>
					</li>

		   		<!--	<li>
					    <a href="blog.html">Our Services</i></a>
				    </li>    -->
					<li><a href="contact.php">Contact Us</a></li>

				<!--    <li>
					    <a href="#">Socials <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					    <ul class="dl-submenu">
						    <li><a href="about_onescreen.html">About Onescreen</a></li>
							<li><a href="coming_soon.html">Coming Soon</a></li>
						    <li><a href="page_error.html">Page Error</a></li>
							<li><a href="page_error_v2.html">Page Error v2</a></li>
						    <li><a href="nav_v2.html">Menu v2</a></li>
					    </ul>
				    </li> -->
			    </ul>
		    </div>
	    </div>
	</div>
	<!-- /Overlay Menu -->

    <!-- PhotoSwipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
	<!-- /PhotoSwipe -->

	<div id="wave"></div>

	<!-- JavaScripts -->
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/plugins.js" type="text/javascript"></script>
	<script src="js/siriwave.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>

</body>

<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:25:31 GMT -->
</html>
