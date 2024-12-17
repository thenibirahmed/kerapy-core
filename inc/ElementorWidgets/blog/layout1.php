<div class="row g-4 g-lg-5">
    <?php 
        $blog = new \WP_Query([
            "post_type"     => "post",
            'posts_per_page' => $settings[ 'items_to_display' ]
        ]);
        $count=0;
        while( $blog -> have_posts() ){
            $blog -> the_post();
            $count++;
            if($count === 1){
                ?>
                <div class="col-12 col-md-6">
                    <div class="overflow-hidden blogcard1-img post-img-redius">
                        <div class="liniar"></div>
                        <div class="blogcard1-img">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(get_post_thumbnail_id(), 'blog_image_size', $settings);
                                    ?>
                                        <img class="blogcard1-img post-img-radius" src="<?php echo esc_url($image_url); ?>" alt="">
                                    <?php
                                } else {
                                    echo '<div class="fallback-image w-full blogcard1-img post-img-radius bg-light">No Image Available</div>';
                                }
                                ?>
                            </a>
                        </div>
                        <div class="blogcard1-content large-post-card-gap2">
                            <a href="<?php the_permalink();?>">
                                <h5 class="blog-post-title1"><?php the_title(); ?></h5>
                            </a>
                            <p class="blog-post-meta1">
                            <?php 
                                $count = 0;
                                $cats = get_the_category();
                                if( ! empty($cats) ){
                                    foreach( $cats as $cat){
                                        $count++;
                                        ?>
                                        <a class="sub-head blog-post-meta1" href="<?php echo get_category_link($cat->term_id);?>">
                                            <?php echo esc_html($cat->name); ?>
                                        </a> 
                                    <?php   
                                        if( $count == 1){
                                            break;
                                        }
                                    }
                                }
                            ?> 
                            <span class="sub-head blog-post-meta1"> | <?php echo get_the_date( 'M d, Y' ); ?></span>
                            </p> 
                        </div>
                    </div>
                </div>
                <?php
            }
            break;
        }
    ?>
    <div class="col-12 col-md-6">
        <?php 
            while( $blog -> have_posts() ){
                $blog -> the_post();
                if($count >= 1){
                    ?>
                    <div class="mb-3 mb-lg-4">
                        <div class="text-decoration-none text-reset post-card-gap2">
                            <a href="<?php the_permalink();?>">
                                <h6 class="blog-post-title2"><?php the_title(); ?></h6>
                            </a>
                            <p class="blog-post-meta2">
                                <?php 
                                $count = 0;
                                $cats = get_the_category();
                                if( ! empty($cats) ){
                                    foreach( $cats as $cat){
                                        $count++;
                                        ?>
                                        <a class="blog-post-meta2" href="<?php echo get_category_link($cat->term_id);?>">
                                            <?php echo esc_html($cat->name); ?>
                                        </a> 
                                    <?php   
                                        if( $count == 1){
                                            break;
                                        }
                                    }
                                }
                            ?>
                            <span class="blog-post-meta2">| <?php echo get_the_date( 'M d, Y' ); ?></span>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                $count++;
            }
        ?>
    </div>
</div>
