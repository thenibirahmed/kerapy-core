
<div class="text-center text-md-start">
    <h5 class="text-black-50" >"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, We were happy that we found the best"</h5>
    <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between mt-4">
        <div>
            <h6>
            <?php echo carbon_get_the_post_meta( 'client_name' ); ?>
                
            </h6>
            <p>Co-Founder, Elegant</p>
            <p><?php echo carbon_get_the_post_meta('client_name'); ?></p>
            <?php 
                $image = carbon_get_the_post_meta('avater');
                echo wp_get_attachment_image( $image, 'thumbnail', false, ['class' => 'rounded-full'] )
            ?>
        </div>
    </div>
</div>