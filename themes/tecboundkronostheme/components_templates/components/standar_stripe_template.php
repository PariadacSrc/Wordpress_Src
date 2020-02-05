<?php 
	

    $link_url = $atts['link']['url'];
    $link_title = $atts['link']['title'];
    $link_target = $atts['link']['target']?$atts['link']['target']:'self'; 
    $button_color = $atts['type']==='t-green-variation'?'t-black-btn':'';

    switch ($atts['button_type']) {
        case 'modal':
            $default_shorcode = '[tecb_generic_button form_short_code="'.$atts['form_short_code'].'" url="'.$link_url.'" target="'.$link_target.'" class="'.$button_color.'"]'.$link_title.'[/tecb_generic_button]';
            break;
        
        default:
            $default_shorcode = '[tecb_generic_button url="'.$link_url.'" target="'.$link_target.'" class="'.$button_color.'"]'.$link_title.'[/tecb_generic_button]';
            break;
    }

?>
<section class="tecb-single-line-stripe <?php echo $atts['type'] ?>">
    <div class="container">
        <h4><?php echo $atts['content']; ?>
            <?php  echo do_shortcode($default_shorcode); ?> 
        </h4>
    </div>
</section>