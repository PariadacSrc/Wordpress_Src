        </div>
        <!-- End mainbody Sections --> 

        <!-- Start footer Area -->
        <footer>
			<div class="container">
				<div class="tecb-flex-container">
					<div class="tcb-flex-col-20">
						<div class="tecb-imgcontainer">
							<a href="<?php echo get_home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/extras/logo-white.png" alt="">
							</a>
						</div>
					</div>
					<div class="tcb-flex-col-30">
						
						<div class="tecb-flex-container tecb-direction-container">
							<div>
								<?php dynamic_sidebar( 'tecb_footer_area_one' ); ?>
							</div>
							<div>
								<?php dynamic_sidebar( 'tecb_footer_area_two' ); ?>
							</div>
						</div>

					</div>
					
					<div class="tcb-flex-col-50">
						<div class="tecb-flex-container flex-all-top">
							<div class="tcb-flex-col-60">
								<?php dynamic_sidebar( 'tecb_footer_area_tree' ); ?>
							</div>
							<div class="tcb-flex-col-40">
								<?php dynamic_sidebar( 'tecb_footer_area_four' ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="tecb-flex-container">
					<div class="tcb-flex-col-100">
						<div class="tecb-copy-right-area">
							<?php
								$term_cond= get_permalink(pll_get_post(626));
								$privacy_policy = get_permalink(pll_get_post(3));
							?>

							<h6>
								<?php _e('Copyright ©2019 All rights reserved',TCB_KRONOS_TXT_DOMAIN); ?> | 
								<?php _e('Powered by Tecbound',TCB_KRONOS_TXT_DOMAIN); ?> | 
								<a href="<?php echo $term_cond; ?>"><?php _e('Term and Conditions',TCB_KRONOS_TXT_DOMAIN); ?></a> | 
								<a href="<?php echo $privacy_policy; ?>"><?php _e('Privacy Policy',TCB_KRONOS_TXT_DOMAIN); ?></a>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->  

	</div>
	
	
	<!-- Scripts ============================================= -->
	<script type="text/javascript">
		//Global Variables
	    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>
	<?php wp_footer(); ?>


</body>
</html>