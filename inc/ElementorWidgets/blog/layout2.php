<?php 


?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-start">
    <?php
        while($blog -> have_posts()) : $blog -> the_post();
     ?>
    <div class="col">
        <a href="blog_single.html" class="text-decoration-none">
            <div class="card h-100 border-0 postcard post-card-gap2">
                <div class="blog-card2 mb-2 post-img-redius <?php echo has_post_thumbnail() ? '' : 'bg-light blog-card2'; ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(get_post_thumbnail_id(), 'blog_image_size', $settings);
                            ?>
                                <img class="blog-card2 img-fluid post-img-redius" src="<?php echo esc_url($image_url); ?>" alt="">
                            <?php
                        } else {
                            echo '<div class="fallback-image w-full blogcard1-img post-img-radius bg-light">No Image Available</div>';
                        }
                        ?>
                    </a>
                </div>
                <p class="card-text">
                    <?php 
                        $count = 0;
                        $cats = get_the_category();
                        if( ! empty($cats) ){
                            foreach( $cats as $cat){
                                $count++;
                                ?>
                                <a class="sub-head blog-post-meta" href="<?php echo get_category_link($cat->term_id);?>">
                                    <?php echo esc_html($cat->name); ?>
                                </a> 
                            <?php   
                                if( $count == 1){
                                    break;
                                }
                            }
                        }
                    ?> 
                </p>
                <a href="<?php the_permalink();?>">
                    <h5 class="blog-post-title"><?php the_title(); ?></h5>
                </a>
            </div>
        </a>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>



