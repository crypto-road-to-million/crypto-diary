<div class="d-flex justify-content-between align-items-center p-2">
  <div>
    <p class="blog-post-meta mb-0 lh-1"><small><?php the_time( 'F j, Y' ); ?></small></p>
  </div>
 
  <?php if(!is_archive() && !is_home()) { ?>

    <div class="chapter__share">
      <?php
      $obj_id = get_queried_object_id();
      $current_url = get_permalink( $obj_id );
      $site_url = $current_url; ?>
      <div class="d-flex align-items-center">
        <a class="link-secondary text-decoration-none"
          href="http://www.facebook.com/sharer.php?u=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/facebook.svg"
            alt="<?php esc_attr__( 'Share on facebook', 'cd' ); ?>">
        </a>

        <a class="link-secondary text-decoration-none" href="https://twitter.com/share?url=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/twitter.svg"
            alt="<?php esc_attr__( 'Share on Twitter', 'cd' ); ?>">
        </a>

        <a class="link-secondary text-decoration-none"
          href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/linkedin.svg"
            alt="<?php esc_attr__( 'Share on LinkedIn', 'cd' ); ?>">
        </a>

        <a class="link-secondary text-decoration-none" href="<?php
        if ( wp_is_mobile() ) {
          echo 'whatsapp://send?text=' . $site_url . '';
        } else {
          echo 'https://api.whatsapp.com/send?text=' . $site_url . '';
        } ?>" data-action="share/whatsapp/share">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/whatsapp.svg"
            alt="<?php esc_attr__( 'Share on WhatsApp', 'cd' ); ?>">
        </a>
      </div>
    </div>
  <?php } ?>
</div>