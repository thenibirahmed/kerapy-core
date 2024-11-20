<div class="text-decoration-none h-100">
    <div class="card h-100 border-0">
        <div class="service-img bg-light">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail('medium-large', array(
                    'class' => 'service-img img-fluid rounded-0'
                ));
                ?>
            </a>
        </div>
        <div class="p-0">
            <a href="<?php the_permalink();?>">
                <h5 class="all-heading-color pt-4"><?php the_title();?></h5>
            </a>
            <?php if(has_excerpt()){ ?>
                <?php the_excerpt();?>
            <?php } ?>
        </div>
    </div>
</div>