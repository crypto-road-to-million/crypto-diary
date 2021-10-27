<?php get_header(); ?>

<main class="container">

  <?php
$cd_sticky = get_option( 'sticky_posts' );
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
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic"><?php the_title(); ?></h1>
        <p class="lead my-3"><?php echo get_the_excerpt(); ?></p>
        <p class="lead mb-0"><a href="<?php the_permalink(); ?>"
            class="text-white fw-bold"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a></p>
      </div>
    </div>
  </article>
  <?php
    endwhile;
    wp_reset_postdata();
  }
} ?>


  <?php
  $cd_sticky_two = get_option( 'sticky_posts' );
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
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
  } ?>























  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        <?php bloginfo( 'description' ); ?>
      </h3>


      <?php
      $the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );
      if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_time( 'F j, Y' ); ?><?php esc_html_e( ' by ', 'cd' ); ?><?php echo get_the_author_link(); ?></p>
        <?php the_content(); ?>
      </article>




      
      <?php endwhile;
      endif;
      ?>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled">Newer</a>
      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic"><?php the_field('about_title', 'option'); ?></h4>
          <p class="mb-0"><?php the_field('about_small_description', 'option'); ?></p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic"><?php esc_html_e( 'Archives', 'cd' ); ?></h4>
          <ol class="list-unstyled mb-0">
            <?php wp_get_archives('type=monthly'); ?>
          </ol>
        </div>

        <div class="p-4">
          <h4 class="fst-italic"><?php esc_html_e( 'Elsewhere', 'cd' ); ?></h4>
          <ol class="list-unstyled">
            <?php if( get_field('about_github', 'option') ) { ?>
            <li><a href="<?php the_field('about_github', 'option') ?>"><?php esc_html_e( 'GitHub', 'cd' ); ?></a></li>
            <?php } ?>
            <?php if( get_field('about_twitter', 'option') ) { ?>
            <li><a href="<?php the_field('about_twitter', 'option') ?>"><?php esc_html_e( 'Twitter', 'cd' ); ?></a></li>
            <?php } ?>
            <?php if( get_field('about_facebook', 'option') ) { ?>
            <li><a href="<?php the_field('about_facebook', 'option') ?>"><?php esc_html_e( 'Facebook', 'cd' ); ?></a>
            </li>
            <?php } ?>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>

<?php get_footer(); ?>