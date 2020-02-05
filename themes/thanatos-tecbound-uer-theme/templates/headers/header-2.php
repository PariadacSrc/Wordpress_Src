<?php
$header_options = goza_builder_options_header();
extract($header_options);

$header_class_arr = array( basename( __FILE__, '.php' ), $goza_header_logo_align, $goza_header_full_content, $goza_logo_retina );
$header_container_class_arr = array( $goza_absolute_header, $goza_sticky_header );
$header_class_container = !empty($goza_header_full_content) ? 'container-fluid' : 'container';

$goza_header_menu_position_main = array(
  'fw-menu-position-right'  => 'text-right',
  'fw-menu-position-left'   => 'text-left',
  'fw-menu-position-center' => 'text-center',
);
$goza_header_menu_position_secondary = array(
  'fw-menu-position-right'  => 'text-left',
  'fw-menu-position-left'   => 'text-right',
  'fw-menu-position-center' => 'text-center',
);
// echo '<pre>'; print_r($goza_header_settings); echo '</pre>';
?>
<header class="bt-header <?php echo esc_attr( implode( ' ',  $header_class_arr ) ); ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
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

	<!-- Header main menu -->
	<div class="bt-header-main">
		<div class="bt-header-container <?php echo esc_attr( implode( ' ', $header_container_class_arr ) ); ?>">
			<div class="<?php echo esc_attr($header_class_container); ?>">
        <div class="bt-itable">
          <?php goza_load_header_2(); ?>
        </div>
			</div>
		</div>
	</div>
</header>
