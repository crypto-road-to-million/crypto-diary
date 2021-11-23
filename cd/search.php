<?php get_header(); ?>

<main class="container">

  <div class="row">
    <div class="col-md-8">
      <h1 class="pb-4 mb-4 fst-italic border-bottom">
        <?php esc_html_e( 'Results for: ', 'cd' ); ?><?php echo $s; ?>
      </h1>
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
          'class' => 'img-fluid mb-3',
          'alt'   => get_the_title()
        ) ) ?>
        </a>
        <?php } ?>
        
        <?php if (get_field('youtube_video', $post->ID)) { ?>
        <div class="embed-container mb-2">
          <?php the_field('youtube_video'); ?>
        </div>
        <?php } ?>

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

</main>

<?php get_footer(); ?>