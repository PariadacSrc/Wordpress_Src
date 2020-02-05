<div class="tecb-main-search">
	<form method="GET" action="<?php echo get_permalink(); ?>">

		<div class="input-group">
		  <input type="text" name="search" class="form-control" placeholder="<?php _e('Search on the blog...',TCB_KRONOS_TXT_DOMAIN); ?>" aria-label="<?php _e('Please enter the keywords',TCB_KRONOS_TXT_DOMAIN); ?>" aria-describedby="button-addon2">
		  <div class="input-group-append">
		    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><?php _e('Search'); ?></button>
		  </div>
		</div>

	</form>
</div>