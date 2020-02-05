<?php
	
	if(class_exists('ACF')): 

		add_action( 'posts_where', function ( $where ) {
	
			$where = str_replace("meta_key = 'middle_area_$", "meta_key LIKE 'middle_area_%", $where);
			return $where;
		});


		add_action( 'pre_get_posts', function( $q ){

		    if( $title = $q->get( '_meta_or_title' ) ){

		        add_filter( 'get_meta_sql', function( $sql ) use ( $title ){

		            global $wpdb;

		            // Only run once:
		            static $nr = 0; 
		            if( 0 != $nr++ ) return $sql;

		            // Modified WHERE
		            $sql['where'] = sprintf(
		                " AND ( %s OR %s ) ",
		                $wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title),
		                mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
		            );

		            return $sql;
		        });
		    }
		});

	endif;

?>