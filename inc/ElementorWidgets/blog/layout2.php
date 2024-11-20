<?php 
$args = array(
    'post_type'     => 'post',
    'posts_per_page' => $settings[ 'items_to_display' ]
);
$blog = new \WP_Query($args);
?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-center">
    <?php
        while($blog -> have_posts()) : $blog -> the_post();
     ?>
    <div class="col">
        <a href="blog_single.html" class="text-decoration-none">
            <div class="card h-100 border-0 postcard">
                <div class="blog-card2 bg-light">
                    <a href="<?php the_permalink(); ?>" class="">
                        <div class=""></div>
                        <?php the_post_thumbnail('medium_large', array(
                            'class' => 'blog-card2 rounded-0 img-fluid'
                        )); ?>
                    </a>
                </div>
                <div class="card-body p-0">
                    <p class="card-text pt-3">
                    <?php 
                        $count = 0;
                        $cats = get_the_category();
                        if( ! empty($cats) ){
                            foreach( $cats as $cat){
                                $count++;
                                ?>
                                <a class="sub-head text-black-50" href="<?php echo get_category_link($cat->term_id);?>">
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
                        <h5 class="all-heading-color"><?php the_title(); ?></h5>
                    </a>
                    
                </div>
            </div>
        </a>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>