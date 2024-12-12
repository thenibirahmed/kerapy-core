<div class="text-decoration-none h-100">
    <div class="card h-100 border-0 service-post-gap">
        <div class="service-img bg-light mb-2 service-img-radius">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail('medium-large', array(
                    'class' => 'service-img img-fluid service-img-radius'
                ));
                ?>
            </a>
        </div>
        <a href="<?php the_permalink();?>">
            <h5 class="service-post-title"><?php the_title();?></h5>
        </a>
        <div class="service-post-text">
            <?php if(has_excerpt()){ ?>
                <?php the_excerpt();?>
            <?php } ?>
        </div>
    </div>
</div>