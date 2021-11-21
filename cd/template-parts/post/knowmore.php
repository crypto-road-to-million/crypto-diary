<?php
$featured_posts = get_field('featured_posts');
if( $featured_posts ): ?>
<div class="p-2 p-md-4 my-5 bg-light rounded knowmore">
  <div class="row g-0 flex-nowrap mt-3">
    <div class="col-11 mx-auto">
      <h5 class="knowmore__title p-3"><?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          echo esc_html( $categories[0]->name );
        } ?><?php esc_html_e( ', to know more', 'cd' ); ?></h5>
    
        <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
    <div class="card text-dark bg-light border-light mb-3 mb-md-5">
  <div class="row g-0">
    <div class="col-12">
      <div class="card-body">
        <h5 class="card-title mb-1"><?php the_title(); ?></h5>
        <p class="card-text"><small class="text-muted"><?php esc_html_e( 'Last updated ', 'cd' ); ?><?php echo get_the_modified_date( 'j F Y' ) ?>, <?php echo get_the_modified_date( 'G:i' ) ?></small></p>
        <p class="card-text mb-0"><?php echo get_the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="card-link"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a>
      </div>
    </div>
  </div>
</div>
        <?php endforeach; ?>
    
    </div>
  </div>
</div>

<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>