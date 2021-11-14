<?php get_header(); ?>

<main class="container">

  <?php
  $cd_sticky = get_option( 'sticky_posts' );
  if($cd_sticky) {
    $cd_args = array(
      'posts_per_page' => 1,
      'post__in' => $cd_sticky,
      'ignore_sticky_posts' => 1
    );
    // the query
    $cd_the_query = new WP_Query( $cd_args );
    if ( isset( $cd_sticky ) ) {
      if ( $cd_the_query->have_posts() ) {
        while ( $cd_the_query->have_posts() ) : $cd_the_query->the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="p-4 p-md-5 mb-4 text-white bg-dark">
      <div class="col-md-6 px-0">
        <div class="py-4 py-md-5">
          <h1 class="display-4 fst-italic"><?php the_title(); ?></h1>
          <p class="lead my-3"><?php echo get_the_excerpt(); ?></p>
          <p class="lead mb-0">
            <a href="<?php the_permalink(); ?>"
              class="text-white fw-bold"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a>
          </p>
        </div>
      </div>
    </div>
  </article>
  <?php endwhile;
    wp_reset_postdata();
      }
    }
  } ?>

  <?php
  $cd_sticky_two = get_option( 'sticky_posts' );
  if($cd_sticky_two) {
    $cd_args_two = array(
      'posts_per_page' => 10,
      'post__in' => $cd_sticky_two,
      'ignore_sticky_posts' => 1,
      'offset' => 1,
    );
    // the query
    $cd_the_query_two = new WP_Query( $cd_args_two );
    if ( isset( $cd_sticky_two ) ) {
      if ( $cd_the_query_two->have_posts() ) { ?>
  <div class="row mb-2">
    <?php while ( $cd_the_query_two->have_posts() ) : $cd_the_query_two->the_post(); ?>
    <div class="col-md-6">
      <article <?php post_class(); ?>>
        <div class="row g-0 border overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">
              <?php
                $cd_category = get_the_category();
                echo $cd_category[0]->cat_name; ?>
            </strong>
            <h3 class="mb-0"><?php the_title(); ?></h3>
            <div class="mb-1 text-muted"><?php the_time( 'M j' ); ?></div>
            <p class="card-text mb-auto"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>"
              class="stretched-link"><?php esc_html_e('Continue reading', 'cd'); ?></a>
          </div>
          <?php if ( has_post_thumbnail() ) { ?>
          <div class="col-auto d-none d-lg-block">
            <?php the_post_thumbnail( 'cd_post', array(
                'class' => 'bd-placeholder-img',
                'alt'   => get_the_title()
              ) ) ?>
          </div>
          <?php } ?>
        </div>
      </article>
    </div>
    <?php endwhile;?>
  </div>
  <?php wp_reset_postdata();
      }
    }
  } ?>

  <div class="row">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        <?php bloginfo( 'description' ); ?>
      </h3>
      <?php
      $the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );
      $count = 0;
      if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
      $count++;
      ?>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta">
          <?php the_time( 'F j, Y' ); ?><?php esc_html_e( ' by ', 'cd' ); ?><?php echo get_the_author_link(); ?></p>
        <?php the_content(); ?>
      </article>

      <?php
      if( $the_query->current_post == ($count%3 == 0) ) { ?>


      <div class="row g-0 bg-light position-relative mb-5">
        <div class="col-12">
          <div class="p-4 p-md-5">
            <h5 class="mt-0">Columns with stretched link</h5>
            <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some
              real-world content would look like, and we're using it here to give the component a bit of body and size.
            </p>
            <a href="#" class="stretched-link">Go somewhere</a>
          </div>
        </div>
      </div>


      <?php } ?>

      <?php

      
    endwhile;
      endif;
      ?>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled">Newer</a>
      </nav>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>