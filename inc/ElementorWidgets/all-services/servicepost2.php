
<div class="<?php echo esc_attr($col_class); ?>">
    <div class="text-decoration-none h-100">
        <div class="card h-100 border-0 service-post-gap">
            <a href="<?php the_permalink();?>">
                <h5 class="service-post-title"><?php the_title();?></h5>
            </a>
            <div class="service-post-text">
                <?php if(has_excerpt()){ ?>
                    <?php the_excerpt();?>
                <?php } ?>
            </div>
            <div class="service-img-radius mt-3 <?php echo has_post_thumbnail() ? '' : 'bg-light no-image'; ?>">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                        $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(get_post_thumbnail_id(), 'service_image_size', $settings);
                        ?>
                            <img class="service-img2 img-fluid service-img-radius" src="<?php echo esc_url($image_url); ?>" alt="">
                        <?php
                    } else {
                        echo '<div class="fallback-image w-full blogcard1-img post-img-radius bg-light">No Image Available</div>';
                    }
                    ?>
                </a>
            </div>
        </div>
    </div>
</div>