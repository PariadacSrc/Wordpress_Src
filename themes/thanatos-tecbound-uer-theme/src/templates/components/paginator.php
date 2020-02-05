<section class="tecb-paginator-container">
	<div class="tecb-paginator">
	    <?php

	    	if ( ! $query ) {$query = $GLOBALS['wp_query'];}

	        $total = $query->max_num_pages;
	        // solo seguimos con el resto si tenemos más de una página
	        if ( $total > 1 )  {

	        	$searchurl = $_GET['search'] ? '?search='.$_GET['search'] : '';

	             // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
	             $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
	             echo paginate_links(array(
	                  'base' => get_permalink(). '%_%'.$searchurl,
	                  'format' => $format,
	                  'current' => $current_page,
	                  'prev_next' => True,
	                  'prev_text' => __('&laquo; Prev'),
	                  'next_text' => __('Next &raquo;'),
	                  'total' => $total,
	                  'mid_size' => 4,
	                  'type' => 'list'
	             ));
	        }

	    ?>
	</div>
</section>