<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8">

        <?php
        // single_cat_title();
        the_archive_title( '<h1 class="py-4 mb-4 fst-italic border-bottom">', '</h1>' ); ?>

        <?php

      $count = 0;
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      $count++; ?>

        <article <?php post_class('blog-post'); ?>>
          <?php     
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          echo '<p><a class="link-secondary text-decoration-none fw-bold" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></p>';
        } ?>
          <h2 class="blog-post-title mb-3">
            <a class="text-decoration-none" href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
          <?php get_template_part( 'template-parts/post/meta' ); ?>

          <?php if (has_post_thumbnail( $post->ID ) ){ ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'cd_post_img', array(
          'class' => 'img-fluid',
          'alt'   => get_the_title()
        ) ) ?>
          </a>
          <?php } ?>
          <?php
      if(get_field('featured_image_credit')){
        the_field('featured_image_credit');
      } ?>

          <?php the_excerpt(); ?>
        </article>

        <?php
      endwhile;
      endif;
      get_template_part( 'template-parts/navigation/paginate' ); ?>

      </div>

      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>

    <?php get_template_part( 'template-parts/video/section' ); ?>

  </div>
</main>
<?php get_footer(); ?>