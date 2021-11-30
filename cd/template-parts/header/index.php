<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <!-- <a class="link-secondary" href="#">Subscribe</a> -->
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="<?php echo esc_url_raw( home_url() ); ?>">
          <?php bloginfo( 'name' ); ?>
          <span class="d-block h6">
            <?php bloginfo( 'description' ); ?>
          </span>
        </a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <?php if( get_field('about_twitter', 'option') ) { ?>
        <a href="<?php the_field('about_twitter', 'option') ?>" target="_blank" class="link-secondary">
          <img width="20" height="20"
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/svg/twitter.svg" alt="Twitter logo">
        </a>
        <?php } ?>
        <a id="js-modalSearchBtn" class="link-secondary d-none d-md-block" href="javascript:void(0);"
          aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
            <title><?php esc_html_e( 'Search', 'cd' ); ?></title>
            <circle cx="10.5" cy="10.5" r="7.5" />
            <path d="M21 21l-5.2-5.2" />
          </svg>
        </a>
        <!-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> -->
      </div>
    </div>
  </header>

  <?php
  $categories = get_categories( array(
    'parent'  => 0
  ) );
  if (!empty($categories)) { ?>
  <div class="nav-scroller py-1">
    <nav class="nav d-flex justify-content-between">
      <?php
      foreach ( $categories as $category ) {
        printf( '<a class="p-2 link-secondary" href="%1$s">%2$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
        );
      } ?>
    </nav>
  </div>
  <?php } ?>

  <div class="bg-danger text-white py-1 mb-4">
    <div class="row">
      <div class="col-auto text-center mx-auto">
        <p class="px-4 px-md-5 mb-0">
          <small>
            <?php the_field('disclaimer_text', 'option'); ?>
          </small>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- The Crypto Diary Serach Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog crypto-modal-search">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <div class="modal-header">
            <h4 class="modal-title" id="searchModalLabel"><?php esc_html_e( 'Search', 'cd' ); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="py-4">
            <?php get_search_form(); ?>
            <div class="mt-4">
              <div class="row">
                <?php 
                // the query
                $the_query = new WP_Query( array(
                  'post_type' => 'post',
                  'posts_per_page' => 6,
                  'post__not_in' => get_option( 'sticky_posts' ),
                  'orderby' => 'rand',
                  ) ); ?>

                <?php if ( $the_query->have_posts() ) : ?>

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-6 mb-4">

                  <h2 class="mb-1 h4"><small><?php the_title(); ?></small></h2>
                  <p class="mb-0"><small><?php echo get_the_excerpt(); ?></small></p>
                  <a href="<?php the_permalink(); ?>"
                    class="link-primary"><small><?php esc_html_e( 'Continue reading...', 'cd' ); ?></small></a>

                </div>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$featured_posts = get_field('marquee_item', 'option');
if( $featured_posts ): ?>
<div class="container">
  <div class="marquee__container bg-dark">
    <p class="node-marquee">
      <?php foreach( $featured_posts as $post ):
      // Setup this post for WP functions (variable must be named $post).
      setup_postdata($post); ?>
      <a class="text-white text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php endforeach; ?>
    </p>
  </div>
</div>
<?php
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>