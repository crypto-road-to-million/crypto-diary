<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <p class="blog-post-meta mb-1"><?php esc_html_e( 'by ', 'cd' ); ?><?php echo get_the_author_link(); ?></p>
    <p class="blog-post-meta mb-0 lh-1"><small><?php the_time( 'F j, Y' ); ?></small></p>
  </div>
  <?php if(!is_single()){ ?>
  <div class="dropdown">
    <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownSharingLink-<?php echo get_the_ID(); ?>"
      data-bs-toggle="dropdown" aria-expanded="false"><?php esc_html_e( 'Share', 'cd' ); ?></a>

    <ul class="dropdown-menu" aria-labelledby="dropdownSharingLink-<?php echo get_the_ID(); ?>">
      <?php
      $obj_id = get_queried_object_id();
      $current_url = get_permalink( $obj_id );
      $site_url = $current_url; ?>
      <li>
        <a class="dropdown-item"
          href="http://www.facebook.com/sharer.php?u=<?php echo $site_url; ?>"><?php esc_html_e( 'Facebook', 'cd' ); ?></a>
      </li>
      <li>
        <a class="dropdown-item"
          href="https://twitter.com/share?url=<?php echo $site_url; ?>"><?php esc_html_e( 'Twitter', 'cd' ); ?></a>
      </li>
      <li>
        <a class="dropdown-item"
          href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url; ?>"><?php esc_html_e( 'LinkedIn', 'cd' ); ?></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php
        if ( wp_is_mobile() ) {
          echo 'whatsapp://send?text=' . $site_url . '';
        } else {
          echo 'https://api.whatsapp.com/send?text=' . $site_url . '';
        } ?>" data-action="share/whatsapp/share"><?php esc_html_e( 'Whatsapp', 'cd' ); ?></a>
      </li>
    </ul>
  </div>
  <?php } ?>
</div>