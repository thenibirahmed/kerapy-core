
<div class="row testimonial-section mx-auto section-bg p-1 p-md-5">
    <div class="col-12 col-md-6">
        <div>
            <div class="tesimonial2-icon pb-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="" height="" viewBox="0 0 20 20"><path fill="currentColor" d="m7 6l1-2H6C3.79 4 2 6.79 2 9v7h7V9H5c0-3 2-3 2-3m7 3c0-3 2-3 2-3l1-2h-2c-2.21 0-4 2.79-4 5v7h7V9z"/></svg>
            </div>
            <h5 class="text-black-50">
                <?php echo esc_html($item['content']);?>
            </h5>
            <div class="d-flex justify-content-between">
                <div class="mt-2 mt-md-4 author-name">
                    <h6 class="all-heading-color">
                        <?php echo esc_html($item['author']);?>
                    </h6>
                    <p>
                        <?php echo esc_html($item['designation']);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 pt-2 pt-md-0">
        <?php  
            $id = $item['img']['id']; 
            $url = $item['img']['url'];
            if($id){
                echo wp_get_attachment_image( $id, 'medium_large', false, array(
                    'class' => 'img-fluid tesimonial2-img'
                ));
            }else{
                echo '<img class="w-full" src="'.$url.'">';
            } 
        ?>
    </div>
</div>
