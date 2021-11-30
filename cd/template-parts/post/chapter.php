<?php if( have_rows('post_chapter') ): ?>
<div class="p-2 p-md-4 my-3 bg-light rounded chapter">
  <div class="row g-0 flex-nowrap mt-3">
    <div class="col-10 order-2">
      <h5 class="chapter__keypoints-title"><?php esc_html_e( 'The key points', 'cd' ); ?></h5>
      <ul class="chapter__link">
        <?php while( have_rows('post_chapter') ): the_row(); ?>
        <li class="mb-3">
          <a class="link-dark"
            href="#<?php the_sub_field('chapter_id'); ?>"><?php the_sub_field('chapter_title'); ?></a>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <div class="col-auto order-1 chapter__share">
      <?php
      $obj_id = get_queried_object_id();
      $current_url = get_permalink( $obj_id );
      $site_url = $current_url; ?>
      <div class="d-flex flex-column align-items-center">
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
  </div>
</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/banner/referral' ); ?>

<?php if( have_rows('post_chapter') ): ?>
<div class="pt-2 pt-md-4 mt-3 mb-2">
  <div class="d-flex reading-time align-items-baseline">
    <img class="opacity-50" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/clock.svg"
      alt="<?php esc_attr__( 'Reading time', 'cd' ); ?>">
    <span class="text-black-50">
      <?php echo reading_time(); ?>
    </span>
  </div>
</div>
<?php endif; ?>

<?php if( have_rows('post_chapter') ): ?>
<div class="pb-3 pb-md-5 mb-3">
  <?php while( have_rows('post_chapter') ): the_row(); ?>
  <div id="<?php the_sub_field('chapter_id'); ?>" class="row g-0 mb-5">
    <div class="col-auto">
      <h2 class="blog-post-title mb-2"><?php the_sub_field('chapter_title'); ?></h2>
      <?php the_sub_field('chapter_content'); ?>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>