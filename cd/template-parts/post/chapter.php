<div class="p-2 p-md-4 my-3 bg-light rounded chapter">
  <div class="row g-0">
    <div class="col-11 order-2">
      <?php if( have_rows('post_chapter') ): ?>
      <ul>
        <?php while( have_rows('post_chapter') ): the_row(); ?>
        <li>
          <a class="link-dark" href="#<?php the_sub_field('chapter_id'); ?>"><?php the_sub_field('chapter_title'); ?></a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
    <div class="col-auto order-1 chapter__share">
      <?php
      $obj_id = get_queried_object_id();
      $current_url = get_permalink( $obj_id );
      $site_url = $current_url; ?>
      <div class="d-flex flex-column align-items-center">
        <a class="link-secondary text-decoration-none"
          href="http://www.facebook.com/sharer.php?u=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/facebook.svg" alt="<?php esc_attr__( 'Share on facebook', 'cd' ); ?>">  
        </a>

        <a class="link-secondary text-decoration-none"
          href="https://twitter.com/share?url=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/twitter.svg" alt="<?php esc_attr__( 'Share on Twitter', 'cd' ); ?>">
        </a>

        <a class="link-secondary text-decoration-none"
          href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url; ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/linkedin.svg" alt="<?php esc_attr__( 'Share on LinkedIn', 'cd' ); ?>">
        </a>

        <a class="link-secondary text-decoration-none" href="<?php
        if ( wp_is_mobile() ) {
          echo 'whatsapp://send?text=' . $site_url . '';
        } else {
          echo 'https://api.whatsapp.com/send?text=' . $site_url . '';
        } ?>" data-action="share/whatsapp/share">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/whatsapp.svg" alt="<?php esc_attr__( 'Share on WhatsApp', 'cd' ); ?>">  
        </a>
      </div>
    </div>
  </div>
</div>

<div class="p-2 p-md-4 my-3 bg-white">
  .row.g-0
</div>