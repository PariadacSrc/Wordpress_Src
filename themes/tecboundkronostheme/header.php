<!DOCTYPE html>
<html>
<head>

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fav.png">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Disable screen scaling-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Tecbound Technology">
    <meta name="robots" content="noodp,noydir"/>
	<!--Complement Libs-->
	<?php do_action('load_complement_libs'); ?>
	<!--Header Actions-->
	<?php wp_head(); ?>

    <!-- Page Title Here -->
    <title>Tecbound</title>
   

</head>
<body>

	<div class="mainbody"  id="tecb-main-body">

		<!-- Start header Area -->
		<header>
			<div>
				<div class="tecb-destopk-header">

					<div class="container">
						<div class="tecb-superior-header-content">
							<div>
								<div class="tecb-imgcontainer">
									<a href="<?php echo get_home_url(); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/extras/logo-green.png" alt="">
									</a>
								</div>
							</div>
							<div>
								<ul>
									<li class="tecb-generic-text tcb-txt-white">
										<?php dynamic_sidebar( 'tecb_header_area_one' ); ?>
									</li>
									<li>
										<?php dynamic_sidebar( 'tecb_header_area_two' ); ?>
									</li>
									<li>
										<?php if(function_exists('pll_the_languages')): ?>
											<div class="tecb-flex-container tecb-language-switch">
												<div class="tecb-lang-swich">
													<ul>	
									                	<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
								                	</ul>
								                </div>

											</div>
						                <?php endif; ?>
									</li>
								</ul>
							</div>
						</div>

						<div class="tecb-green-stripe-menu">
							<?php 
								$m_args = array(
									'theme_location'=>'tecb_main_menu',
									'menu_class'=>'tecb_main_menu',
								);

								wp_nav_menu($m_args ); 
							?>
						</div>
					</div>

				</div>
				<div class="tecb-movile-header">
					<div class="tect-principal-header-elements">
						<div class="tecb-header-movile-logo">
							<a href="<?php echo get_home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/extras/logo-green.png" alt="">
							</a>
						</div>
						<div><button id="tecb-main-collapse-btn" class="tecb-general-btn"><i class="fas fa-bars"></i></button></div>
					</div>
					<div class="tecb-collapse-header-elements">

						<div>
							<div class="tecb-movile-widget-area">
								<ul>
									<li class="tecb-generic-text tcb-txt-white">
										<?php dynamic_sidebar( 'tecb_header_area_one' ); ?>
									</li>
									<li>
										<?php dynamic_sidebar( 'tecb_header_area_two' ); ?>
									</li>
									<li>

										<?php if(function_exists('pll_the_languages')): ?>
											<div class="tecb-flex-container tecb-language-switch">
												<div class="tecb-lang-swich">
													<ul>	
									                	<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
								                	</ul>
								                </div>

											</div>
						                <?php endif; ?>

										<!--<div class="tecb-flex-container tecb-language-switch tecb-xs-flex tecb-flex-space">
											<div>
							                	<span>Lorem</span>
							                	<span>Lorem</span>
							                </div>
											<div class="switch-cont">
							                    <label class="switch">
							                      <input type="checkbox">
							                      <span class="slider round"></span>
							                    </label>
							                </div>
										</div>-->
						                
									</li>
								</ul>

							</div>
							
							<div class="tecb-movile-main-menu">
								<?php 
									wp_nav_menu(array(
										'menu'=>'tecb_main_menu',
										'menu_class'=>'tecb_main_menu'
									)); 
								?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</header>
		<!-- End header Area --> 

		<!-- Start mainbody Sections -->
        <div class="tecb-global-container">