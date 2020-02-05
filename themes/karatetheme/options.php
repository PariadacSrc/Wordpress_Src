<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Configuración', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Dirección', 'theme-textdomain' ),
		'desc' => __( 'Dirección', 'theme-textdomain' ),
		'id' => 'direccion',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Dirección 2', 'theme-textdomain' ),
		'desc' => __( 'Dirección', 'theme-textdomain' ),
		'id' => 'direccion_2',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Teléfono', 'theme-textdomain' ),
		'desc' => __( 'Teléfono Fijo', 'theme-textdomain' ),
		'id' => 'tlf',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Teléfono', 'theme-textdomain' ),
		'desc' => __( 'Teléfono 2', 'theme-textdomain' ),
		'id' => 'tlf_2',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Correo', 'theme-textdomain' ),
		'desc' => __( 'Correo', 'theme-textdomain' ),
		'id' => 'email',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Google Maps', 'theme-textdomain' ),
		'desc' => __( 'Ubicación en el mapa', 'theme-textdomain' ),
		'id' => 'google_maps',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Google Maps Trabaja con nosotros', 'theme-textdomain' ),
		'desc' => __( 'Ubicación en el mapa', 'theme-textdomain' ),
		'id' => 'google_maps_2',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Facebook', 'theme-textdomain' ),
		'desc' => __( 'Facebook', 'theme-textdomain' ),
		'id' => 'facebook',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Twitter', 'theme-textdomain' ),
		'desc' => __( 'twitter', 'theme-textdomain' ),
		'id' => 'twitter',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Franja Verde', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Texto telefono', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_telf',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Telefono', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_telf_cont',
		'type' => 'text'
	);


	$options[] = array(
		'name' => __( 'Texto Horario', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_horario',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Horario', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_horario_cont',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Texto Dirección', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_dir',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Dirección', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'txt_dir_cont',
		'type' => 'text'
	);
	


	return $options;
}