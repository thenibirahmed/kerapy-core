<?php 


?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-start">
    <?php
        while($blog -> have_posts()) : $blog -> the_post();
     ?>
    <div class="col">
        <a href="blog_single.html" class="text-decoration-none">
            <div class="card h-100 border-0 postcard post-card-gap2">
                <div class="blog-card2 bg-light mb-2 post-img-redius">
                    <a href="<?php the_permalink(); ?>" class="">
                        <div class=""></div>
                        <?php the_post_thumbnail('medium_large', array(
                            'class' => 'blog-card2 img-fluid post-img-redius'
                        )); ?>
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



