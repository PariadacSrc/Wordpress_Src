<?php get_header(); ?>

	<!-- start banner Area -->
		<section class="banner-area relative general-banner notfoundbanner" id="home" style="background-image: url(<?php bloginfo('template_url' ); ?>/assets/img/404.jpg)">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-right">
					<div class="banner-content col-lg-8 One-title">
						<div>
							<h1 class="text-white">404</h1>
							<p class="pt-20 pb-20 text-white">
								Something went wrong.
							</p>
							<a href="/" class=""><i class="tecbound-coolarrow"></i> <span>Back to Home</span></a>
						</div>
					</div>											
				</div>
			</div>					
		</section>
	<!-- End banner Area -->	

<?php get_footer(); ?>