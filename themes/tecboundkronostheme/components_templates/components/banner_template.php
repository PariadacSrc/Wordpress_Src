<?php if($atts['banner_type']!=='tecb-no-banner'): ?>

    <section class="tecb-banner-section  <?php echo $atts['banner_type']; ?>" style="background-image: url('<?php echo $atts["background"]["url"]; ?>')">
        <div class="container">
            <div class="tecb-flex-container <?php echo $atts['banner_type']==='tecb-big-banner'?'tecb-front-banner':''; ?> ">

                <?php

                    switch ($atts['banner_type']) {
                        case 'tecb-big-banner':
                            
                            ?>

                                <div class="tcb-flex-col-70">
                                    <?php echo do_shortcode($atts['content']['text']); ?>
                                </div>
                                <div class="tcb-flex-col-30">
                                    <?php echo do_shortcode($atts['content']['short_content']); ?>
                                </div>

                            <?php

                            break;
                        case 'tecb-half-banner':

                            ?>

                                <div class="tcb-flex-col-100">
                                    <div class="tecb-generic-banner-title">
                                        <?php if ($atts['icon']!=='no-icon'): ?>
                                            
                                            <div class="tecb-icon-container">
                                                <i class="<?php echo $atts['icon']; ?>"></i>
                                            </div>

                                        <?php endif; ?>

                                        <div class="tecb-title-container">
                                            <h1>
                                                <span><?php echo $atts['content']['title']; ?></span>
                                                <span><?php echo $atts['content']['sub-title']; ?></span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>

                            <?php


                        default:
                            # code...
                            break;
                    }

                ?>

                
            </div>
        </div>
        <div class="tecb-overlay-mask"></div>
    </section>

<?php else: ?>
    <section></section>
<?php endif; ?>