<?php

	//Tecbound Sidebars
	function tecb_primary_sidebar() {
 
	    register_sidebar( array(
	        'name'          => 'Primary Sidebar',
	        'id'            => 'tecb_primary_sidebar',
	        'before_widget' => '<div class="tecb_sidebar_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_sidebar_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_primary_sidebar' );


	function tecb_services_sidebar() {
 
	    register_sidebar( array(
	        'name'          => 'Services Sidebar',
	        'id'            => 'tecb_services_sidebar',
	        'before_widget' => '<div class="tecb_nav_three_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_nav_three_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_services_sidebar' );


	//Tecbound Widgets Areas

	//Header Area
	function tecb_header_area_one() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Header Area 1',
	        'id'            => 'tecb_header_area_one',
	        'before_widget' => '<div class="tecb_header_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_header_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_header_area_one' );


	function tecb_header_area_two() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Header Area 2',
	        'id'            => 'tecb_header_area_two',
	        'before_widget' => '<div class="tecb_header_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_header_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_header_area_two' );

	//Footer Area
	function tecb_footer_area_one() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Footer Area 1',
	        'id'            => 'tecb_footer_area_one',
	        'before_widget' => '<div class="tecb_footer_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_footer_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_footer_area_one' );

	function tecb_footer_area_two() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Footer Area 2',
	        'id'            => 'tecb_footer_area_two',
	        'before_widget' => '<div class="tecb_footer_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_footer_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_footer_area_two' );

	function tecb_footer_area_tree() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Footer Area 3',
	        'id'            => 'tecb_footer_area_tree',
	        'before_widget' => '<div class="tecb_footer_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_footer_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_footer_area_tree' );

	function tecb_footer_area_four() {
 
	    register_sidebar( array(
	        'name'          => 'Custom Footer Area 4',
	        'id'            => 'tecb_footer_area_four',
	        'before_widget' => '<div class="tecb_footer_widget">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="tecb_footer_title">',
	        'after_title'   => '</h2>',
	    ) );
	 
	}
	add_action( 'widgets_init', 'tecb_footer_area_four' );


?>