<div class="tecb-main-search">
	<form method="GET" action="<?php echo get_permalink(); ?>">

		<div class="input-group">
		  <input type="text" name="search" class="form-control" placeholder="<?php _e('Search on the page...',UER_TXT_DOMAIN); ?>" aria-label="<?php _e('Please enter the keywords',UER_TXT_DOMAIN); ?>" aria-describedby="button-addon2">
		  <div class="input-group-append">
		    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
		  </div>
		</div>

	</form>
</div>