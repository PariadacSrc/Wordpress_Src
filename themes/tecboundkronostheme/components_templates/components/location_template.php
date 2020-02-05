<section class="tecb-regular-area">
    <div class="container">
        <?php  $locations_chunks= array_chunk($atts['location_column'], 2); ?>

        <?php foreach ($locations_chunks as $rowkey => $rowvalue): ?>
            <div class="tecb-flex-container flex-all-top">

                <?php foreach ($rowvalue as $lockey => $locvalue): ?>

                    <div class="tcb-flex-col-50">
                        <div>
                            <iframe src="<?php echo $locvalue['iframe_url'] ?>" width="100%" height="250px" frameborder="0"></iframe>
                        </div>
                        <div class="tecb-direction-contact">
                            <p><i class="tecbound-map-pin"></i><?php echo $locvalue['direction']; ?></p>
                            <p><i class="tecbound-mail"></i><?php echo $locvalue['email']; ?></p>
                            <p><i class="tecbound-phone"></i><?php echo $locvalue['phone']; ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>
</section>