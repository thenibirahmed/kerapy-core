<div class="col-12 col-sm-6 col-md-4">
    <div class="text-decoration-none h-100">
        <div class="card h-100 border-0 p-4 pb-0">
            <div class="p-0 pb-2">
                <a href="<?php the_permalink();?>">
                    <h5 class="all-heading-color"><?php the_title();?></h5>
                </a>
                <?php if(has_excerpt()){ ?>
                    <?php the_excerpt();?>
                <?php } ?>
            </div>
            <div class="service-img2 bg-light">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail('medium-large', array(
                        'class' => 'service-img2 card-img-top img-fluid rounded-0'
                    ));
                    ?>
                </a>
            </div>
        </div>
    </div>
</div>