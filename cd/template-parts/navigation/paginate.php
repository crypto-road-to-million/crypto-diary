<?php global $wp_query;
$cd_paginate_query = $wp_query;
?>


<nav class="blog-pagination p-2" aria-label="Pagination">

  <?php
  if(get_previous_posts_link()) {
    previous_posts_link();
  } ?>

  <?php foreach( cd_get_paginated_links( $cd_paginate_query ) as $cd_paginate_link ) : ?>
  <?php if ( $cd_paginate_link->isCurrent ): ?>
  <a class="btn btn-outline-primary disabled" href="<?php echo $cd_paginate_link->url; ?>" aria-current="page">
    <?php esc_html_e( 'Page: ', 'cd' ); ?><?php echo $cd_paginate_link->page; ?>
  </a>
  <?php else : ?>
  <a class="btn btn-outline-primary" href="<?php echo $cd_paginate_link->url; ?>"><?php echo $cd_paginate_link->page; ?>
  </a>
  <?php endif; ?>
  <?php endforeach; ?>

  <?php
  if(get_next_posts_link()) {
    next_posts_link();
  } ?>

</nav>