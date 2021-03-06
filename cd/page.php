<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article <?php post_class('blog-post mt-3'); ?>>


          <header>
            <h1 class="blog-post-title mb-3">
              <?php the_title(); ?>
            </h1>
          </header>

          <?php the_post_thumbnail( 'cd_post_img', array(
          'class' => 'img-fluid mb-3',
          'alt'   => get_the_title()
        ) ) ?>

          <?php the_content(); ?>

        </article>

        <?php

      endwhile;
      endif;
      get_template_part( 'template-parts/navigation/paginate' ); ?>

      </div>

    </div>

    <?php
  $cd_video_query_args = array(
    'post_type' => 'video',
    'posts_per_page' => 4,
  );
  $the_query = new WP_Query( $cd_video_query_args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <section class="p-2 p-md-4 my-5 bg-black text-white rounded">
      <div class="row g-0">
        <div class="col-12">
          <h2 class="blog-post-title p-2 p-md-4 mb-0">
            <?php esc_html_e( 'Video', 'cd' ); ?>
          </h2>
        </div>
        <div class="w-100 divider__dotted-white"></div>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="col-md-3">
          <article <?php post_class('p-2 p-md-4'); ?>>
            <div class="embed-container mb-2">
              <?php the_field('youtube_video'); ?>
            </div>
            <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          echo '<p class="mb-1"><span class="text-secondary fw-bold">' . esc_html( $categories[0]->name ) . '</span></p>';
        } ?>
            <h5><?php the_title(); ?></h5>
          </article>
        </div>

        <?php endwhile; ?>
      </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>


  </div>
</main>
<?php get_footer(); ?>