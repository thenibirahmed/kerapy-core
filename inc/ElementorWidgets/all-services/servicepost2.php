<div class="col-12 col-sm-6 col-md-4">
    <div class="text-decoration-none h-100">
        <div class="card h-100 border-0 p-4 pb-0 service-post-gap">
            <a href="<?php the_permalink();?>">
                <h5 class="service-post-title"><?php the_title();?></h5>
            </a>
            <div class="service-post-text">
                <?php if(has_excerpt()){ ?>
                    <?php the_excerpt();?>
                <?php } ?>
            </div>
            <div class="service-img2 service-img-radius bg-light mt-3">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail('medium-large', array(
                        'class' => 'service-img2 img-fluid service-img-radius'
                    ));
                    ?>
                </a>
            </div>
        </div>
    </div>
</div>