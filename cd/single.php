<?php get_header(); ?>

<main class="container">

  <div class="row">
    <div class="col-md-8">

      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/banner/referral' ); ?>

      <article <?php post_class('blog-post'); ?>>
        <h1 class="blog-post-title">
          <a class="text-decoration-none" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
        <p class="blog-post-meta">
          <?php the_time( 'F j, Y' ); ?><?php esc_html_e( ' by ', 'cd' ); ?><?php echo get_the_author_link(); ?></p>
        <?php the_content(); ?>

        <hr>

        <?php comments_template(); ?>

      </article>

      <?php
      get_template_part( 'template-parts/banner/referral' );
      endwhile;
      endif;
      get_template_part( 'template-parts/navigation/paginate' ); ?>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>