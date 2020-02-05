<section class="tecb-regular-area tecb-ceo-area">
    <div class="container">
        <div class="tecb-flex-container">
            <div class="tcb-flex-col-40">
                <div class="tecb-imgcontainer">
                    <img src="<?php echo $atts['picture']['url']; ?>" alt="Tecbound Picture">
                </div>
            </div>
            <div class="tcb-flex-col-60">
                <div class="tecb-extra-padding">
                    <div class="tecb-generic-titles">
                        <h3><?php echo do_shortcode($atts['title']); ?></h3>
                    </div>
                    
                    <?php echo do_shortcode($atts['content']); ?>
                </div>
            </div>
        </div>
    </div>
</section>