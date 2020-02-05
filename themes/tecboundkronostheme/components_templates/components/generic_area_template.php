<section class="tecb-regular-area">
    <div class="container">

        <?php if(strlen(trim($atts['title']))>0): ?>
            <div class="tecb-generic-titles">
                <h3><?php echo do_shortcode($atts['title']); ?></h3>
            </div>
        <?php endif; ?>


        <?php if($atts['columns']): ?>

            <?php $colCalculator=0; $colInit=false; ?>

            <?php foreach ($atts['columns'] as $colkey => $colval):  $colCalculator+=$colval['size']; ?>

                <?php if($colCalculator<=100 && !$colInit): $colInit=true; ?>
                    <div class="tecb-flex-container flex-all-top">
                <?php endif; ?>

                    <div class="tcb-flex-col-<?php echo $colval['size']; ?>">
                        
                        <?php  

                            switch ($colval['content_type']) {
                                case 'picture':
                                    
                                    ?>
                                        <div class="tecb-imgcontainer">
                                            <img src="<?php echo $colval['picture']['url'] ?>" alt="">
                                        </div>

                                    <?php

                                    break;

                                case 'list':

                                    echo '<ul class="tecb-check-element-list">';

                                        foreach ($colval['list'] as $listkey => $listval) {
                                            
                                            echo do_shortcode('<li><i class="fas fa-check-circle"></i> '.$listval['content'].'</li>');

                                        }

                                    echo '</ul>';

                                    break;
                                
                                default:
                                    echo do_shortcode($colval['content']);
                                    break;
                            }

                        ?>

                    </div>

                <?php if($colCalculator>=100 || $colkey === (count($atts['columns'])-1) ): ?>
                    <?php $colCalculator=0; $colInit=false; ?>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="tecb-flex-container flex-all-top">

                <?php if($atts['default_container']): ?>
                    <div class="tcb-flex-col-100">
                        <?php echo do_shortcode($atts['content']); ?>
                    </div>
                <?php else: ?>
                    <?php echo do_shortcode($atts['content']); ?>
                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>
</section>