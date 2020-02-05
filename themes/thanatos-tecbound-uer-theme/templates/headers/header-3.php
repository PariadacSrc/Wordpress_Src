<?php
$header_options = goza_builder_options_header();
extract($header_options);

$header_class_arr = array( basename( __FILE__, '.php' ), /* $goza_header_logo_align, */ $goza_header_full_content, ''/*$goza_header_menu_position*/ );
$header_container_class_arr = array( $goza_absolute_header, $goza_sticky_header );
$header_class_container = !empty($goza_header_full_content) ? 'container-fluid' : 'container';

// echo '<pre>'; print_r($goza_header_settings); echo '</pre>';
?>
<!-- header too bar - logo -->
<header class="<?php echo esc_attr(implode(' ', array(basename( __FILE__, '.php' ) . '-top', $goza_logo_retina))); ?>"> <!-- Start .bt-header-top -->
  <!-- Header top bar -->
	<?php if ( $goza_enable_header_top_bar == 'yes' ) { ?>
	<div class="bt-header-top-bar">
		<div class="<?php echo esc_attr($header_class_container); ?>">
			<div class="row">
				<?php goza_top_bar(); ?>
			</div>
		</div>
	</div>
	<?php } ?>
  <div class="bt-header-logo-sidebar-wrap bt-header-shadow-effect-<?php echo esc_attr($goza_header_3_options['header-3']['logo_sidebar_shadow_effect']['select']); ?>"> <!-- Start .bt-header-logo-sidebar-wrap -->
    <div class="<?php echo esc_attr($header_class_container); ?>">
      <div class="bt-itable">
				<?php goza_load_logo_sidebar_header_3(); ?>
      </div>
    </div>
  </div> <!-- End .bt-header-logo-sidebar-wrap -->
</header> <!-- End .bt-header-top -->

<!-- header menu -->
<header class="bt-header <?php echo esc_attr( implode( ' ',  $header_class_arr ) ); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<!-- Header main menu -->
	<div class="bt-header-main">
		<div class="bt-header-container <?php echo esc_attr( implode( ' ', $header_container_class_arr ) ); ?>">
			<div class="<?php echo esc_attr($header_class_container); ?>">
				<div class="bt-container-menu-full">
					<div class="bt-itable">
						<?php goza_load_menu_header_3(); ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</header>
